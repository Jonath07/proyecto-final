<?php

namespace YocoTec;

use PDO;

class Cliente{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_clientes";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorID($id){
        $sql = "SELECT * FROM tbl_clientes WHERE id_cliente = $id";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function registrar($_params){
        $sql = "INSERT INTO tbl_clientes(`nombre_cliente`,`apellido_cliente`,`estado_cliente`,`fecha_cliente`,`hora_cliente`,`usuario`,`direccion_cliente`,`telefono_cliente`,`email_cliente`,`referencia_cliente`) 
        VALUES (:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['nombre'],
            ":p2" => $_params['apellido'],
            ":p3" => $_params['estado'],
            ":p4" => $_params['fecha'],
            ":p5" => $_params['hora'],
            ":p6" => $_params['usuario'],
            ":p7" => $_params['direccion'],
            ":p8" => $_params['telefono'],
            ":p9" => $_params['email'],
            ":p10" => $_params['referencia']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($_params){
        $sql = "UPDATE tbl_clientes SET nombre_cliente = :p1, apellido_cliente = :p2, estado_cliente = :p3,usuario = :p4,
        direccion_cliente = :p5,telefono_cliente = :p6,email_cliente = :p7,referencia_cliente = :p8 WHERE id_cliente = :id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $_params['id'],
            ":p1" => $_params['nombre'],
            ":p2" => $_params['apellido'],
            ":p3" => $_params['estado'],
            ":p4" => $_params['usuario'],
            ":p5" => $_params['direccion'],
            ":p6" => $_params['telefono'],
            ":p7" => $_params['email'],
            ":p8" => $_params['referencia']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function registrarCoordenada($_params){
        $sql = "INSERT INTO tbl_coordenada(`id_cliente`, `fecha_coordenada`, `usuario`, `cordenada_y_cliente`, `cordenada_x_cliente`) 
        VALUES (:p1,:p2,:p3,:p4,:p5)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['id'],
            ":p2" => $_params['fecha'],
            ":p3" => $_params['usuario'],
            ":p4" => $_params['coo1'],
            ":p5" => $_params['coo2'],
            
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function eliminar($id){
        $sql = "UPDATE `tbl_clientes` SET estado_cliente = '2' WHERE id_cliente=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function activar($id){
        $sql = "UPDATE `tbl_clientes` SET estado_cliente = '1' WHERE id_cliente=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

}