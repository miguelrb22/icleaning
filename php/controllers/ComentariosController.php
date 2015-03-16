<?php

include_once '../models/Comentarios.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class ComentariosController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaComentarios() {
        
        $listaComentarios = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from comentarios");

        foreach($result as $row){
        
            $comentario = new Comentarios($row['idcomentarios'], $row['comentario'], $row['empleado_idempleado']);
            $listaComentarios->addItem($comentario);   
        }
        
        return $listaComentarios;
    }
    
    public function getComentario($idComentario) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from comentarios WHERE idcomentarios=" . $idComentario);
        
        $comentario = new Comentarios($result['idcomentarios'], $result['comentario'], $result['empleado_idempleado']);
        
        return $comentario;
    }
    
    public function insertComentario($comentario) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO comentarios ('comentario', 'empleado_idempleado') VALUES (" . $comentario->getComentario() .
                          ", " . $comentario->getFkIdEmpleado() . ")");
    }
    
    public function updateComentario($comentario) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE comentarios SET 'comentario'=" . $comentario->getComentario() . ", 'empleado_idempleado'=" . $comentario->getFkIdEmpleado() .
                          "WHERE 'idcomentarios'=" . $comentario->getIdComentario());
    }
    
    public function deleteComentario($comentario) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM comentarios WHERE 'idcomentarios'=" . $comentario->getIdComentario());
    }
}

