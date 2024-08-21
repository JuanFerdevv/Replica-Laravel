<?php

namespace App\Controller;
use App\Modell\Usuarios;

class HomeController extends Controller
{
    public function index()
    {
        $usuariosModell=new Usuarios();
        $home=$usuariosModell->getall();
        $model=new Usuarios();
        $last=$model->getall();
        return $this->view('home.home', compact('home','last'));
    }
    public function login(){
        return $this->view('sesiones.login');
    }

    public function loginP() {
        $email = $_POST['email'];
        $password = $_POST['contrasena'];
        $model = new Usuarios();
        $result = $model->login($email, $password);
    
        if ($result) {
            // User is authenticated, store user info in session
            $_SESSION['usuario_id'] = $result['usuario_id'];
            header("Location: /perfil/{$result['usuario_id']}");
            exit(); // Asegura que no se ejecute más código después de la redirección
        } else {
            // Authentication failed, show error message
            $error = 'Correo o contraseña incorrectos';
            return $this->view('sesiones.login', compact('error'));
        }
    }
    
    public function logout()
    {
        session_destroy();
        return $this->redirect('/');
    }

    public function registro(){
        
        return $this->view('sesiones.registro');
    }
    
 
    public function registroP()
    {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $cedula = $_POST['cedula'];
            $celular = $_POST['celular'];
            $password = $_POST['contrasena'];
            $confirm_password = $_POST['confirmar_contrasena'];
        
            // Validate input
            if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
                $error = 'Todos los campos son obligatorios';
                return $this->view('sesiones.registro', compact('error'));
            }
        
            // Check if email already exists
            $model = new Usuarios();
            $result = $model->getByEmail($email);
            if ($result) {
                $error = 'El correo electrónico ya está registrado';
                return $this->view('sesiones.registro', compact('error'));
            }
        
            // Create new user
            $model->create([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'cedula' => $cedula,
                'celular' => $celular,
                'contrasena' =>$password
            ]);
        
            // Redirect to login page
            return $this->redirect('/login');
        }
    

}
