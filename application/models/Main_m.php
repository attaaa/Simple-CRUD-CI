<?php if (!defined('BASEPATH')) exit('No script allowed here');

class Main_m extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function read($db){
        return $this->db->get($db)->result();
    }

    function readone(){
        return $this->db->query('SELECT * FROM asisten JOIN matakuliah USING(kodematkul)')->result();
    }

    function insert($data){
        $this->db->insert('asisten',$data);
    }

    function edit_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}