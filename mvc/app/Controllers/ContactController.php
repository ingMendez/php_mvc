<?php
namespace App\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{


    public function index(){


        $model = new Contact;

        // ejemplo de agregar mas de un filtro
    //   return $model->where('id','>=',2)
    //                ->where('id','<=',10)
    //          //      ->where('phone','like','%56%')
    //                ->get();


        if(isset($_GET['search'])){
            $model = new Contact;
            $contacts = $model->where('name','LIKE','%'.$_GET['search'].'%')->paginate(3);
            return $this->view('contact.index',compact('contacts'));   
        }else{

       

            // if(1!=3){
            //     return false;
            // }
            // $contacts = $model->all();
            
            // ejemplo de paginacion 
            $contacts = $model->paginate(3);
            // $contacts = $model->paginate();
            


        // return $contact;
        // compact('contact')
        // return $this ->view('contact.index',['contact' => $contact]);
        return $this ->view('contact.index',compact('contacts'));
        }
    }

    public function create(){
        // return "Aqui se mostrara el formulario para crear elcontacto";
        return $this ->view('contact.create');
    }
    public function store(){
        $model = new Contact();
 
        $data = $_POST;
        $model->create($data);

       return $this->redirect('/contact');
        // return "Aqui se procesara el formulario para crear el contacto";
    }

    public function show($id){

        $model  = new Contact();
        $contact = $model->find($id);
        // return $contact;
        return $this->view('contact.show', compact('contact'));
        // return "Aqui se mostrara el contacto con id: $id";
    }
    public function edit($id){
        // return "Aqui se procesara el formulario para editar elcontacto con id: $id";
        $model  = new Contact();
        $contact = $model->find($id);

        return  $this->view('contact.edit', compact('contact'));
    }
    public function update($id){
        // json = new j
        $model = new Contact();
        $data = $_POST;
        $model->update($id,$data);

        // return $data;
       $this->redirect("/contact/{$id}");
        // return "Aqui se procesara el formulario para actulizar elcontacto con id: $id";
    }
    public function destroy($id){
        // return "Aqui se procesara el formulario para eliminar el contacto con id: $id";
       
        $model = new Contact();
        // $data = $_POST;
        $model->delete($id);
        $this->redirect("/contact");

    }

}