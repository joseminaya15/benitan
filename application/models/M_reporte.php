<?php

class M_reporte extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDatosContact() {
        $sql = "SELECT * FROM contact";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getDatosShared() {
        $sql = "SELECT * FROM shared";
        $result = $this->db->query($sql);
        return $result->result();
    }
}