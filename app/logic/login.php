<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');

$_SESSION['name'] = $_POST['name'];
$_SESSION['pass'] = $_POST['pass'];

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

                    header('location: ../../views/inicio.php');
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


