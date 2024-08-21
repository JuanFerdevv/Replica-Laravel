<?php

namespace  App\Modell;

use mysqli;

class Modell{

    protected $db_host=db_host;
    protected $db_user=db_user;
    protected $db_password=db_password;
    protected $db_name=db_name;
    protected $conexion; 
    protected $consulta;

    protected $tabla;
    

    public function __construct() {
        $this->conexion();
    }
 
    public  function conexion(){

        $this-> conexion = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

        if ($this->conexion->connect_error) {
            die('error de conexion:'.$this->conexion->connect_error);
        }
    }

    public function consulta($sql,$datos=[],$params=null){

        if ($datos) {
            if ($params==null) {
            $params=str_repeat('s',count($datos));
            }

            $inyc=$this->conexion->prepare($sql);
            $inyc->bind_param($params,...$datos);
            $inyc->execute();
    
            $this->consulta =$inyc->get_result();
        }else{

        $this->consulta = $this->conexion->query($sql);
    }
        return $this;
    }

    public function first(){
        return $this->consulta->fetch_assoc();

    }
    public function last(){
        // Mueve el puntero al final del conjunto de resultados
        $this->consulta->data_seek($this->consulta->num_rows - 1);
        
        // Recupera la última fila como un array asociativo
        return $this->consulta->fetch_assoc();
    }
    
    public function searchLastVariable(){
        $vars = get_class_vars(get_class($this));
        $lastVar = end(array_keys($vars));
        return $lastVar;
    }
    public function get(){
        return $this->consulta->fetch_all(MYSQLI_ASSOC);

    }
    //consultas
    public function all(){
        //select * from usuarios
        $sql="SELECT * FROM {$this->tabla}";
        return $this->consulta($sql)->get();
    }

    public function buscar($id){
        //select * from usuarios where ID=?
        $sql="SELECT * FROM {$this->tabla} where usuario_id = ?";
        return $this->consulta($sql,[$id],'i')->first();
    }

    public function buscar2($id){
        //select * from usuarios where ID=?
        $sql="SELECT * FROM {$this->tabla} where usuario_id = ?";
        return $this->consulta($sql,[$id],'i')->last();
    }
    
    public function buscar3($id){
        
        $sql="SELECT * FROM {$this->tabla} where id_formulario = ?";
        return $this->consulta($sql,[$id],'i')->first();
    }
    public function buscar4($id){
        
        $sql="SELECT * FROM {$this->tabla}
        inner join formulario on usuarios.usuario_id = formulario.usuario_id 
        where formulario.id_formulario = ?";
        return $this->consulta($sql,[$id],'i')->first();
    }
    
    public function where($columna,$operador, $valor=null){
        if ($valor==null) {
            $valor=$operador;
            $operador='=';
            
        }

        $sql="SELECT * FROM {$this->tabla} where {$columna} {$operador} ?";

        $this->consulta($sql, [$valor]);

        return $this;
    }

    public function where2($columna, $operador, $valor = null) {
        if ($valor == null) {
            $valor = $operador;
            $operador = '=';
        }
        $sql = "SELECT  * FROM formulario
        inner join media on {$this->tabla}.id_formulario = media.id_formulario
        WHERE {$columna} {$operador} ?";
        
        $result= $this->consulta($sql, [$valor]);
        
       
        $filas = $result->get();
        
        // Dividir las rutas de archivo en un array para cada fila
        foreach ($filas as &$fila) {
            $ruta_archivo = explode(',', $fila['ruta_archivo']);
            $fila['ruta_archivo'] = $ruta_archivo;
        }
        

        return $filas;
    }
    
    
    

    

    public function insert($datos){
        $columna=array_keys($datos);
        $columna=implode(',',$columna);

        $valor=array_values($datos);
        
        $sql="INSERT INTO  {$this->tabla} ({$columna}) VALUES (".str_repeat('?,',count($datos)-1)."?)";

        $this->consulta($sql,$valor);

        $insert_id=$this->conexion->insert_id;

        return $this->buscar($insert_id); 

    }

    public function update($id,$datos){

        $fields=[];
            foreach ($datos as $key => $valor) {
                $fields[]="{$key}= ?";
            }

        $fields=implode(',',$fields);

        $sql="UPDATE {$this->tabla} SET {$fields} where id = ? ";
        $valor=array_values($datos);
        $valor[]=$id;

        $this->consulta($sql,$valor);

        return $this->buscar($id);
    }

    public function delete($id){
        //delete from usuarios where id=1
        $sql="DELETE from {$this->tabla} where id= ?";
        

        $this->consulta($sql, [$id],'i');
        
    }

    public function insert2($datos) {
        $columna = array_keys($datos);
        $columna = implode(',', $columna);
        
        $valor = array_values($datos);
    
        // Verificamos si algún valor es un array (checkbox o radio)
        foreach ($valor as $key => $value) {
            if (is_array($value)) {
                // Si es un array, convertimos los valores en una cadena separada por comas
                $valor[$key] = implode(',', $value);
            }
        }
    
        $sql = "INSERT INTO {$this->tabla} ({$columna}) VALUES (" . str_repeat('?,', count($datos) - 1) . "?)";
    
        $this->consulta($sql, $valor);
    
        $insert_id = $this->conexion->insert_id;
    
        return $this->buscar($insert_id);
    }
    
    function insertImages($id_formulario, $usuario_id, $uploaded_files) {
        $sql = "INSERT INTO {$this->tabla} (id_formulario, usuario_id, file_type, upload_date, ruta_archivo) VALUES (?, ?, ?, ?, ?)";
    
        foreach ($uploaded_files as $file_data) {
            $params = [
                $id_formulario,
                $usuario_id,
                $file_data['file_type'],
                $file_data['upload_date'],
                $file_data['ruta_archivo'],
            ];
    
            $this->consulta($sql, $params);
        }
    }
    public function almacenarArchivos($id_formulario, $usuario_id, $files) {
        $file_paths = [];
    
        // Loop through all uploaded files
        for ($i = 0; $i < count($files['name']); $i++) {
            $file_name = $files['name'][$i];
            $file_tmp = $files['tmp_name'][$i];
            $file_type = $files['type'][$i];
            $file_size = $files['size'][$i];
    
            // Move file to desired location
            $file_path = 'Assets/Images/' . $file_name;
            move_uploaded_file($file_tmp, $file_path);
    
            $file_paths[] = $file_path;
        }
    
        // Combine the file paths into a single string
        $combinedPaths = implode(',', $file_paths);
    
        // Store the combined paths in the database
        $sql = "INSERT INTO {$this->tabla} (id_formulario, usuario_id, ruta_archivo) VALUES (?, ?, ?)";
        $this->consulta($sql, array($id_formulario, $usuario_id, $combinedPaths));
    }
    
     
    public function getDatosJoin($id){
        $sql = "SELECT * FROM {$this->tabla} 
        INNER JOIN formulario ON usuarios.usuario_id = formulario.usuario_id
        Inner JOIN media ON formulario.id_formulario = media.id_formulario
        WHERE usuarios.usuario_id = ?";
        $result = $this->consulta($sql,[$id]);
        $filas = $result->get();  
       // Dividir las rutas de archivo en un array para cada fila
       foreach ($filas as &$fila) {
           $ruta_archivo = explode(',', $fila['ruta_archivo']);
           $fila['ruta_archivo'] = $ruta_archivo;
       }
       return $filas;
   }
   public function getDatosJoin2($id){
    $sql = "SELECT * FROM {$this->tabla} 
    INNER JOIN media 
    ON formulario.id_formulario = media.id_formulario
    WHERE formulario.id_formulario = ?;";
    $result = $this->consulta($sql,[$id]);
    $filas = $result->get();  

   foreach ($filas as &$fila) {
       $ruta_archivo = explode(',', $fila['ruta_archivo']);
       $fila['ruta_archivo'] = $ruta_archivo;
   }
   return $filas;
}

    public function getDatosJoinG(){
        $sql = "SELECT * FROM {$this->tabla} INNER JOIN formulario ON usuarios.usuario_id = formulario.usuario_id
        Inner JOIN media ON formulario.id_formulario = media.id_formulario";
        $result = $this->consulta($sql);
        return $result->get();
    }

    function getImagesById($id) {
        $sql = "SELECT ruta_archivo FROM media WHERE usuario_id = ?";
        $resultado = $this->consulta($sql, [$id]);
        $imagePaths = [];
    
        while ($fila = $resultado->first()) {
            $rutas = explode(',', $fila['ruta_archivo']);
            $imagePaths = array_merge($imagePaths, $rutas);
        }
        return $imagePaths;
    }
    
    function getall(){
        $sql = "SELECT usuarios.*, formulario.*, media.ruta_archivo AS ruta_archivo
               FROM usuarios
               INNER JOIN formulario ON usuarios.usuario_id = formulario.usuario_id
               INNER JOIN media ON formulario.id_formulario = media.id_formulario";
        
        $result = $this->consulta($sql);
        $filas = $result->get();
        
        // Dividir las rutas de archivo en un array para cada fila
        foreach ($filas as &$fila) {
            $ruta_archivo = explode(',', $fila['ruta_archivo']);
            $fila['ruta_archivo'] = $ruta_archivo;
        }
        

        return $filas;
    }
      
 
    public function registro($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $email = $datos['email'];
        $cedula = $datos['cedula'];
        $celular = $datos['celular'];
        $password = $datos['contrasena'];
        $confirmPassword = $datos['confirmar_contrasena'];
    
        if ($password !== $confirmPassword) {
            return "Las contraseñas no coinciden";
        } else {
            
                $sql = "INSERT INTO {$this->tabla} (nombre, apellido, email, cedula, celular, contrasena) VALUES (?, ?, ?, ?, ?, ?)";
                $resultado = $this->consulta($sql, [$nombre, $apellido, $email, $cedula, $celular, $password]);
                return "Registro exitoso.";
            }
 }
    

 public function login($email, $password) {
    $sql = "SELECT * FROM {$this->tabla} WHERE email = ? AND contrasena = ?";
    $params = 'ss';
    $datos = [$email, $password];
    $result = $this->consulta($sql, $datos, $params)->get();
    if (count($result) == 1) {
        return $result[0];
    } else {
        return false;
    }
}

    public function verificarCedulaExistente($cedula) {
        $sql = "SELECT COUNT(*) as count FROM {$this->tabla} WHERE cedula = ?";
        $resultado = $this->consulta($sql, [$cedula]);
        $fila = $resultado->first();
        return $fila['count'] > 0;
    }

    public function getByEmail($email) {
        $sql = "SELECT * FROM {$this->tabla} WHERE email = ? LIMIT 1";
        $this->consulta($sql, [$email], 's');
        return $this->first();
    }

    public function create($datos) {
        $this->insert($datos);
    }

}


  

