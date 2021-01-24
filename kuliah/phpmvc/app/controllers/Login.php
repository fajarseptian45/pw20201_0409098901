<?php

class Login extends Controller
{
  public function index()
  {
    $data['judul'] = 'Login';
    $data['bgcolor'] = 'style="background-color:#d3d3d3;"';
    $this->view('templates/header_login', $data);
    $this->view('login/login_form');
    $this->view('templates/footer');
  }

  public function proses()
  {
    $hasil = $this->model('User_model')->getUser();
    if ($hasil == true) { //jika login benar maka akan masuk ke menu home
      $data['judul'] = 'Home';
      $this->view('templates/header', $data);
      $this->view('home/index', $hasil);
      $this->view('templates/footer');
    } else {
      header('Location:' . BASEURL . '/login');
      exit;
    }
  }
}
