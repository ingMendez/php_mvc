<?php 

namespace App\Controllers;
class Controller
{

    public function view($route,$data = [])
    {
        # code...
        // destructurar el array
        extract($data);

    //    return $title;

        $route = str_replace('.', '/', $route);
        
      //  return "hola desde la pagina de inicio";
            if(file_exists("../resources/views/{$route}.php")){
                 //   return file("../resources/views/{$route}.php");
                ob_start();
                 //   return include("../resources/views/{$route}.php");
                     include("../resources/views/{$route}.php");
                 $content = ob_get_clean();

                return $content;

                }else{
                return "el archivo  no existe";

            }       

    }
    public function redirect($route)
    {
        # code...
        header("Location: {$route}");
    }

}
