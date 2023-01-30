<?php

class App {
  protected $controller = 'Home'; // default controller
  protected $method = 'index'; // default method
  protected $params = []; // default params kosong

  public function __construct() {
    $url = $this -> parseURL();
    // var_dump($url);

    // memanggil file controllers sesuai input
    if ( file_exists('../app/controllers/' . $url[1] . '.php') ) {
      $_SESSION['page'] = $url[1];
      $this->controller = $url[1];
      unset($url[1]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // memanggil method dalam controller yang digunakan
    if ( isset($url[2]) ) {
      if ( method_exists($this->controller, $url[2]) ) {
        $this->method = $url[2];
        unset($url[2]);
      }
    }

    // parameter
    if ( !empty($url) ) {
      $this->params = array_values($url);
    }

    // jalankan controller, method, dan kirimkan params 
    // jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  // membaca url yang dimasukan 
  public function parseURL() {
    // if ( isset($_GET['url']) ) {
    //   $url = rtrim($_GET['url'], '/'); // menghilangkan '/' dari paling kanan url
    //   $url = filter_var($url, FILTER_SANITIZE_URL); // membersihkan url dari special characters
    //   $url = explode('/', $url);  // memisahkan string url berdasarkan '/' (makanya dihilangkan dulu '/' paling kanan)
    //   return $url;
    // }
    $path_info = $_SERVER['PATH_INFO'] ?? '/';
    $path_info = filter_var($path_info, FILTER_SANITIZE_URL); // membersihkan url dari special characters
    $path_info = explode('/', $path_info); // memisahkan string path_info berdasarkan '/' (makanya dihilangkan dulu '/' paling kanan)
    return $path_info;
  }
}