<?php
require_once '../config/conexion.php';
session_start();

class Login extends Conexion
{
    
    private function crear_sesion($datos)
    {
        $_SESSION['usuario'] = $datos;
    }

    
    public function cerrar_sesion()
    {
        session_unset();
        session_destroy();
        echo json_encode([1, "Cierre de sesión exitoso"]);
    }


    public function iniciar_sesion()
    {
        
        if (empty($_POST['usuario']) || empty($_POST['password'])) {
            echo json_encode([0, "Por favor, complete todos los campos."]);
            return;
        }

        
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);

        
        if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
            echo json_encode([0, "El usuario debe ser un correo electrónico válido."]);
            return;
        }

        try {
            
            $consulta = $this->obtener_conexion()->prepare("SELECT * FROM t_usuario WHERE usuario = :usuario");
            $consulta->bindParam(":usuario", $usuario);
            $consulta->execute();

            
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($datos) {
                
                if (password_verify($password, $datos['password'])) {
                    $this->crear_sesion($datos);
                    echo json_encode([1, "Inicio de sesión correcto"]);
                } else {
                    echo json_encode([0, "La contraseña es incorrecta."]);
                }
            } else {
                echo json_encode([0, "El usuario no existe en el sistema."]);
            }
        } catch (PDOException $e) {
            echo json_encode([0, "Error en la base de datos: " . $e->getMessage()]);
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $metodo = $_POST['metodo'] ?? null;
    if ($metodo && method_exists('Login', $metodo)) {
        $consulta = new Login();
        $consulta->$metodo();
    } else {
        echo json_encode([0, "Método no válido."]);
    }
}
?>
