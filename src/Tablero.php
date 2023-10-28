<?php

namespace YocoTec;

use PDO;

class Tablero{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function TotalDelMes(){
        date_default_timezone_set('America/Guatemala');

        $fech = date("Y-m-d");
        $ano = date("Y", strtotime($fech));
        $mes = date("m", strtotime($fech));
        $dia = date("d", strtotime($fech));

        $fechaI = "$ano-$mes-01";
        $fechaF = "$ano-$mes-$dia";

        $sql = "SELECT SUM(total_venta) as SumaTotal FROM tbl_ventas
        WHERE fecha_venta >= '$fechaI' AND fecha_venta <= '$fech'";

        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function DatosDelMes(){
        date_default_timezone_set('America/Guatemala');

        $fech = date("Y-m-d");
        $ano = date("Y", strtotime($fech));
        $mes = date("m", strtotime($fech));
        $dia = date("d", strtotime($fech));

        $fechaI = "$ano-$mes-01";
        $fechaF = "$ano-$mes-$dia";

        $sql = "SELECT * FROM tbl_ventas
        WHERE fecha_venta >= '$fechaI' AND fecha_venta <= '$fech'";

        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function TotalDelDia(){
        date_default_timezone_set('America/Guatemala');

        $fech = date("Y-m-d");

        $sql = "SELECT SUM(total_venta) as SumaTotal FROM tbl_ventas WHERE fecha_venta = '$fech'";
    
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
        return false;
    }

    public function TotalDelDiaAnterior(){
        date_default_timezone_set('America/Guatemala');

        $fech = date("Y-m-d");

        $ano = date("Y", strtotime($fech));
        $mes = date("m", strtotime($fech));

        $dia_anterior = date("d", strtotime("-1 day", strtotime($fech)));

        $fechaI = "$ano-$mes-$dia_anterior";

        $sql = "SELECT SUM(total_venta) as SumaTotal FROM tbl_ventas WHERE fecha_venta = '$fechaI'";
    
        $resultado = $this->cn->prepare($sql);
        if($resultado->execute())
            return $resultado->fetch();
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