<?php

namespace App\Controllers;

use App\Models\NewsModel;  // Pastikan use statement ini benar
use CodeIgniter\Controller;

class NewsController extends Controller
{
    public function detail($id)
    {
        $newsModel = new NewsModel();
        $data['news'] = $newsModel->getNewsWithAuthorAndCategory($id);

        if ($data['news'] === null) {
            // Atur respons jika berita dengan ID tertentu tidak ditemukan
            return "Berita tidak ditemukan.";
        }

        echo view('layout/header');
        echo view('news', $data);
    }
}