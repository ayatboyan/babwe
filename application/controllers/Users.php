<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function chat(){
		cek_session_user_all();
		$data['title'] = 'Chatroom';
		$this->template->load('phpmu-one/template','phpmu-one/view_chatroom',$data);
	}

	public function kirim_chat(){
		$this->model_users->kirim_chat();
        redirect ("users/ambil_pesan");
    }
     
    public function ambil_pesan(){
    	$data['ambilpesan'] = $this->model_users->ambil_pesan();
    	$this->load->view('phpmu-one/view_chatroom_messages',$data);
    }

	function profile(){
		cek_session_user_all();
		$data['title'] = 'Data Profile Anda';
		if ($this->uri->segment(3) != ''){
			$data['row'] = $this->model_users->profile($this->uri->segment(3))->row_array();
		}else{
			$data['row'] = $this->model_users->profile($this->session->username)->row_array();
		}
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_profile',$data);
	}

	function editprofile(){
		cek_session_user_all();
		if (isset($_POST['submit'])){
			$this->model_users->profile_update();
			redirect('users/profile');
		}else{
			$data['title'] = 'Edit Data Profile Anda';
			$data['row'] = $this->model_users->profile($this->session->username)->row_array();
			$this->template->load('phpmu-one/template','phpmu-one/penulis/view_profile_edit',$data);
		}
	}

	function koleksifoto(){
		cek_session_user_all();
		if (isset($_POST['submit'])){
			$this->model_users->koleksifoto_tambah();
			redirect('users/koleksifoto');
		}else{
			$data['title'] = 'Semua Koleksi Foto';
			$jumlah= $this->model_users->hitungkoleksifoto($this->session->username)->num_rows();
			$config['base_url'] = base_url().'users/koleksifoto';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 52; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}

			if (is_numeric($dari)) {
				$data['koleksifoto'] = $this->model_users->koleksifoto($this->session->username, $dari, $config['per_page']);
			}else{
				redirect('users/koleksifoto');
			}
			$this->pagination->initialize($config);
			$this->template->load('phpmu-one/template','phpmu-one/penulis/view_koleksifoto',$data);
		}
	}

	function delete_koleksifoto(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		$this->model_users->koleksifoto_delete($id,$this->session->username);
		redirect('users/koleksifoto');
	}

	function tulisan(){
		cek_session_user_all();
			$data['title'] = 'Semua Tulisan Anda';
			$jumlah= $this->model_users->hitungtulisanusers($this->session->username)->num_rows();
			$config['base_url'] = base_url().'users/tulisan';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 18; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}

			if (is_numeric($dari)) {
				$data['tulisan'] = $this->model_users->tulisan($this->session->username, $dari, $config['per_page']);
			}else{
				redirect('users/tulisan');
			}

		$this->pagination->initialize($config);
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_tulisan',$data);
	}

	function tambah_tulisan(){
		cek_session_user_all();
		if (isset($_POST['submit'])){
			$this->model_users->list_berita_tambah();
			redirect('users/tulisan');
		}else{
			$data['title'] = 'Tambahkan Tulisan Baru';
			$data['tag'] = $this->model_users->tag_berita();
			$data['record'] = $this->model_users->kategori_berita_user($this->session->level);
			$this->template->load('phpmu-one/template','phpmu-one/penulis/view_tulisan_tambah',$data);
		}
	}

	function edit_tulisan(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_users->list_berita_update();
			redirect('users/tulisan');
		}else{
			$data['title'] = 'Edit Tulisan Terpilih';
			$data['tag'] = $this->model_users->tag_berita();
			$data['record'] = $this->model_users->kategori_berita_user($this->session->level);
			$data['rows'] = $this->model_users->list_berita_edit($id,$this->session->username)->row_array();
			$this->template->load('phpmu-one/template','phpmu-one/penulis/view_tulisan_edit',$data);
		}
	}

	function delete_tulisan(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		$this->model_users->list_berita_delete($id,$this->session->username);
		redirect('users/tulisan');
	}

	function form_lowker(){
		$this->load->view('phpmu-one/penulis/form_lowker');
	}

	function penghasilan(){
		cek_session_penulis();
		$data['title'] = 'Semua Penghasilan Anda';
		$data['publish'] = $this->model_users->penghasilan_publish($this->session->username);
		$data['bayar'] = $this->model_users->penghasilan_bayar_history($this->session->username);

		$data['totpublish'] = $this->model_users->penghasilan_publish_total($this->session->username)->row_array();
		$data['totbayar'] = $this->model_users->penghasilan_bayar($this->session->username)->row_array();

		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_penghasilan',$data);
	}

	function revisi(){
		cek_session_user_all();
		$data['title'] = 'Revisi Untuk Tulisan Anda';
		$data['revisi'] = $this->model_users->revisi_tulisan($this->session->username, $this->uri->segment(3));
		$data['record'] = $this->model_users->revisi_tulisan_detail($this->session->username, $this->uri->segment(3))->row_array();
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_tulisan_revisi',$data);
	}

	function aktivasi(){
		$password = $this->uri->segment(3);
		$cek = $this->db->query("SELECT * FROM users where password='".$this->db->escape_str($password)."' AND blokir='Y'");
		$row = $cek->row_array();
		$total = $cek->num_rows();
			if ($total > 0){
				$this->db->query("UPDATE users SET blokir='N' where password='".$this->db->escape_str($password)."'");
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level']));
				redirect('main');
			}else{
				$data['title'] = 'Log In &rsaquo; Pengguna';
				$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
			}
	}

	function pesan(){
		cek_session_user_all();
		$jumlah= $this->model_users->jumlah()->num_rows();
		$config['base_url'] = base_url().'users/pesan/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10; 	
		if ($this->uri->segment('3')==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment('3');
		}
		if (isset($_POST['cari'])){
			$cari = $this->input->post('data');
			$data['record']= $this->model_users->pencarian_messages($cari);
		}else{
			if (is_numeric($dari)) {
				$data['record']= $this->model_users->tampilmessages($config['per_page'],$dari);
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
		}
		$data['title'] = 'Pesan Masuk';
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_pesan',$data);
	}

	function read(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		$jumlah= $this->model_users->jumlahpesan($id)->num_rows();
		$config['base_url'] = base_url().'users/read/'.$id.'/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 20; 	
			if ($this->uri->segment('4') == ''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}

		$cek_stat = $this->uri->segment(4);
		if (is_numeric($dari)) {
			$data['pesan'] = $this->model_users->modread($id, $config['per_page'], $dari);
		}else{
			redirect('main');
		}

		$this->pagination->initialize($config);
		if ($cek_stat != 'terkirim'){
			$datadbs = array('stat'=>'0');
	        $this->db->where('user1',$id);
	        $this->db->update('messages',$datadbs);
    	}
    	$dat = $this->db->query("SELECT nama_lengkap FROM users where username='$id'");
        $row = $dat->row();
    	$data['title'] = 'Percakapan - '.$row->nama_lengkap;
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_pesan_detail',$data);
	}

	function kirimpesan(){
		cek_session_user_all();
		$this->model_users->modkirimpesan();
		$id = $this->input->post('user2');
		redirect('users/read/'.$id);
	}

	function download(){
		cek_session_user_all();
		$name = $this->uri->segment(3);
		$data = file_get_contents("asset/files_messages/".$name);
		force_download($name, $data);
	}

	function permintaanteman(){
		cek_session_user_all();
		$data['permintaanteman'] = $this->model_users->permintaanteman($this->session->username);
		$data['title'] = 'Permintaan Untuk Jadi Teman Anda';
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_permintaan_teman',$data);
	}

	function semuateman(){
		cek_session_user_all();
		$data['semuateman'] = $this->model_users->semuateman($this->session->username);
		$data['title'] = 'Semua Teman Anda';
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_semua_teman',$data);
	}

	function cariteman(){
		cek_session_user_all();
		$keyword = strip_tags($this->input->post('cari'));
		$data['cariteman'] = $this->model_users->cariteman($keyword);
		$data['title'] = 'Hasil Pencarian Teman : '.$keyword;
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_semua_teman_cari',$data);
	}

	function aktivitas(){
		cek_session_user_all();
		$data['aktivitasteman'] = $this->model_users->aktivitasteman($this->session->username);
		$data['mediateman'] = $this->model_users->mediateman($this->session->username);
		$data['komentarteman'] = $this->model_users->komentarteman($this->session->username);
		$data['title'] = 'Aktivitas Teman Anda';
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_semua_teman_aktivitas',$data);
	}

	function confirm(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		$this->model_users->confirm($id,$this->session->username);
		redirect('users/permintaanteman');
	}

	function block(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		$this->model_users->block($id,$this->session->username);
		redirect('users/semuateman');
	}

	function add(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		$this->model_users->add($id,$this->session->username);
		redirect('berita/detail/'.$this->uri->segment(4).'#add');
	}

	function addcari(){
		cek_session_user_all();
		$id = $this->uri->segment(3);
		$this->model_users->add($id,$this->session->username);
		echo "<script>window.alert('Permintaan Pertemanan Telah Terkirim!');
                                  window.location=('".base_url()."users/semuateman')</script>";
	}

	function statistik_tulisan(){
		$data['title'] = 'Statistik Klik atau Pageview Tulisan';
		$this->template->load('phpmu-one/template','phpmu-one/penulis/view_statistik_tulisan',$data);
	}
}
