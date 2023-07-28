<?php 

namespace App\Controllers;
use App\Models\Contact;
class HomeController extends Controller
{ 
    public function index(){

        $contactModel = new Contact();
        // return $contactModel->where("name","juan pere")->get();
    //    return  $contactModel->all();
     //   return  $contactModel->find(2);
     //   return  $contactModel->where('id','<=','2')->get();
    //   return  $contactModel->where('id','2')->get();
    //   return  $contactModel->create([
    //     'name' => 'juan perez 2',
    //     'email' => 'juan@gmail.com',
    //     'phone' => '809777156'
    //   ]);
    // return  $contactModel->update(6,[
    //     'name' => 'pamela la chupamela',
    //     'email' => 'pame@gmail.com',
    //     'phone' => '809777156'
    //   ]);

    //   $contactModel->delete(6);
    //    return "eliminado";

       
    // return $contactModel->where("name","juan pere")->get();
        return $this->view('home', [
        'title' =>'Home',
        'description' => 'esta es la pagina home'
        ]);
    } 

    public function guardar()
    {
        # code...
        return "hola menor";
    }

 

}