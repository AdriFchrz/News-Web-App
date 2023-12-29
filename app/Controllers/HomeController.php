<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = NewsModel::getInstance();
    }

    public function index()
    {
        $data['news'] = $this->newsModel->getAllNews();
        echo view('layout/header');
        echo view('layout/navbar');
        echo view('home', $data);
    }

    public function users()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->getAllUsers();
        echo view('layout/header');
        echo view('layout/navbar');
        echo view('users', $data);
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();
        $userModel->deleteUser($id);

        // Redirect atau lakukan aksi sesuai kebutuhan setelah penghapusan
        return redirect()->to('/users');
    }


    public function newsByCategory($category_id)
    {
        $data['news'] = $this->newsModel->getNewsByCategory($category_id);

        echo view('layout/header');
        echo view('layout/navbar');
        echo view('category', $data);
    }

    public function search()
    {
        $keyword = $this->request->getVar('search');
        $data['news'] = $this->newsModel->searchNewsByTitle($keyword);

        echo view('layout/header');
        echo view('layout/navbar');

        if (!empty($data['news'])) {
            echo view('search', $data);
        } else {
            echo view('not_found');
        }
    }
}

