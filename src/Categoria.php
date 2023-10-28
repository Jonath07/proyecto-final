<?php

namespace YocoTec;

use PDO;

class Categoria{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_categorias";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarActivo(){
        $sql = "SELECT * FROM tbl_categorias WHERE estado_categoria = 1";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorID($id){
        $sql = "SELECT * FROM tbl_categorias WHERE id_categoria = $id";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }
    

    public function registrar($_params){
        $sql = "INSERT INTO tbl_categorias(`nombre_categoria`,`estado_categoria`,`fecha_categoria`,`hora_categoria`,`usuario`) 
        VALUES (:p1,:p2,:p3,:p4,:p5)";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['nombre'],
            ":p2" => $_params['estado'],
            ":p3" => $_params['fecha'],
            ":p4" => $_params['hora'],
            ":p5" => $_params['usuario']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar($_params){
        $sql = "UPDATE tbl_categorias SET nombre_categoria=:p1, estado_categoria=:p2, usuario=:p3 WHERE id_categoria =:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $_params['id'],
            ":p1" => $_params['nombre'],
            ":p2" => $_params['estado'],
            ":p3" => $_params['usuario']
        );
        if($resultado->execute($_array)){
            return true;
        }else{
            return false;
        }
    }


    public function eliminar($id){
        $sql = "UPDATE `tbl_categorias` SET estado_categoria = '2' WHERE id_categoria=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function activar($id){
        $sql = "UPDATE `tbl_categorias` SET estado_categoria = '1' WHERE id_categoria=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return true;
        return false;
    }

}