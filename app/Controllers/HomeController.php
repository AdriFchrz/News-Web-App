<?php

namespace App\Controllers;

use App\Models\NewsModel;

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
        echo view('home', $data);
    }

    public function newsByCategory($category_id)
    {
        $data['news'] = $this->newsModel->getNewsByCategory($category_id);

        echo view('layout/header');
        echo view('category', $data);
    }

    public function search()
    {
        $keyword = $this->request->getVar('search');
        $data['news'] = $this->newsModel->searchNewsByTitle($keyword);

        echo view('layout/header');

        if (!empty($data['news'])) {
            echo view('search', $data);
        } else {
            echo view('not_found');
        }
    }
}

