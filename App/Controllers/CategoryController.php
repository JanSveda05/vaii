<?php

namespace App\Controllers;

use App\Models\Category;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class CategoryController extends BaseController
{
    public function index(Request $request): Response
    {
        $categories = Category::getAll(orderBy: '`name` ASC');
        return $this->html(['categories' => $categories]);
    }

    public function add(Request $request): Response
    {
        return $this->html(['category' => new Category(), 'errors' => []], 'form');
    }

    public function edit(Request $request): Response
    {
        $category = $this->findCategory((int)$request->value('id'));
        return $this->html(['category' => $category, 'errors' => []], 'form');
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int)$request->post('id');
        $category = $id > 0 ? $this->findCategory($id) : new Category();

        $name = trim((string)$request->post('name'));
        $slugInput = trim((string)$request->post('slug'));

        $slug = $slugInput !== '' ? $this->createSlug($slugInput) : $this->createSlug($name);
        $category->setName($name);
        $category->setSlug($slug);

        $errors = [];
        if ($category->getName() === '') {
            $errors[] = 'Názov kategórie nesmie byť prázdny.';
        }
        if ($category->getSlug() === '') {
            $errors[] = 'Slug nesmie byť prázdny.';
        } else {
            // Kontrola unikátnosti slugu v databáze
            $existing = Category::getAll('`slug` = ?', [$slug]);
            if (count($existing) > 0 && $existing[0]->getId() !== $category->getId()) {
                $errors[] = 'Kategória s týmto slugom už existuje.';
            }
        }

        if (count($errors) > 0) {
            return $this->html(['category' => $category, 'errors' => $errors], 'form');
        }

        $category->save();
        return $this->redirect($this->url('category.index'));
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $category = $this->findCategory((int)$request->post('id'));
        $category->delete();

        return $this->redirect($this->url('category.index'));
    }

    private function findCategory(int $id): Category
    {
        $category = Category::getOne($id);
        if ($category == null) {
            throw new HttpException(404, 'Kategória nebola nájdená.');
        }
        return $category;
    }

    private function createSlug(string $text): string
    {
        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
        $text = strtolower((string)$text);
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        return trim((string)$text, '-');
    }
}