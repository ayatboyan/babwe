<?php 
  $usr = $this->db->query("SELECT * FROM users where username='".$this->session->username."'")->row_array();
  if ($usr['foto'] == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $usr['foto']; }
  $tentangsaya = strip_tags($usr['tentang_saya']); 
  $tentang = substr($tentangsaya,0,180); 
  $tentang = substr($tentangsaya,0,strrpos($tentang," "));
  $jmlpesan = $this->model_users->pesanbelumbaca()->num_rows(); 
  $permintaanteman = $this->model_users->permintaanteman($this->session->username)->num_rows(); 
  $semuateman = $this->model_users->semuateman($this->session->username)->num_rows(); 
  echo "<table class='table'>
          <tr>
            <td><img style='border:1px solid #cecece' width='90px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'> <br><br>
            	<a class='btn btn-block btn-xs btn-primary' href='".base_url()."users/profile'>View Profile</a>
              <a class='btn btn-block btn-xs btn-warning' href='".base_url()."users/penghasilan'>Penghasilan</a>
            </td>

            <td><b>$usr[nama_lengkap]</b> <br> 
            	$tentang,..
            </td>
          </tr>
          <tr><td colspan='2'>
            <a class='btn btn-block btn-sm btn-success' href='".base_url()."users/tulisan'>Semua Tulisan Saya</a>
            <a class='btn btn-block btn-sm btn-success' href='".base_url()."users/aktivitas'>Aktivitas Teman anda</a>
            <a class='btn btn-block btn-sm btn-success' href='".base_url()."users/koleksifoto'>Media / Koleksi Foto</a>
            <a class='btn btn-block btn-sm btn-primary' href='".base_url()."users/permintaanteman'>Permintaan Teman <span class='badge'>$permintaanteman</span></a>
            <a class='btn btn-block btn-sm btn-primary' href='".base_url()."users/semuateman'>Semua Teman <span class='badge'>$semuateman</span></a>
            <a class='btn btn-block btn-sm btn-info' href='".base_url()."users/pesan'>Pesan Masuk <span class='badge'>$jmlpesan</span></a>
            <a class='btn btn-block btn-sm btn-info' href='".base_url()."users/chat'>Join Chatroom</a>
          </td></tr>
        </table>";
 ?>
