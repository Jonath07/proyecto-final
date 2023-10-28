<?php

session_start();

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('Location: ventas.php');

$id = $_GET['id'];

if(isset($_SESSION['venta'])){
    unset($_SESSION['venta'][$id]);
    header('Location: ventas.php');

}else{
    header('Location: ventas.php');
}