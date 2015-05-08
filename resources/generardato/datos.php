<?php

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
    public $aux = 0;

    public $tam;

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

    public function escribir_fichero()
    {

        $lista = array(
            $this->lista_dnis,
            $this->lista_telefonos,
            $this->apellidos1
        );

        $fp = fopen('fichero.csv', 'w');

        foreach ($lista as $campos) {
            fputcsv($fp, $campos);
        }

        fclose($fp);

    }

    public function generar_primer_apellido(){

        $apellidos = array();

        if (($fichero = fopen("apellidos.csv", "r")) !== FALSE) {

            while (($datos = fgetcsv($fichero, 0, ";")) !== FALSE && $this->aux < $this->tam) {
                // Procesar los datos.



                $i = $datos[3];

                $i = floor(($this->tam*$i)/1000);


                $t = 0;

                while($t <= $i && $this->aux < $this->tam){
                    $this->aux++;
                    array_push($apellidos,utf8_decode($datos[1]));
                    $t++;
                }



                // en $datos[1] está el valor del segundo campo, etc...
            }
        }

        $this->apellidos1= array_merge($this->apellidos1,$apellidos);

        if($this->aux < $this->tam){

            $this->generar_primer_apellido();
        }

        else shuffle($this->apellidos1);

    }

    public function init($t)
    {

        $this->tam = $t;
        $this->generar_dnis();
        $this->generar_telefonos();
        $this->generar_primer_apellido();
        $this->escribir_fichero();
    }
}