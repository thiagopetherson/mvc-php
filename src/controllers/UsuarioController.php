<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuarioController extends Controller {

   //Renderizar a view de adicionar usuário
   public function add() {
      $this->render('add');        
   }  
    
   //Método do submit de adicionar usuário
   public function addAction() {

      $name = filter_input(INPUT_POST, 'name');
      $email = filter_input(INPUT_POST, 'email');  
          
      if($name && $email)
      {
         //Verificando se já existe usuário com esse email
         $data = Usuario::select()->where('email', $email)->get();
         
         if(count($data) === 0)
         {
            //inserindo
            Usuario::insert(['name' => $name, 'email' => $email])->execute();
            //Redirecionando para /
            $this->redirect('/');

         }        
      }

      //Redirecionando para /novo
      $this->redirect('/novo');
   }

   //Renderizar a view de edição do usuário
   public function edit($args)
   {
      //Pegando informações do usuário (usamos o Find dessa vez, mas poderíamos usar where)
      $usuario = Usuario::select()->find($args['id']);
      
      //Renderizando a view e passando os dados do usuário
      $this->render('edit', [
         'usuario' => $usuario
      ]);
   }

   //Método do submit de editar usuário
   public function editAction($args)
   {
      $name = filter_input(INPUT_POST, 'name');
      $email = filter_input(INPUT_POST, 'email');  
          
      if($name && $email)
      {
         //Verificando se já existe usuário (sem ser o desse id) com esse email
         $data = Usuario::select()
                 ->where('email', $email)
                 ->where('id','<>',$args['id'])->get();
         
         if(count($data) === 0)
         {
            //atualizando
            Usuario::update()->set('name',$name)->set('email',$email)
                     ->where('id',$args['id'])
                     ->execute();
            //Redirecionando para Home
            $this->redirect('/');

         }        
      }

      //Redirecionando para essa rota abaixo no caso de não editar
      $this->redirect('/usuario/'.$args['id'].'/editar');

   }

   public function del($args)
   {
      //Excluindo
      Usuario::delete()->where('id',$args['id'])->execute();

      //Redirecionando
      $this->redirect('/');

   }

}