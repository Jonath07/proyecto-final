<?php

namespace YocoTec;

use PDO;

class Usuario{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'

        ));

    }

    public function login($pass,$user){
        $sql = "SELECT * FROM `tbl_usuarios` WHERE contrasena_usuario = :sqContrasena AND usuario = :sqUsuario";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":sqContrasena" => $pass,
            ":sqUsuario" => $user
        );
        if($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_usuarios";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorID($id){
        $sql = "SELECT * FROM tbl_usuarios WHERE id_usuario = $id";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function registrar($_params){
        $sql = "INSERT INTO tbl_usuarios(`nombre_usuario`,`apellido_usuario`,`usuario`,`email_usuario`,`contrasena_usuario`,`estado_usuario`,`direccion_usuario`,`img_usuario`) 
        VALUES (:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['nombre'],
            ":p2" => $_params['apellido'],
            ":p3" => $_params['usuario'],
            ":p4" => $_params['email'],
            ":p5" => $_params['password'],
            ":p6" => $_params['estado'],
            ":p7" => $_params['direccion'],
            ":p8" => $_params['img']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($_params){
        $sql = "UPDATE tbl_usuarios SET nombre_usuario=:p1, apellido_usuario=:p2,usuario=:p3,email_usuario=:p4,
        contrasena_usuario=:p5,estado_usuario=:p6,direccion_usuario=:p7,img_usuario=:p8 WHERE id_usuario =:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $_params['id'],
            ":p1" => $_params['nombre'],
            ":p2" => $_params['apellido'],
            ":p3" => $_params['usuario'],
            ":p4" => $_params['email'],
            ":p5" => $_params['password'],
            ":p6" => $_params['estado'],
            ":p7" => $_params['direccion'],
            ":p8" => $_params['img']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function eliminar($id){
        $sql = "UPDATE `tbl_usuarios` SET estado_usuario = '2' WHERE id_usuario=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function activar($id){
        $sql = "UPDATE `tbl_usuarios` SET estado_usuario = '1' WHERE id_usuario=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }


}