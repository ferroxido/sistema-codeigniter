<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_tipos_operaciones extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function all(){
        $this->db->select('tipos_operaciones.*, menu.nombre as nombre_menu');
        $this->db->from('tipos_operaciones');
        $this->db->join('menu', 'tipos_operaciones.id_menu = menu.id', 'left');

    	$query = $this->db->get();
    	return $query->result();
    }

    function allFilter($campo, $valor){
        $this->db->select('tipos_operaciones.*, menu.nombre as nombre_menu');
        $this->db->from('tipos_operaciones');
        $this->db->join('menu', 'tipos_operaciones.id_menu = menu.id', 'left');
        $this->db->like($campo, $valor);
        $query = $this->db->get();
        return $query->result();
    }

    function allForMenu(){
        $this->db->order_by('nombre', 'asc');//Opcionalmente usar desc
        $query = $this->db->get('tipos_operaciones');
        return $query->result();
    }

    function find($id){
    	$this->db->where('id',$id);
    	return $this->db->get('tipos_operaciones')->row();
    }

    function get_operaciones($id_menu){
        $this->db->where('id_menu', $id_menu);
        $this->db->order_by('nombre', 'asc');
        $query = $this->db->get('tipos_operaciones');
        return $query->result();
    }

    function get_operaciones_activas($idPerfil){
        $estadoActivo = 1;
        $this->db->select('tipos_operaciones.*');
        $this->db->from('perfiles_tipos_operaciones');
        $this->db->join('tipos_operaciones', 'perfiles_tipos_operaciones.id_tipo_operacion = tipos_operaciones.id');
        $this->db->where('id_perfil', $idPerfil);
        $this->db->where('estado', $estadoActivo);
        $this->db->order_by('nombre', 'asc');
        $query = $this->db->get();
        return $query->result();        
    }

    function insert($registro){
    	$this->db->set($registro);
    	$this->db->insert('tipos_operaciones');
    }

    function update($registro){
    	$this->db->set($registro);
    	$this->db->where('id',$registro['id']);
    	$this->db->update('tipos_operaciones');
    }

    function delete($id){
    	$this->db->where('id',$id);
    	$this->db->delete('tipos_operaciones');
    }

    function get_menu(){
        $lista = array();
        $this->load->model('Model_menu');
        $registros = $this->Model_menu->all();

        foreach ($registros as $registro) {
            $lista[$registro->id] = $registro->nombre;
        }
        return $lista;
    }

}