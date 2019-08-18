<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Berita extends CI_Controller {
	public function index(){
		if (isset($_POST['submit'])){
			$keyword = strip_tags($this->input->post('cari'));
			$data['title'] = 'Hasil Pencarian dengan keyword : '.$keyword;
			$data['berita'] = $this->model_berita->semua_berita_cari(0,18,$keyword);
		}else{
			$data['title'] = 'Semua Berita';
			$jumlah= $this->model_berita->hitungberita()->num_rows();
			$config['base_url'] = base_url().'berita/index';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 15; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}

			if (is_numeric($dari)) {
				$data['berita'] = $this->model_berita->semua_berita($dari, $config['per_page']);
				$data['premium'] = $this->model_berita->semua_berita_premium(3);
			}else{
				redirect('berita');
			}

			$this->pagination->initialize($config);
		}
		$this->template->load('phpmu-one/template','phpmu-one/view_semua_berita',$data);
	}

	public function index1(){
			$jumlah= $this->model_berita->view('berita')->num_rows();
			$config['base_url'] = base_url().'berita/index/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 15; 	
			if ($this->uri->segment('3')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('3');
			}
			
				if ($this->input->post('kata')){
					$data['title'] = "Hasil Pencarian keyword - ".cetak($this->input->post('kata'));
					$data['description'] = description();
					$data['keywords'] = keywords();
					$data['berita'] = $this->model_berita->cari_berita($this->input->post('kata'));
				}else{
					$data['title'] = "Semua Berita";
					$data['description'] = description();
					$data['keywords'] = keywords();
					$data['berita'] = $this->model_berita->view_joinn('berita','users','kategori','username','id_kategori','id_berita','DESC',$dari,$config['per_page']);
					$this->pagination->initialize($config);
				}
			$this->template->load('phpmu-one/template','phpmu-one/view',$data);
	}

	public function detail(){
		if (isset($_POST['submit'])){
			$this->model_berita->tambahkomentar();
			redirect('berita/detail/'.$this->uri->segment(3).'#komentar');
		}else{
			$ids = $this->uri->segment(3);
			$dat = $this->db->query("SELECT * FROM berita where judul_seo='$ids'");
		    $row = $dat->row();
		    $total = $dat->num_rows();
		        if ($total == 0){
		        	redirect('main');
		        }
			$data['title'] = $row->judul;
			if ($this->session->username == $row->username OR $this->session->level == 'admin'){
				$data['record'] = $this->model_berita->berita_detail_penulis($ids)->row_array();
			}else{
				$data['record'] = $this->model_berita->berita_detail($ids)->row_array();
			}

			$data['username'] = $row->username;
			$data['komentar'] = $this->model_berita->komentar_view($row->id_berita);

			$this->model_berita->berita_dibaca_update($ids);
			$this->model_berita->berita_view($row->id_berita);
			$this->template->load('phpmu-one/template','phpmu-one/view_berita',$data);
		}
	}

	public function kategori(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM kategori where kategori_seo='".$this->db->escape_str($ids)."'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('main');
	        }
	    $jumlah= $this->model_berita->hitungberitakategori($row->id_kategori)->num_rows();
		$config['base_url'] = base_url().'berita/kategori/'.$row->kategori_seo;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 15; 	
			if ($this->uri->segment('4')!=''){
				$dari = $this->uri->segment('4');
			}else{
				$dari = 0;
			}

			if (is_numeric($dari)) {
				$data['kategori'] = $this->model_berita->detail_kategori($row->id_kategori, $dari, $config['per_page']);
				$data['premium'] = $this->model_berita->detail_kategori_premium($row->id_kategori,3);
			}else{
				redirect('berita');
			}
		$this->pagination->initialize($config);
		$data['title'] = $row->nama_kategori;
		$this->template->load('phpmu-one/template','phpmu-one/view_kategori',$data);
	}
}
