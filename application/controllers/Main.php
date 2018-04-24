<?php if (!defined('BASEPATH')) exit('No script allowed here');

class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Main_m');
    }

    function index(){

        $data['matkul'] = $this->Main_m->read('matakuliah');
        $data['asisten'] = $this->Main_m->readone();

        $this->load->view('main_view',$data);

    }

    function insert(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'png|jpg';

        $this->load->library('upload',$config);

        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $ub = $this->input->post('ub');
        $kodematkul = $this->input->post('matkul');
        
        if (!$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
        } else {
            $foto = $this->upload->data('full_path');
        }

        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'bulanan' => $ub,
            'foto' => $foto,
            'kodematkul' => $kodematkul
        );

        $this->Main_m->insert($data);

        redirect('');

    }

    function edit(){
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $ub = $this->input->post('ub');

        $data = array(
            'nama' => $nama,
            'bulanan' => $ub
        );

        $where = array(
            'nim' => $nim
        );

        $this->Main_m->edit_data($where,$data,'asisten');
        redirect('');
    }

    function delete($id){
        $where = array('nim' => $id);
        $this->Main_m->delete_data($where,'asisten');
        redirect('');
    }

}