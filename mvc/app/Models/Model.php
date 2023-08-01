<?php 

namespace App\Models;
use mysqli;
class Model
{

    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME; 
    protected $connection; 
    protected $query; 

    protected $sql,$data =[],$params = null;

    protected $orderBy = '';
    protected $table; 

    public function __construct(){
        $this->connection();
    }

    public function connection(){
        # code...
        $this->connection = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

        if($this->connection->connect_error){
          //  echo "la conexion fallo";
            die('error de conexion :'.$this->connection->connect_error);
        }

    }

    public function query($sql,$data = [],$params = null){
        # code...
        // con el asociativo te trae uno con el all lo trAE TODO
       // $query = $this->connection->query($sql)->fetch_all(MYSQLI_ASSOC);
       if($data){
        if($params == null){
            $params = str_repeat('s',count($data));
        }
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param($params,...$data);
        $stmt->execute();
        $this->query = $stmt->get_result();
       }else{

           $this->query = $this->connection->query($sql);
       
        }



     return $this;
    }

    function orderBy($column,$order = 'ASC'){

        if(empty($this->orderBy)){
            $this->orderBy = "ORDER BY {$column} {$order}";
        }else{
            $this->orderBy .= ", {$column} {$order}";
        }

        
    }
    
    public function first(){
        # code...
        
        //metodo asociativo

        if(empty($this->query)){
            if(empty($this->sql)){
                $this->sql = "SELECT * FROM {$this->table}";
            }
            $this->sql .= $this->orderBy;

            $this->query($this->sql,$this->data,$this->params);
        }

        return  $this->query->fetch_assoc();

    }
    public function get(){
        # code...
        //metodo todos
        
        if(empty($this->query)){

            if(empty($this->sql)){
                $this->sql = "SELECT * FROM {$this->table}";
            }
            $this->sql .= $this->orderBy;

            $this->query($this->sql,$this->data,$this->params);
        }
        return  $this->query->fetch_all(MYSQLI_ASSOC);

    }

    public function paginate($cant = 3){
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pagues = $page;
        // esto es previniendo que la paginacion la mande en 0 o menos que 0
        $page = ($page >0)? (($page-1) *$cant) : 0;
       
        if($this->sql){
            $sql = $this->sql ." LIMIT " . $page .",{$cant}";
            $data = $this->query($sql,$this->data,$this->params)->get();
        }else{
            
            $sql = "SELECT SQL_CALC_FOUND_ROWS  * FROM {$this->table} ". ($this->orderBy ?? '') . "  LIMIT {$page},{$cant}";
            $data = $this->query($sql)->get();
        }

        
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri,'/');
       
        if(strpos($uri,'?')){
        $uri = substr($uri,0,strpos($uri,'?'));
        }
        //   return '/'. $uri . '?page='. ($pagues - 1);
         $total = $this->query('SELECT FOUND_ROWS() AS total')->first()['total'];

        //  el metodo ceit se utiliza para pasar al entero posterior muy buena opcion para la paginacion
         $last_pague = ceil($total /$cant);
        //  return $total;
        return [
            'total' => $total,     
            // esto es para la paginacion
            'from' => ($page +1),
            'to' => ($page + count($data)),
            'current_page' => $pagues,
            'last_page' => $last_pague,
            'next_pege_url' =>$pagues < $last_pague ? ('/'. $uri . '?page='. $pagues +1) : null,
            'prev_page_url' => $pagues > 1 ? ('/'. $uri . '?page='. $pagues -1) : null,
            'data' => $data
        ];

    }

    // consultas preparadas una chuladas

    public function all(){
        # code...
        //'SELECT * FROM contacts'
       // return $this->table;

        $sql = "SELECT * FROM {$this->table}";
       return $this->query($sql)->get();
    }

    public function find($id,$id_table = null){
        # code...
        //'SELECT * FROM contacts'
       // return $this->table;
       $ids ='id';
       if($id_table !== null){
        $ids = $id_table;
       }

        $sql = "SELECT * FROM {$this->table} WHERE {$ids} = ?";
       return $this->query($sql,[$id],'i')->first();
    }
    
    public function where($column,$operator,$value = null){
        # code...
        //'SELECT * FROM contacts'
       // return $this->table;
       if($value == null){
        $value = $operator;
        $operator = '=';
       }

       if(empty($this->sql)){
        $this->sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} WHERE {$column} {$operator} ?";   
        $this->data[] = $value;
       }else{
        $this->sql .=" AND {$column} {$operator}?";
        $this->data[] = $value;
       }
        // con esto se evita inyeccion sql;
      //$value =  $this->connection->real_escape_string($value);
      
      // $stmt->bind_param('ss',$value,$value2);
      

        // $this->query($sql,[$value]);
        
        return $this;
    }

    public function create ($data,$id = null)
    {
        # code...
        //INSERT INTO contacts (name,email,phone) VALUES  (? ,? ,? )
        $colums = array_keys($data);
        $colums =  implode(',',$colums);
        
        $values = array_values($data);
        //  var_dump($values);
        $sql = "INSERT INTO {$this->table} ({$colums}) VALUES  (".str_repeat('?,',count($values) - 1) . " ?)";
        // var_dump($sql);
       
        // $sql = "INSERT INTO {$this->table} ({$colums}) VALUES  ({$values})";
        $this->query($sql,$values);

        $insert_id =  $this->connection->insert_id;
        
        return $this->find($insert_id,$id); 
    }

    public function update ($id,$data,$id_table = null)
    {
        # code...
        //UPDATE contacts SET name =? ,email =?,phone=? WHERE id = 1
        $ids ='id';
        if($id_table !== null){
         $ids = $id_table;
        }

        $fields = [];
        var_dump($data);
        foreach ($data as $key => $value) {

            $fields[] = "{$key} = ?";   
        }
        $fields = implode(', ', $fields) ;
        $sql = "UPDATE {$this->table} SET {$fields}  WHERE {$ids} = ?";
        $values = array_values($data); 
        $values [] = $id;
        // return $values;
        $this->query($sql,$values);

       // $insert_id =  $this->connection->insert_id;
        
        return $this->find($id,$ids); 
    }

    public function delete ($id,$id_table = null)
    {
        # code...
        //DELETE FROM  CONTACTS WHERE id = 1
        $ids ='id';
        if($id_table !== null){
         $ids = $id_table;
        }
       
        $sql = "DELETE FROM {$this->table}  WHERE {$ids} = ?";

        $this->query($sql,[$id],'i');

   
        
      //  return $this->find($id); 
    }
    


}
