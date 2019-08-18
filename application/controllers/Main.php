<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	public function index(){
		$data['title'] = 'Selamat Datang di Berita Bawean';
		$data['infoterbaru'] = $this->model_berita->info_terbaru(15);
		$data['kategori_utama'] = $this->model_berita->kategori_utama();
		$this->template->load('phpmu-one/template','phpmu-one/view_home',$data);
	}

	public function block(){
		$data['title'] = 'Mohon Matikan AdBlock Anda untuk mengunjungi web ini.';
		$this->template->load('phpmu-one/template','phpmu-one/view_adblock',$data);
	}

	public function browser(){
		$data['title'] = 'Harap Gunakan Browser yang kita rekomendasikan.';
		$this->template->load('phpmu-one/template','phpmu-one/view_browser',$data);
	}
}
