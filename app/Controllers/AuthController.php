<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = service('authentication');
    }

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil
                // Set data user ke sesi atau lakukan aksi sesuai kebutuhan
                $session = session();
                $session->set('user_id', $user['id']);

                // Set peran ke dalam sesi
                $session->set('role', $user['role']);

                // Redirect sesuai peran
                if ($user['role'] === 'admin') {
                    return redirect()->to('/');
                } else if ($user['role'] === 'user') {
                    return redirect()->to('/');
                } else {
                    // Peran lainnya, sesuaikan dengan kebutuhan
                    return redirect()->to('/');
                }
            } else {
                // Login gagal
                return redirect()->back()->withInput()->with('error', 'Login failed. Please check your credentials.');
            }
        }
        return view('auth/login');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $userModel = new UserModel();

            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'), // Tidak perlu di-hash di sini
                'role' => $this->request->getPost('role'),
            ];

            $validationRules = [
                'username' => 'required|min_length[3]|max_length[255]|is_unique[users.username]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[5]',
                'role' => 'required|in_list[author,visitor]',
            ];

            if ($this->validate($validationRules)) {
                // Hash password sebelum disimpan
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $userModel->insert($data);

                // Set data user ke sesi setelah berhasil mendaftar
                $session = session();
                $session->set('user_id', $userModel->getInsertID());

                // Redirect ke halaman setelah registrasi berhasil
                return redirect()->to('/');
            } else {
                // Registrasi gagal, tampilkan pesan error
                $errors = $this->validator->getErrors();

                // Tambahkan pesan khusus untuk is_unique
                if (isset($errors['username']) && strpos($errors['username'], 'is_unique') !== false) {
                    $errors['username'] = 'Username sudah digunakan. Silakan pilih username lain.';
                }
                if (isset($errors['email']) && strpos($errors['email'], 'is_unique') !== false) {
                    $errors['email'] = 'Email sudah digunakan. Silakan gunakan email lain.';
                }

                return redirect()->back()->withInput()->with('errors', $errors);
            }
        }

        return view('auth/register');
    }


//    public function attemptLogin()
//    {
//        $userModel = new UserModel();
//
//        $login = $this->request->getPost('login'); // dapat berisi username atau email
//        $password = $this->request->getPost('password');
//
//        $user = $userModel->where('username', $login)->orWhere('email', $login)->first();
//
//        if ($user && password_verify($password, $user['password'])) {
//            // Login berhasil
//            // Set data user ke sesi atau lakukan aksi sesuai kebutuhan
//            $session = session();
//            $session->set('user_id', $user['id']);
//
//            $data['news'] = $this->newsModel->getAllNews();
//            // Redirect ke halaman setelah login
//            return redirect()->to('/');
//
//        } else {
//            // Login gagal
//            // Tampilkan pesan kesalahan atau lakukan aksi sesuai kebutuhan
//            return redirect()->back()->withInput()->with('error', 'Login failed. Please check your credentials.');
//        }
//    }
//
//    public function attemptRegister()
//    {
//        if ($this->request->getMethod() === 'post') {
//            $userModel = new UserModel();
//
//            $data = [
//                'username' => $this->request->getPost('username'),
//                'email' => $this->request->getPost('email'),
//                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
//                'role' => $this->request->getPost('role'),
//            ];
//
//            // Validasi data, sesuaikan dengan kebutuhan
//            $validationRules = [
//                'username' => 'required|min_length[3]|max_length[255]|is_unique[users.username]',
//                'email' => 'required|valid_email|is_unique[users.email]',
//                'password' => 'required|min_length[5]',
//                'role' => 'required|in_list[author,visitor]',
//            ];
//
//            if ($this->validate($validationRules)) {
//                $userModel->insert($data);
//
//                // Redirect ke halaman login setelah registrasi berhasil
//                return redirect()->to('/');
//            } else {
//                // Registrasi gagal, tampilkan pesan error
//                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
//            }
//        }
//
//        // Jika bukan request POST, tampilkan halaman registrasi
//        return view('auth/register');
//    }

    public function logout()
    {
        session()->remove('user_id');
        return redirect()->to('auth/login');
    }
}
