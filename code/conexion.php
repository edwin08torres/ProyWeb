<?php 

require_once "../Config/config.php";

  class conexion{
    public static function conect()
    {
        $mysql = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $mysql->set_charset(DB_CHARSET);
        if(mysqli_connect_errno()){
            echo "Error en la conexion".mysqli_connect_errno();
        }else{
            // echo "Conexion exitosa ";
        }
        return $mysql;
    }
  }

  // print_r(conexion::conect());
