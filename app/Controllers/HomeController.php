<?php

namespace App\Controllers;

use App\Models\NewsModel;

class HomeController extends BaseController
{
    public function index()
    {
        $newsModel = new NewsModel();
        $data['news'] = $newsModel->getAllNews();
        echo view('layout/header');
        echo view('home', $data);
    }
}
