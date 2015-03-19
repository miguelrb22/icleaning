<?php

include_once 'php/models/Comentarios.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controller
 */
class ComentariosController {
    
    //Properties
    
    //Construct
    
    //Methods
    
    //Tested
    public function getListaComentarios() {
        
        $listaComentarios = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from comentarios");

        foreach($result as $row){
        
            $comentario = new Comentarios($row['idcomentarios'], $row['comentario'], $row['empleado_idempleado']);
            array_push($listaComentarios, $comentario);
        }
        
        return $listaComentarios;
    }
    
    //Tested
    public function getComentario($idComentario) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from comentarios WHERE idcomentarios=" . $idComentario);
        
        foreach ($result as $row) {
            
            $comentario = new Comentarios($row['idcomentarios'], $row['comentario'], $row['empleado_idempleado']);
        }
        
        return $comentario;
    }
    
    //Tested
    public function insertComentario($comentario) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO comentarios (comentario, empleado_idempleado) VALUES ('" . $comentario->getComentario() .
                          "', " . $comentario->getFkIdEmpleado() . ")");
    }
    
    //Tested
    public function updateComentario($comentario) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE comentarios SET comentario='" . $comentario->getComentario() . "', empleado_idempleado=" . $comentario->getFkIdEmpleado() .
                          " WHERE idcomentarios=" . $comentario->getIdComentario());
    }
    
    //Tested
    public function deleteComentario($comentario) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM comentarios WHERE idcomentarios=" . $comentario->getIdComentario());
    }
}

