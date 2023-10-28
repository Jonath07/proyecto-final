<?php

namespace YocoTec;

use PDO;

class Coordenada{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrar(){
        $sql = "SELECT * FROM tbl_coordenada";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorCliente($id){
        $sql = "SELECT * FROM `tbl_coordenada` WHERE id_cliente = :id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" => $id
        );
        if($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }

    public function mostrarDetalaldo(){
        $sql = "SELECT * FROM tbl_coordenada CO
        INNER JOIN tbl_clientes Cl ON CO.id_cliente = CL.id_cliente;";
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }



}