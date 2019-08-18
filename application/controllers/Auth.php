<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function users(){
		if (isset($_POST['submit'])){
			if ($this->input->post() && (strtolower($this->input->post('secutity_code')) == strtolower($this->session->userdata('mycaptcha')))) {
				$this->model_auth->register_users();
				$this->session->set_userdata(array('email'=>$this->input->post('m')));
					$email_tujuan = strip_tags($this->input->post('m'));
					$passwordaktif = md5(strip_tags($this->input->post('b')));
	        		$aktivasi = hash("sha512",$passwordaktif);

					$tglaktif = date("d-m-Y H:i:s");
					$subject      = 'Konfirmasi Aktivasi akun Users di Netsosial...';
					$message      = "<html><body>Halooo! <b>".strip_tags($this->input->post('c'))."</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan permohonan untuk akun users di http://netsosial.info
						<table style='width:100%; margin-left:25px'>
			   				<tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi Anda : </b></td></tr>
							<tr><td width='140px'><b>Username</b></td>			<td> : <b>".strip_tags($this->input->post('a'))."</b></td></tr>
							<tr><td><b>Password</b></td>			<td> : ".strip_tags($this->input->post('b'))."</td></tr>
							<tr><td><b>Nama Lengkap</b></td>		<td> : ".strip_tags($this->input->post('c'))."</td></tr>
							<tr><td><b>Tanggal Lahir</b></td>		<td> : ".strip_tags($this->input->post('d'))."</td></tr>
							<tr><td><b>Kota</b></td>		<td> : ".strip_tags($this->input->post('e'))."</td></tr>
							<tr><td><b>Provinsi</b></td>				<td> : ".strip_tags($this->input->post('f'))." </td></tr>
							<tr><td><b>Negara</b></td>			<td> : ".strip_tags($this->input->post('g'))." </td></tr>
							<tr><td><b>Facebook</b></td>			<td> : ".strip_tags($this->input->post('h'))." </td></tr>
							<tr><td><b>Twitter</b></td>	<td> : ".strip_tags($this->input->post('i'))." </td></tr>
							<tr><td><b>Google+</b></td>	<td> : ".strip_tags($this->input->post('j'))." </td></tr>
							<tr><td><b>Pekerjaan</b></td>	<td> : ".strip_tags($this->input->post('k'))." </td></tr>
							<tr><td><b>Alamat Lengkap</b></td>	<td> : ".strip_tags($this->input->post('l'))." </td></tr>
							<tr><td><b>Email</b></td>	<td> : ".strip_tags($this->input->post('m'))." </td></tr>
							<tr><td><b>No Telpon</b></td>	<td> : ".strip_tags($this->input->post('n'))." </td></tr>
							<tr><td><b>Status</b></td>	<td> : ".strip_tags($this->input->post('o'))." </td></tr>
							<tr><td><b>Pendidikan</b></td>	<td> : ".strip_tags($this->input->post('p'))." </td></tr>
							<tr><td><b>Tentang Saya</b></td>	<td> : ".strip_tags($this->input->post('t'))." </td></tr>
						</table><br>

						Jika Benar anda telah mendaftarkan akun ini silahkan klik link aktivasi berikut untuk mengaktifkan akun anda : 
						http://netsosial.info/users/aktivasi/$aktivasi

						<br><br>Admin, http://netsosial.info
						</body></html> \n";
					
					$this->email->from('admin@netsosial.info', 'NETSOSIAL.INFO');
					$this->email->to($email_tujuan);
					$this->email->cc('');
					$this->email->bcc('');

					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->set_mailtype("html");
					$this->email->send();
					
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'utf-8';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
				redirect('auth/success/users');
			}
		}else{
			$data['title'] = 'Pendaftaran Sebagai Users';
			$this->load->helper('captcha');
			$vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'font_path' => './asset/Tahoma.ttf',
                'font_size'     => 16,
                'img_width'	 => '100',
                'img_height' => 30,
                'border' => 0, 
                'word_length'   => 5,
                'expiration' => 7200
            );

            $cap = create_captcha($vals);
            $data['image'] = $cap['image'];
            $this->session->set_userdata('mycaptcha', $cap['word']);
			$this->template->load('phpmu-one/template','phpmu-one/view_register_users',$data);
		}
	}

	public function penulis(){
		if (isset($_POST['submit'])){
			if ($this->input->post() && (strtolower($this->input->post('secutity_code')) == strtolower($this->session->userdata('mycaptcha')))) {
				$this->model_auth->register_users();
				$this->session->set_userdata(array('email'=>$this->input->post('m')));
				$email_tujuan = strip_tags($this->input->post('m'));
				$passwordaktif = md5(strip_tags($this->input->post('b')));
        		$aktivasi = hash("sha512",$passwordaktif);

				$tglaktif = date("d-m-Y H:i:s");
				$subject      = 'Konfirmasi Aktivasi akun Penulis di Netsosial...';
				$message      = "<html><body>Halooo! <b>".strip_tags($this->input->post('c'))."</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan permohonan untuk akun Penulis di http://netsosial.info
					<table style='width:100%; margin-left:25px'>
		   				<tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi Anda : </b></td></tr>
						<tr><td width='140px'><b>Username</b></td>			<td> : <b>".strip_tags($this->input->post('a'))."</b></td></tr>
						<tr><td><b>Password</b></td>			<td> : ".strip_tags($this->input->post('b'))."</td></tr>
						<tr><td><b>Nama Lengkap</b></td>		<td> : ".strip_tags($this->input->post('c'))."</td></tr>
						<tr><td><b>Tanggal Lahir</b></td>		<td> : ".strip_tags($this->input->post('d'))."</td></tr>
						<tr><td><b>Kota</b></td>		<td> : ".strip_tags($this->input->post('e'))."</td></tr>
						<tr><td><b>Provinsi</b></td>				<td> : ".strip_tags($this->input->post('f'))." </td></tr>
						<tr><td><b>Negara</b></td>			<td> : ".strip_tags($this->input->post('g'))." </td></tr>
						<tr><td><b>Facebook</b></td>			<td> : ".strip_tags($this->input->post('h'))." </td></tr>
						<tr><td><b>Twitter</b></td>	<td> : ".strip_tags($this->input->post('i'))." </td></tr>
						<tr><td><b>Google+</b></td>	<td> : ".strip_tags($this->input->post('j'))." </td></tr>
						<tr><td><b>Pekerjaan</b></td>	<td> : ".strip_tags($this->input->post('k'))." </td></tr>
						<tr><td><b>Alamat Lengkap</b></td>	<td> : ".strip_tags($this->input->post('l'))." </td></tr>
						<tr><td><b>Email</b></td>	<td> : ".strip_tags($this->input->post('m'))." </td></tr>
						<tr><td><b>No Telpon</b></td>	<td> : ".strip_tags($this->input->post('n'))." </td></tr>
						<tr><td><b>Status</b></td>	<td> : ".strip_tags($this->input->post('o'))." </td></tr>
						<tr><td><b>Pendidikan</b></td>	<td> : ".strip_tags($this->input->post('p'))." </td></tr>
						<tr><td><b>Tentang Saya</b></td>	<td> : ".strip_tags($this->input->post('t'))." </td></tr>
					</table><br>

					Jika Benar anda telah mendaftarkan akun ini silahkan klik link aktivasi berikut untuk mengaktifkan akun anda : 
					http://netsosial.info/users/aktivasi/$aktivasi

					<br><br>Admin, http://netsosial.info
					</body></html> \n";
				
				$this->email->from('admin@netsosial.info', 'NETSOSIAL.INFO');
				$this->email->to($email_tujuan);
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype("html");
				$this->email->send();
				
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				redirect('auth/success/penulis');
			}
		}else{
			$data['title'] = 'Pendaftaran Sebagai Penulis';
			$this->load->helper('captcha');
			$vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'font_path' => './asset/Tahoma.ttf',
                'font_size'     => 31,
                'img_width'	 => '250',
                'img_height' => 75,
                'border' => 0, 
                'word_length'   => 5,
                'expiration' => 7200
            );

            $cap = create_captcha($vals);
            $data['image'] = $cap['image'];
            $this->session->set_userdata('mycaptcha', $cap['word']);
			$this->template->load('phpmu-one/template','phpmu-one/view_register_penulis',$data);
		}
	}

	function login(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->db->query("SELECT * FROM users where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level']));
				redirect('main');
			}else{
				$data['title'] = 'Log In &rsaquo; Pengguna';
				$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
			}
		}else{
			$data['title'] = 'Log In &rsaquo; Pengguna';
			$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
		}
	}

	function lupapassword(){
		if (isset($_POST['submit'])){
			$email = $this->input->post('a');
			$cek = $this->db->query("SELECT * FROM users where email='".$this->db->escape_str($email)."'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$email_tujuan = strip_tags($this->input->post('a'));
				$reset = acakangkahuruf(12);
				$passwordaktif = md5(strip_tags($reset));
        		$aktivasi = hash("sha512",$passwordaktif);
        		$this->model_users->resetpassword($row['username'], $aktivasi);
				$tglaktif = date("d-m-Y H:i:s");
				$subject      = 'Permintaan Reset Password di Netsosial...';
				$message      = "<html><body>Halooo! <b>$row[nama_lengkap]</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan permintaan untuk reset password di http://netsosial.info
					<table style='width:100%; margin-left:25px'>
		   				<tr><td style='background:#337ab7; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi akun Anda : </b></td></tr>
						<tr><td width='140px'><b>Username</b></td>			<td> : $row[username]</b></td></tr>
						<tr><td><b>Password</b></td>			<td> : $reset</td></tr>
					</table><br>

					Silahkan Login di <a href='http://netsosial.info/auth/login'>Disini</a>
					Admin, http://netsosial.info
					</body></html> \n";
				
				$this->email->from('admin@netsosial.info', 'NETSOSIAL.INFO');
				$this->email->to($email_tujuan);
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype("html");
				$this->email->send();
				
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				$data['title'] = 'Password Berhasil Dikirimkan...';
				$data['email'] = strip_tags($this->input->post('a'));
				$this->template->load('phpmu-one/template','phpmu-one/view_lupapassword_success',$data);
			}else{
				$data['email'] = strip_tags($this->input->post('a'));
				$data['title'] = 'Lupa Password &rsaquo; Pengguna';
				$this->template->load('phpmu-one/template','phpmu-one/view_lupapassword',$data);
			}
		}else{
			$data['email'] = '';
			$data['title'] = 'Lupa Password &rsaquo; Pengguna';
			$this->template->load('phpmu-one/template','phpmu-one/view_lupapassword',$data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}

	function success(){
		$data['title'] = 'Success Mendaftar Sebagai '.$this->uri->segment(3);
		$data['email'] = $this->session->email;
		$this->template->load('phpmu-one/template','phpmu-one/view_success',$data);
	}
}
