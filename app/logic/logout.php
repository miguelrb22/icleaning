<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
session_destroy();

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

$aux = $path.'/icleaning/index.php';

header("Refresh:0; url=$path");