<?php
namespace App\Controllers;

use App\Models\Component;
use App\Models\Category;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Configuration;

class CatalogController extends BaseController
{
    public function index(Request $request): Response
    {
        $components = Component::getAll(orderBy: 'id DESC');
        return $this->html(['components' => $components]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'component' => new Component(),
            'categories' => Category::getAll(orderBy: '`name` ASC'),
            'errors' => []
        ], 'form');
    }

    public function edit(Request $request): Response
    {
        $component = $this->findComponent((int)$request->value('id'));
        return $this->html([
            'component' => $component,
            'categories' => Category::getAll(orderBy: '`name` ASC'),
            'errors' => []
        ], 'form');
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int)$request->post('id');
        $component = $id > 0 ? $this->findComponent($id) : new Component();

        $component->setFromRequest($request);

        $categoryId = $request->post('categoryId');
        $component->setCategoryId($categoryId !== '' && $categoryId != null ? (int)$categoryId : null);

        $file = $request->file('image');

        if ($file !== null && $file->getName() !== '') {
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getName());

            if (!is_dir(Configuration::UPLOAD_DIR)) {
                mkdir(Configuration::UPLOAD_DIR, 0755, true);
            }
            if (!$file->store(Configuration::UPLOAD_DIR . $fileName)) {
                throw new HttpException(500, 'Nepodarilo sa uložiť súbor.');
            }
            $oldFileName = $component->getImage();
            $component->setImage($fileName);
            if ($oldFileName !== null && is_file(Configuration::UPLOAD_DIR . $oldFileName)) {
                unlink(Configuration::UPLOAD_DIR . $oldFileName);
            }
        }

        $errors = [];
        if (empty($component->getName())) {
            $errors[] = 'Názov komponentu nesmie byť prázdny.';
        }
        if ($component->getPrice() === null || (float)$component->getPrice() < 0) {
            $errors[] = 'Cena musí byť nezáporné číslo.';
        }

        if (count($errors) > 0) {
            return $this->html([
                'component' => $component,
                'categories' => Category::getAll(orderBy: '`name` ASC'),
                'errors' => $errors
            ], 'form');
        }

        $component->save();
        return $this->redirect($this->url('catalog.index'));
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $component = $this->findComponent((int)$request->post('id'));
        $component->delete();

        return $this->redirect($this->url('catalog.index'));
    }

    private function findComponent(int $id): Component
    {
        $component = Component::getOne($id);
        if ($component === null) {
            throw new HttpException(404, 'Komponent nebol nájdený.');
        }
        return $component;
    }
}