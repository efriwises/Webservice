<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Crud_m
 *
 * @author windows8.1
 */
class Crud_m extends CI_Model{
    //put your code here
    function select($table) {
        $query = $this->db->query("Select * from $table");
        return $query->result();
    }
    function select_where($table, $where){
        $query = $this->db->query("Select * from $table where $where");
        return $query->result();
    }
    function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    function update($table, $data, $field, $id) {
        $this->db->where($field, $id);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    function delete($table, $field, $id) {
        $this->db->where($field, $id);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
}
