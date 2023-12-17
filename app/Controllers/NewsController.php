<?php

namespace App\Controllers;

use App\Models\NewsModel;  // Pastikan use statement ini benar
use CodeIgniter\Controller;
use function PHPUnit\Framework\exactly;

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
        echo view('layout/navbar');
        echo view('news', $data);
    }

    public function create()
    {
        helper('form');
        if ($this->request->getMethod() === 'post') {
            // Validasi form input, pastikan Anda menyesuaikannya dengan kebutuhan Anda
            $validationRules = [
                'title' => 'required', //|min_length[5]|max_length[255]
                'content' => 'required', //|min_length[10]
                'category_id' => 'required|integer',
                'author_id' => 'required|integer',
                'created_at' => 'valid_date[Y-m-d]',
                'updated_at' => 'valid_date[Y-m-d]',
            ];

            if ($this->validate($validationRules)) {
                // Data valid, simpan ke database
                $newsModel = new NewsModel();

                $data = [
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content'),
                    'category_id' => $this->request->getPost('category_id'),
                    'author_id' => $this->request->getPost('author_id'),
                    'created_at' => $this->request->getPost('created_at'),
                    'updated_at' => $this->request->getPost('updated_at'),
                ];

                $newsModel->insert($data);

                // Redirect ke halaman tertentu setelah berhasil menyimpan
                return redirect()->to('/');
            } else {
                // Data tidak valid, tampilkan pesan error
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }

        echo view('layout/header');
        echo view('layout/navbar');
        echo view('inputberita');
    }

    public function delete($id)
    {
        $newsModel = new NewsModel();
        $newsModel->delete($id);

        // Redirect ke halaman utama atau halaman lain setelah penghapusan
        return redirect()->to('/');
    }

}