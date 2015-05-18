<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');

$filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

$_SESSION['name'] = utf8_decode($filtro->real_escape_string($_POST['name']));
$_SESSION['pass'] = utf8_decode($filtro->real_escape_string($_POST['pass']));
$_SESSION['login'] = 1;
$_SESSION['activa'] = false;

if ($_POST) {

    if ($_SESSION['name'] && $_SESSION['pass']) {

        $dbAccess = new DBAccess();
        $query = $dbAccess->getSelect( "select * from cliente where email='" . $_SESSION['name'] . "'");
        $numrows = mysqli_num_rows($query);

        if ($numrows != 0) {

            while ($row = mysqli_fetch_assoc($query)) {

                $bdnombre = $row['email'];
                $bdpassword = $row['contrasenya'];
            }

            if ($_SESSION['name'] == $bdnombre) {

                if ($_SESSION['pass'] == $bdpassword) {

                    $_SESSION['activa'] = true;
                    header('location: ../../resources/views/clienteV.php');
                } else {

                    header('location: ../../index.php?e=1');
                }
            } else {

                header('location: ../../index.php?e=2');
            }


        } else {
            header('location: ../../index.php?e=4');
        }
    } else {
        header('location: ../../index.php?e=4');
    }
} else {

    header('location: ../../index.php');
}


