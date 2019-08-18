<?php 
class Model_auth extends CI_model{
    function register_users(){
    	$config['upload_path'] = 'asset/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('u');
        $hasil=$this->upload->data();
        $data = md5(strip_tags($this->input->post('b')));
        $password = hash("sha512",$data);
        if ($hasil['file_name']==''){
	        $datadb = array('username'=>$this->db->escape_str(strip_tags($this->input->post('a'))),
	                        'password'=>$this->db->escape_str($password),
	                        'nama_lengkap'=>$this->db->escape_str(strip_tags($this->input->post('c'))),
	                        'tanggal_lahir'=>$this->db->escape_str(tgl_simpan($this->input->post('d'))),
                            'kota'=>$this->db->escape_str(strip_tags($this->input->post('e'))),
                            'provinsi'=>$this->db->escape_str(strip_tags($this->input->post('f'))),
                            'negara'=>$this->db->escape_str(strip_tags($this->input->post('g'))),
                            'facebook'=>$this->db->escape_str(strip_tags($this->input->post('h'))),
                            'twitter'=>$this->db->escape_str(strip_tags($this->input->post('i'))),
                            'g_plus'=>$this->db->escape_str(strip_tags($this->input->post('j'))),
                            'pekerjaan'=>$this->db->escape_str(strip_tags($this->input->post('k'))),
                            'alamat_lengkap'=>$this->db->escape_str(strip_tags($this->input->post('l'))),
                            'email'=>$this->db->escape_str(strip_tags($this->input->post('m'))),
                            'no_telp'=>$this->db->escape_str(strip_tags($this->input->post('n'))),
                            'status_hubungan'=>$this->db->escape_str(strip_tags($this->input->post('o'))),
                            'pendidikan'=>$this->db->escape_str(strip_tags($this->input->post('p'))),
                            'nama_bank'=>$this->db->escape_str(strip_tags($this->input->post('q'))),
                            'atas_nama'=>$this->db->escape_str(strip_tags($this->input->post('r'))),
                            'no_rekening'=>$this->db->escape_str(strip_tags($this->input->post('s'))),
                            'tentang_saya'=>$this->db->escape_str(strip_tags($this->input->post('t'))),
                            'level'=>$this->db->escape_str(strip_tags($this->input->post('v'))),
                            'blokir'=>'Y',
                            'id_session'=>$this->db->escape_str($data),
                            'waktu_daftar'=>date('Y-m-d H:i:s'));
	    }else{
	        $datadb = array('username'=>$this->db->escape_str(strip_tags($this->input->post('a'))),
                            'password'=>$this->db->escape_str($password),
                            'nama_lengkap'=>$this->db->escape_str(strip_tags($this->input->post('c'))),
                            'tanggal_lahir'=>$this->db->escape_str(tgl_simpan($this->input->post('d'))),
                            'kota'=>$this->db->escape_str(strip_tags($this->input->post('e'))),
                            'provinsi'=>$this->db->escape_str(strip_tags($this->input->post('f'))),
                            'negara'=>$this->db->escape_str(strip_tags($this->input->post('g'))),
                            'facebook'=>$this->db->escape_str(strip_tags($this->input->post('h'))),
                            'twitter'=>$this->db->escape_str(strip_tags($this->input->post('i'))),
                            'g_plus'=>$this->db->escape_str(strip_tags($this->input->post('j'))),
                            'pekerjaan'=>$this->db->escape_str(strip_tags($this->input->post('k'))),
                            'alamat_lengkap'=>$this->db->escape_str(strip_tags($this->input->post('l'))),
                            'email'=>$this->db->escape_str(strip_tags($this->input->post('m'))),
                            'no_telp'=>$this->db->escape_str(strip_tags($this->input->post('n'))),
                            'status_hubungan'=>$this->db->escape_str(strip_tags($this->input->post('o'))),
                            'pendidikan'=>$this->db->escape_str(strip_tags($this->input->post('p'))),
                            'nama_bank'=>$this->db->escape_str(strip_tags($this->input->post('q'))),
                            'atas_nama'=>$this->db->escape_str(strip_tags($this->input->post('r'))),
                            'no_rekening'=>$this->db->escape_str(strip_tags($this->input->post('s'))),
                            'tentang_saya'=>$this->db->escape_str(strip_tags($this->input->post('t'))),
                            'foto'=>$hasil['file_name'],
                            'level'=>$this->db->escape_str(strip_tags($this->input->post('v'))),
                            'blokir'=>'Y',
                            'id_session'=>$this->db->escape_str($data),
                            'waktu_daftar'=>date('Y-m-d H:i:s'));
	    }
        $this->db->insert('users',$datadb);
    }

    function iklan_tengah_edit($id){
        return $this->db->query("SELECT * FROM iklantengah where id_iklantengah='$id'");
    }

    function iklan_tengah_update(){
    	$config['upload_path'] = 'asset/foto_iklan/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();
        if ($hasil['file_name']==''){
	        $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
	                        'username'=>$this->session->username,
	                        'url'=>$this->input->post('b'),
	                        'tgl_posting'=>date('Y-m-d'));
	    }else{
	        $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
	                        'username'=>$this->session->username,
	                        'url'=>$this->input->post('b'),
	                        'gambar'=>$hasil['file_name'],
	                        'tgl_posting'=>date('Y-m-d'));
	    }
        $this->db->where('id_iklantengah',$this->input->post('id'));
        $this->db->update('iklantengah',$datadb);
    }

    function iklan_tengah_delete($id){
        return $this->db->query("DELETE FROM iklantengah where id_iklantengah='$id'");
    }



    function iklan_sidebar(){
        return $this->db->query("SELECT * FROM pasangiklan");
    }

    function iklan_sidebar_tambah(){
    	$config['upload_path'] = 'asset/foto_iklan/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();
        if ($hasil['file_name']==''){
	        $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
	                        'username'=>$this->session->username,
	                        'url'=>$this->input->post('b'),
	                        'tgl_posting'=>date('Y-m-d'));
	    }else{
	        $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
	                        'username'=>$this->session->username,
	                        'url'=>$this->input->post('b'),
	                        'gambar'=>$hasil['file_name'],
	                        'tgl_posting'=>date('Y-m-d'));
	    }
        $this->db->insert('pasangiklan',$datadb);
    }

    function iklan_sidebar_edit($id){
        return $this->db->query("SELECT * FROM pasangiklan where id_pasangiklan='$id'");
    }

    function iklan_sidebar_update(){
    	$config['upload_path'] = 'asset/foto_iklan/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '3000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('c');
        $hasil=$this->upload->data();
        if ($hasil['file_name']==''){
	        $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
	                        'username'=>$this->session->username,
	                        'url'=>$this->input->post('b'),
	                        'tgl_posting'=>date('Y-m-d'));
	    }else{
	        $datadb = array('judul'=>$this->db->escape_str($this->input->post('a')),
	                        'username'=>$this->session->username,
	                        'url'=>$this->input->post('b'),
	                        'gambar'=>$hasil['file_name'],
	                        'tgl_posting'=>date('Y-m-d'));
	    }
        $this->db->where('id_pasangiklan',$this->input->post('id'));
        $this->db->update('pasangiklan',$datadb);
    }

    function iklan_sidebar_delete($id){
        return $this->db->query("DELETE FROM pasangiklan where id_pasangiklan='$id'");
    }
}