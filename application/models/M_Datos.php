<?php

class M_Datos extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarContact($insertParticipante, $tabla){
        $this->db->insert($tabla, $insertParticipante);
        $sql = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sql);
    }

    function insertarShared($insertParticipante, $tabla){
        $this->db->insert($tabla, $insertParticipante);
        $sql = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sql);
    }
}