<?php
require_once dirname(__DIR__) . '/config/config.php';
class Conexion
{
  static public function connect()
  {
    $link = new PDO("mysql:host=" . HOST . ";dbname=" . BD, USER, PASS);
    $link->exec("set names utf8");
    return $link;
  }
}