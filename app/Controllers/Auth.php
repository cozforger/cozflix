<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->UsersModel = new UsersModel();

    }

    public function register()
    {
        return view('register');
    }

    public function register_post()
    {
        $username = $this->request->getVar('username');
        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $rules = [
            'username' => 'required|is_unique[users.username]',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required|min_length[8]',
            'password_confirmation' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        } else {
            $data = [
                'username' => $username,
                'nama' => $nama,
                'email' => $email,
                'password' => sha1($password),
                
            ];
            
            $this->UsersModel->insert($data);

            session()->setFlashdata('success', 'Register Success');
            return redirect()->to('/login')->with('success', 'Register Success, Please Login!');
        }
    }

    public function login()
    {

        return view('login');
    }

    public function login_post()
    {
        //ambil data dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        //aturan validasi
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[5]',
        ];

        //jika validasi gagal
        if (!$this->validate($rules)) {
            return redirect()->back()->with('validation', $this->validator);


            //jika validasi sukses
        } else {

            //check username & password enkripsi terdaftar di database
            $encrypt_password = sha1($password);
            $data = $this->UsersModel->select('id, username, tipe, admin_id')->where('username', $username)->where('password', $encrypt_password)->first();

            if ($data) {
                //membuat session
                session()->set([
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'is_login' => TRUE
                    
                ]);
                            //jika tipe user : admin
                            if($data['tipe'] == 'admin') {
                                return redirect()->to('admin');
            
                            //jika tipe user : petugas
                            } else {
                                return redirect()->to('/');
                            }
                return redirect()->to('/');
            } else {
                return redirect()->route('login')->with('error', 'Invalid login');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
