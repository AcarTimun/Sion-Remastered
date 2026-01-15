<?php

class App {
    protected $controller = 'AuthController'; 
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // 1. CEK CONTROLLER
        // Logika Baru: Folder Controllers sejajar dengan app (di root)
        // Jalurnya: ../Controllers/NamaController.php
        if (isset($url[0])) {
            if (file_exists('../Controllers/' . ucfirst($url[0]) . 'Controller.php')) {
                $this->controller = ucfirst($url[0]) . 'Controller';
                unset($url[0]);
            }
        }

        // Panggil file controller dari folder luar
        require_once '../Controllers/' . $this->controller . '.php';
        
        // Instansiasi
        $this->controller = new $this->controller;

        // 2. CEK METHOD (Tidak berubah)
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 3. CEK PARAMS (Tidak berubah)
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }

        if (php_sapi_name() == 'cli-server') {
             $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
             $path = trim($path, '/');
             if (!empty($path)) {
                 return explode('/', $path);
             }
        }
        return [];
    }
}