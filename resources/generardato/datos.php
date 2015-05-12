<?php

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/database/DBAccess.php';

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 08/05/2015
 * Time: 17:02
 */
class datos
{


    public $lista_dnis = array();
    public $lista_telefonos = array();
    public $apellidos1 = array();
    public $apellidos2 = array();
    public $nombres = array();
    public $contacto = array();
    public $pass = array();
    public $registros = array();
    public $direcciones = array();

    public $aux = 0;

    public $tam = 0;

    private function letra_nif($dni)
    {
        return substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($dni, "XYZ", "012") % 23, 1);
    }


    public function generar_dnis()
    {

        $dnis = array();
        $dnis2 = array();

        for ($i = 0; $i < $this->tam; $i++) {

            $dni = mt_rand(10000000, 99999999);
            $dni = $dni . $this->letra_nif($dni);

            if (!array_key_exists($dni, $dnis)) {

                $dnis[$dni] = 1;
            } else {
                $i--;
            }
        }

        foreach ($dnis as $dni => $value) {

            array_push($dnis2, $dni);
        }

        $this->lista_dnis = $dnis2;
    }

    public function generar_telefonos()
    {

        $telefonos = array();
        $telefonos2 = array();

        for ($i = 0; $i < $this->tam; $i++) {

            $tel = mt_rand(600000000, 699999999);

            if (!array_key_exists($tel, $telefonos)) {

                $telefonos[$tel] = 1;
            } else {
                $i--;
            }
        }

        foreach ($telefonos as $telefono => $value) {

            array_push($telefonos2, $telefono);
        }

        $this->lista_telefonos = $telefonos2;
    }


    public function generar_apellidos()
    {

        $apellidos = array();

        if (($fichero = fopen("apellidos.csv", "r")) !== FALSE) {

            while (($datos = fgetcsv($fichero, 0, ";")) !== FALSE && $this->aux < $this->tam) {
                // Procesar los datos.


                $i = $datos[3];

                $i = floor(($this->tam * $i) / 1000);


                $t = 0;

                while ($t <= $i && $this->aux < $this->tam) {
                    $this->aux++;
                    array_push($apellidos, utf8_decode($datos[1]));
                    $t++;
                }
            }
        }

        $this->apellidos1 = array_merge($this->apellidos1, $apellidos);

        if ($this->aux < $this->tam) {

            $this->generar_apellidos();
        } else {

            shuffle($this->apellidos1);
            $this->apellidos2 = $this->apellidos1;
            shuffle($this->apellidos2);

        }


    }

    public function generar_nombres()
    {

        $nombres = array();

        if (($fichero = fopen("nombres.csv", "r")) !== FALSE) {

            while (($datos = fgetcsv($fichero, 0, ";")) !== FALSE && $this->aux < $this->tam) {
                // Procesar los datos.


                $i = $datos[3];


                $i = floor(($this->tam * $i) / 1000);


                $t = 0;

                while ($t <= $i && $this->aux < $this->tam) {
                    $this->aux++;
                    array_push($nombres, $datos[1]);
                    $t++;
                }
            }
        }

        $this->nombres = array_merge($this->nombres, $nombres);


        if ($this->aux < $this->tam) {

            $this->generar_nombres();
        } else {

            shuffle($this->nombres);


        }
    }

    public function generar_correos()
    {

        $dominios = array("@hotmail.com", "@hotmail.es", "@outlook.es", "@outlook.com", "@gmail.com", "@yahoo.es", "@yahoo.com", "@aol.com", "@aol.es", "@mail.com", "@mail.es","@latinmail.com", "@latinmail.es", "@hispavista.com","@hispavista.es","@orange.es");
        $correos = array();
        $correos2 = array();


        for ($i = 0; $i < $this->tam; $i++) {

            $key = array_rand($dominios);
            $cola = $dominios[$key];
            $correo = str_replace(" ", "", strtolower($this->nombres[$i] . $this->apellidos1[$i] .mt_rand(1,999). $cola));

            if (!array_key_exists($correo, $correos)) {

                $correos[$correo] = 1;
            } else {
                $i--;
            }
        }

        foreach ($correos as $correo => $value) {

            array_push($correos2, $correo);
        }


        $this->contacto = $correos2;

    }


    public function escribir_fichero()
    {

        $lista = array();

        for ($i = 0; $i < $this->tam; $i++) {

            array_push($lista, array($this->lista_dnis[$i], $this->nombres[$i], $this->direcciones[$i], $this->lista_telefonos[$i],
                $this->contacto[$i], $this->registros[$i], $this->pass[$i], $this->apellidos1[$i] . ' ' . $this->apellidos2[$i]));
        }

        $fp = fopen('fichero.csv', 'w');

        foreach ($lista as $campos) {

            fputcsv($fp, $campos, ';', chr(null));
        }

        fclose($fp);

    }

    function generatePassword()
    {


        for ($i = 0; $i < $this->tam; $i++) {
            array_push($this->pass, mt_rand(11111, 99999));
        }

    }


    function generar_direcciones()
    {


        $sec = array("Plaza", "Calle", "Calle", "Avenida", "Avenida", "Calle");
        $letra = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I');
        for ($i = 0; $i < $this->tam; $i++) {

            $nombre_calle = $sec[array_rand($sec)] . ' ' . $this->nombres[array_rand($this->nombres)] . ' ' . $this->apellidos1[array_rand($this->apellidos1)] . ' Nº' . mt_rand(1, 299) . ' ' . mt_rand(1, 15) . 'º' . $letra[array_rand($letra)];
            array_push($this->direcciones, $nombre_calle);
        }
    }

    function generar_registro()
    {


        for ($i = 0; $i < $this->tam; $i++) {

            $fecha = date('Y-m-j');
            $lap = mt_rand(0, 1000);
            $nuevafecha = strtotime('- ' . $lap . ' day', strtotime($fecha));
            $nuevafecha = date('Y-m-d', $nuevafecha);
            array_push($this->registros, $nuevafecha);


        }
    }


    public function bdsave()
    {

        $link = NEW DBAccess();

        $link->update("LOAD DATA LOCAL INFILE 'fichero.csv'
                      INTO TABLE cliente FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n'
                    (`dni`, `nombre`, `direccion`, `telefono`, `email`, `fecha_registro`,`contrasenya`,`apellidos`);");


    }

    public function init($t)
    {

        $this->tam = $t;
        $this->generar_dnis();
        $this->generar_telefonos();
        $this->generar_apellidos();
        $this->aux = 0;
        $this->generar_nombres();
        $this->aux = 0;
        $this->generar_correos();
        $this->generatePassword();
        $this->generar_registro();
        $this->generar_direcciones();


        //EL ULTIMO
        $this->escribir_fichero();
       // $this->bdsave();

    }
}