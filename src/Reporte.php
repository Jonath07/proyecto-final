<?php

namespace YocoTec;

use PDO;

class Reporte{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function mostrarPorFecha($_params){
        date_default_timezone_set('America/Guatemala');

        $sql = "SELECT * FROM tbl_ventas
        WHERE fecha_venta >= ':p1' AND fecha_venta <= ':p2'";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":p1" => $_params['fechaUno'],
            ":p2" => $_params['fechaDos']
        );
        if($resultado->execute($_array))
            return $resultado->fetchALL();
        return false;
    }

    public function mesAnterior(){
        date_default_timezone_set('America/Guatemala');

        $fech = date("Y-m-d");
        $ano = date("Y", strtotime($fech));

        $mes_anterior = date("m", strtotime("-1 month", strtotime($fech)));

        $fechaI = "$ano-$mes_anterior-01";
        $fechaF = "$ano-$mes_anterior-31";

        $sql = "SELECT SUM(total_venta) as SumaTotal FROM tbl_ventas
        WHERE fecha_venta >= '$fechaI' AND fecha_venta <= '$fechaF'";

        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

}