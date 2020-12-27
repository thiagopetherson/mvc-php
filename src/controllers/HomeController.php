<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class HomeController extends Controller {

    public function index() {
        //Pegando os usuários
        $usuarios = Usuario::select()->execute();
       
        //Renderizando a view e passando os dados
        $this->render('home', [
            'usuarios' => $usuarios
        ]);
    }

}