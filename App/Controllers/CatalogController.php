<?php
namespace App\Controllers;

use App\Models\Component;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class CatalogController extends BaseController
{
    public function index(Request $request): Response
    {
        $components = Component::getAll(orderBy: 'id DESC');
        return $this->html(['components' => $components]);
    }

    public function add(Request $request): Response
    {
        return $this->html(['component' => new Component(), 'errors' => []], 'form');
    }

    public function edit(Request $request): Response
    {
        $component = $this->getComponentOr404((int)$request->value('id'));
        return $this->html(['component' => $component, 'errors' => []], 'form');
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int)$request->post('id');
        $component = $id > 0 ? $this->getComponentOr404($id) : new Component();

        $component->setFromRequest($request);

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];

            $cleanFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $fileName);
            $uploadFileDir = __DIR__ . '/../../public/images/';

            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }

            $dest_path = $uploadFileDir . $cleanFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $component->setImage($cleanFileName);
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
            return $this->html(['component' => $component, 'errors' => $errors], 'form');
        }

        $component->save();
        return $this->redirect($this->url('catalog.index'));
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $component = $this->getComponentOr404((int)$request->post('id'));
        $component->delete();

        return $this->redirect($this->url('catalog.index'));
    }

    private function getComponentOr404(int $id): Component
    {
        $component = Component::getOne($id);
        if ($component === null) {
            throw new HttpException(404, 'Komponent nebol nájdený.');
        }
        return $component;
    }
}