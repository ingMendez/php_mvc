<?php
namespace App\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{


    public function index(){
        // if((1 & 7) !== 1 ){ // asi iran los permisos solo hay que configurarlo
        //     die("permiso denegado");
        // }

        $model = new User;

            if(isset($_GET['search'])){
            $model = new User;
            $users = $model->where('name','LIKE','%'.$_GET['search'].'%')->paginate(3);
            return $this->view('user.index',compact('users'));   
        }else{

            $users = $model->paginate(10);
            return $this ->view('user.index',compact('users'));
        }
    }
    public function getIndex(){
        // if((1 & 7) !== 1 ){ // asi iran los permisos solo hay que configurarlo
        //     die("permiso denegado");
        // }

        // $model = new User;

        //     if(isset($_GET['search'])){
        //     $model = new User;
        //     $users = $model->where('name','LIKE','%'.$_GET['search'].'%')->paginate(3);
        //     return $this->view('user.index',compact('users'));   
        // }else{

        //     $users = $model->paginate(10);
        //     // return $this ->view('user.index',compact('users'));
        //     echo "hola lenington";
        // }
        echo json_decode("hola lenington");
    }

    public function create(){
        // return "Aqui se mostrara el formulario para crear elcontacto";
        return $this ->view('user.create');
    }
    public function store(){
        $model = new User();
 
        $data = $_POST;
        $user =  array();

        $user["name"] = $data["txtName"];
        $user["user_name"] = $data["txtUsername"];
        $user["email"] = $data["txtEmail"];
        $user["password"] = $data["txtPassword"];

        // var_dump($user);
        if(!$model->create($user,'user_id')){
            var_dump("no fue creado");
            
        }else{
            return $this->redirect('/user');
            
        }

        // return "Aqui se procesara el formulario para crear el contacto";
    }

    public function show($user_id){

        $model  = new user();
       
        $user = $model->find($user_id,'user_id');
        // return $contact;
        // var_dump($user);
        
        return $this->view('user.show', compact('user'));
        // return "Aqui se mostrara el contacto con id: $id";
    }
    public function edit($user_id){
        // return "Aqui se procesara el formulario para editar elcontacto con id: $id";
        $model  = new user();
        $user = $model->find($user_id,'user_id');

        return  $this->view('user.edit', compact('user'));
    }
    public function update($id){
        // json = new j
        $model = new user();
        $data = $_POST;

        $user =  array();

        $user["name"] = $data["txtName"];
        $user["user_name"] = $data["txtUsername"];
        $user["email"] = $data["txtEmail"];
        $user["password"] = $data["txtPassword"];

        $model->update($id,$user,'user_id');

        // return $data;
       $this->redirect("/user/{$id}");
        // return "Aqui se procesara el formulario para actulizar elcontacto con id: $id";
    }
    public function destroy($id){
        // $response = new JsonResponse();
        // return "Aqui se procesara el formulario para eliminar el contacto con id: $id";
        $data = $_POST;
        // die($data);
        $model = new user();
        // $data = $_POST;
        $model->delete($id,'user_id');
         $this->redirect("/user");

    }

}