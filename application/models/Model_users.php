<?php 
class Model_users extends CI_model{
	function users($level){
		return $this->db->query("SELECT * FROM users where level='$level'");
	}

    function kirim_chat(){
        $datadb = array('username'=>$this->input->post('user'),
                        'pesan'=>strip_tags($this->input->post('pesan')),
                        'waktu'=>date('Y-m-d H:i:s'));
        $this->db->insert('messages_chat',$datadb);
    }
 
    function ambil_pesan(){
        $id_members = $this->session->username;
        return $this->db->query("SELECT if (user1='$id_members',user2,user1) as temanku FROM `teman` where if (user1='$id_members',user1,user2)='$id_members' AND confirm='Y'");
    }

    function users_bayarkan(){
        $datadb = array('username'=>$this->input->post('id'),
                        'bonus_publish'=>$this->input->post('bayar'),
                        'waktu_bayar'=>date('Y-m-d H:i:s'));
        $this->db->insert('berita_bayar_bonus',$datadb);
    }

    function profile($username){
        return $this->db->query("SELECT * FROM users where username='$username'");
    }

    function tulisan($username, $start, $limit){
        return $this->db->query("SELECT * FROM berita a JOIN users b on a.username=b.username where a.username='$username' ORDER BY a.id_berita DESC LIMIT $start,$limit");
    }

    function hitungtulisanusers($username){
        return $this->db->query("SELECT * FROM berita where username='$username'");
    }

    function koleksifoto($username, $start, $limit){
        return $this->db->query("SELECT * FROM users_media a JOIN users b on a.username=b.username where a.username='$username' ORDER BY a.id_users_media DESC LIMIT $start,$limit");
    }

    function hitungkoleksifoto($username){
        return $this->db->query("SELECT * FROM users_media where username='$username'");
    }

    function koleksifoto_tambah(){
        $config['upload_path'] = 'asset/media/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('a');
        $hasil=$this->upload->data();
                    $datadb = array('username'=>$this->session->username,
                                    'file_media'=>$hasil['file_name'],
                                    'waktu_upload'=>date('Y-m-d H:i:s'));
        $this->db->insert('users_media',$datadb);
    }

    function koleksifoto_delete($id,$username){
        return $this->db->query("DELETE FROM users_media where id_users_media='$id' AND username='$username'");
    }

    function tag_berita(){
        return $this->db->query("SELECT * FROM tag ORDER BY id_tag DESC");
    }

    function kategori_berita(){
        return $this->db->query("SELECT * FROM kategori where aktif='Y' ORDER BY id_kategori DESC");
    }

    function kategori_berita_user($level){
        return $this->db->query("SELECT * FROM kategori where aktif='Y' AND level_user='$level' ORDER BY id_kategori DESC");
    }

    function list_berita_tambah(){
        $config['upload_path'] = 'asset/foto_berita/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('k');
        $hasil=$this->upload->data();
            if ($this->input->post('j') != ''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($hasil['file_name']==''){
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>'N',
                                    'aktif'=>'N',
                                    'utama'=>'N',
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>'N',
                                    'sumber_berita'=>$this->db->escape_str($this->input->post('ii')));
            }else{
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>'N',
                                    'aktif'=>'N',
                                    'utama'=>'N',
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>'N',
                                    'sumber_berita'=>$this->db->escape_str($this->input->post('ii')));
            }
        $this->db->insert('berita',$datadb);
        $id_berita = $this->db->insert_id();

        if ($this->input->post('lowker') == 'lowker'){
            $datalowker = array('id_berita'=>$id_berita,
                                        'nama_perusahaan'=>$this->db->escape_str($this->input->post('aa')),
                                        'posisi'=>$this->db->escape_str($this->input->post('bb')),
                                        'propinsi'=>$this->db->escape_str($this->input->post('cc')),
                                        'kota'=>$this->db->escape_str($this->input->post('dd')),
                                        'alamat_lengkap'=>strip_tags($this->input->post('ee')),
                                        'tanggal_berakhir'=>strip_tags($this->input->post('ff')),
                                        'syarat_syarat'=>strip_tags($this->input->post('gg')),
                                        'kontak'=>strip_tags($this->input->post('hh')));
            $this->db->insert('lowker',$datalowker); 
        }

        if ($this->input->post('jualbeli') == 'jualbeli'){
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for($i=0; $i<$cpt; $i++){
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = 'asset/foto_berita/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $fileName = $this->upload->data()['file_name'];
                $images[] = $fileName;
            }
            $fileName = implode(',',$images);
            $datajualbeli = array('id_berita'=>$id_berita,
                                        'nama_produk'=>$this->db->escape_str($this->input->post('aa')),
                                        'harga'=>$this->db->escape_str($this->input->post('bb')),
                                        'berat'=>$this->db->escape_str($this->input->post('cc')),
                                        'foto'=>$fileName,
                                        'jumlah'=>strip_tags($this->input->post('ee')));
            $this->db->insert('jual_beli',$datajualbeli); 
            
        }
    }

    function list_berita_edit($id,$username){
        return $this->db->query("SELECT * FROM berita where id_berita='$id' AND username='$username'");
    }

    function list_berita_update(){
        $config['upload_path'] = 'asset/foto_berita/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '5000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('k');
        $hasil=$this->upload->data();
            if ($this->input->post('j') != ''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            if ($hasil['file_name']==''){
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>'N',
                                    'aktif'=>'N',
                                    'utama'=>'N',
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'sumber_berita'=>$this->db->escape_str($this->input->post('ii')));
            }else{
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>'N',
                                    'aktif'=>'N',
                                    'utama'=>'N',
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'sumber_berita'=>$this->db->escape_str($this->input->post('ii')));
            }
        $this->db->where('id_berita',$this->input->post('id'));
        $this->db->update('berita',$datadb);

        if ($this->input->post('lowkerupdate') == 'lowkerupdate'){
            $datalowker = array('nama_perusahaan'=>$this->db->escape_str($this->input->post('aa')),
                                'posisi'=>$this->db->escape_str($this->input->post('bb')),
                                'propinsi'=>$this->db->escape_str($this->input->post('cc')),
                                'kota'=>$this->db->escape_str($this->input->post('dd')),
                                'alamat_lengkap'=>strip_tags($this->input->post('ee')),
                                'tanggal_berakhir'=>strip_tags($this->input->post('ff')),
                                'syarat_syarat'=>strip_tags($this->input->post('gg')),
                                'kontak'=>strip_tags($this->input->post('hh')));
            $this->db->where('id_berita',$this->input->post('id'));
            $this->db->update('lowker',$datalowker); 
        }

        if ($this->input->post('lowker') == 'lowker'){
            $totalrow = $this->db->query("SELECT * FROM lowker where id_berita='".$this->input->post('id')."'")->num_rows();
            if ($totalrow <= 0){
                $datalowker = array('id_berita'=>$this->input->post('id'),
                                    'nama_perusahaan'=>$this->db->escape_str($this->input->post('aa')),
                                    'posisi'=>$this->db->escape_str($this->input->post('bb')),
                                    'propinsi'=>$this->db->escape_str($this->input->post('cc')),
                                    'kota'=>$this->db->escape_str($this->input->post('dd')),
                                    'alamat_lengkap'=>strip_tags($this->input->post('ee')),
                                    'tanggal_berakhir'=>strip_tags($this->input->post('ff')),
                                    'syarat_syarat'=>strip_tags($this->input->post('gg')),
                                    'kontak'=>strip_tags($this->input->post('hh')));
                $this->db->insert('lowker',$datalowker); 
            }
        }

        if ($this->input->post('jualbeliupdate') == 'jualbeliupdate'){
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for($i=0; $i<$cpt; $i++){
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = 'asset/foto_berita/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $fileName = $this->upload->data()['file_name'];
                $images[] = $fileName;
            }
            $fileName = implode(',',$images);
            $datajualbeli = array('id_berita'=>$id_berita,
                                        'nama_produk'=>$this->db->escape_str($this->input->post('aa')),
                                        'harga'=>$this->db->escape_str($this->input->post('bb')),
                                        'berat'=>$this->db->escape_str($this->input->post('cc')),
                                        'foto'=>$fileName,
                                        'jumlah'=>strip_tags($this->input->post('ee')));
            $this->db->where('id_berita',$this->input->post('id'));
            $this->db->update('jual_beli',$datajualbeli); 
            
        }

        if ($this->input->post('jualbeli') == 'jualbeli'){
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for($i=0; $i<$cpt; $i++){
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = 'asset/foto_berita/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
            }
            $fileName = implode(',',$images);
            $datajualbeli = array('id_berita'=>$id_berita,
                                        'nama_produk'=>$this->db->escape_str($this->input->post('aa')),
                                        'harga'=>$this->db->escape_str($this->input->post('bb')),
                                        'berat'=>$this->db->escape_str($this->input->post('cc')),
                                        'foto'=>$fileName,
                                        'jumlah'=>strip_tags($this->input->post('ee')));
            $this->db->insert('jual_beli',$datajualbeli); 
            
        }
    }

    function list_berita_delete($id,$username){
        return $this->db->query("DELETE FROM berita where id_berita='$id' AND username='$username'");
    }

    function profile_update(){
        $config['upload_path'] = 'asset/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '2000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $hasil=$this->upload->data();
        if ($this->session->level == 'penulis'){
            if ($hasil['file_name']=='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name']);
            }elseif ($hasil['file_name']=='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name']);
            }
        }else{
            if ($hasil['file_name']=='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name']);
            }elseif ($hasil['file_name']=='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name']);
            }
        }

        $this->db->where('username',$this->session->username);
        $this->db->update('users',$datadb); 
    }

	function users_tambah(){
        $config['upload_path'] = 'asset/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '2000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('a') ==''){
                    $datadb = array('username'=>$this->db->escape_str($this->input->post('username')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') ==''){
                    $datadb = array('username'=>$this->db->escape_str($this->input->post('username')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('a') !=''){
                    $datadb = array('username'=>$this->db->escape_str($this->input->post('username')),
                                    'password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') !=''){
                    $datadb = array('username'=>$this->db->escape_str($this->input->post('username')),
                                    'password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }
        $this->db->insert('users',$datadb);
    }

    function users_edit($id){
        return $this->db->query("SELECT * FROM users where username='$id'");
    }

    function users_update(){
        $config['upload_path'] = 'asset/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '2000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $hasil=$this->upload->data();
        if ($this->input->post('level') == 'penulis'){
            if ($hasil['file_name']=='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'nama_bank'=>$this->db->escape_str($this->input->post('p')),
                                    'atas_nama'=>$this->db->escape_str($this->input->post('q')),
                                    'no_rekening'=>$this->db->escape_str($this->input->post('r')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }
        }else{
            if ($hasil['file_name']=='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') ==''){
                    $datadb = array('nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('a') !=''){
                    $datadb = array('password'=>hash("sha512", md5($this->input->post('a'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('b')),
                                    'tanggal_lahir'=>tgl_simpan($this->input->post('c')),
                                    'kota'=>$this->db->escape_str($this->input->post('d')),
                                    'provinsi'=>$this->db->escape_str($this->input->post('e')),
                                    'negara'=>$this->db->escape_str($this->input->post('f')),
                                    'facebook'=>$this->db->escape_str($this->input->post('g')),
                                    'twitter'=>$this->db->escape_str($this->input->post('h')),
                                    'g_plus'=>$this->db->escape_str($this->input->post('i')),
                                    'pekerjaan'=>$this->db->escape_str($this->input->post('j')),
                                    'alamat_lengkap'=>$this->db->escape_str($this->input->post('k')),
                                    'email'=>$this->db->escape_str($this->input->post('l')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('m')),
                                    'status_hubungan'=>$this->db->escape_str($this->input->post('n')),
                                    'pendidikan'=>$this->db->escape_str($this->input->post('o')),
                                    'tentang_saya'=>$this->db->escape_str($this->input->post('s')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('t')),
                                    'blokir'=>$this->db->escape_str($this->input->post('u')));
            }
        }
        $this->db->where('username',$this->input->post('id'));
        $this->db->update('users',$datadb); 
    }

    function users_delete($id){
        return $this->db->query("DELETE FROM users where username='$id'");
    }

    function penghasilan_publish($username){
        return $this->db->query("SELECT a.*, b.username, b.judul, b.judul_seo, b.dibaca FROM `berita_penghasilan` a JOIN berita b ON a.id_berita=b.id_berita where b.username='$username' ORDER BY a.id_berita DESC");
    }

    function penghasilan_bayar_history($username){
        return $this->db->query("SELECT * FROM `berita_bayar_bonus` where username='$username'  ORDER BY id_berita_bayar_bonus DESC");
    }

    function penghasilan_publish_total($username){
        return $this->db->query("SELECT sum(a.jumlah) as total FROM `berita_penghasilan` a JOIN berita b ON a.id_berita=b.id_berita where b.username='$username'");
    }

    function penghasilan_bayar($username){
        return $this->db->query("SELECT sum(bonus_publish) as bayar_publish FROM `berita_bayar_bonus` where username='$username'");
    }

    function revisi_tulisan($username, $tulisan){
        return $this->db->query("SELECT a.* FROM `berita_catatan` a LEFT JOIN berita b ON a.id_berita=b.id_berita where b.username='$username' AND a.id_berita='$tulisan' ORDER BY a.id_berita_catatan DESC");
    }

    function revisi_tulisan_detail($username, $tulisan){
        return $this->db->query("SELECT b.*, a.username, a.judul, c.nama_kategori, a.hari, a.tanggal, a.jam, a.tag FROM `berita` a LEFT JOIN berita_catatan b ON a.id_berita=b.id_berita LEFT JOIN kategori c ON a.id_kategori=c.id_kategori where a.username='$username' AND a.id_berita='$tulisan'");
    }


    function jumlah(){
                $id_members = $this->session->username;
                return $this->db->query("select MAX(id) AS id, MAX(message) AS message, nama_lengkap, date_time, user1, user2, sum(stat) as baca, username 
                                                from messages join users on messages.user1=users.username 
                                                where user1!='".$this->db->escape_str($id_members)."' AND user2='".$this->db->escape_str($id_members)."' GROUP BY user1");
    }

    function tampilmessages($sampai, $dari){
        $id_members = $this->session->username;
            return $this->db->query("select MAX(id) AS id, MAX(message) AS message, nama_lengkap, username, date_time, user1, user2, sum(stat) as baca, username 
                                        from messages join users on messages.user1=users.username 
                                            where user1!='".$this->db->escape_str($id_members)."' AND user2='".$this->db->escape_str($id_members)."' GROUP BY user1 ORDER BY id DESC LIMIT $dari, $sampai");
    }

    function pesanbelumbaca(){
        $id_members = $this->session->username;
        return $this->db->query("select id from messages where stat='1' AND user1!='".$this->db->escape_str($id_members)."' AND user2='".$this->db->escape_str($id_members)."'");
    }

    function jumlahpesan($id){
        $id_members = $this->session->username;
        return $this->db->query("SELECT * FROM messages where (user1='".$this->db->escape_str($id_members)."' AND user2='".$this->db->escape_str($id)."')  
                                    OR (user1='".$this->db->escape_str($id)."' AND user2='".$this->db->escape_str($id_members)."')");
    }

    function modread($id, $sampai, $dari){
        $id_members = $this->session->username;
        return $this->db->query("SELECT id, stat, message, date_time, nama_lengkap, username, file_upload, foto 
                                    FROM (select * from messages join users on messages.user1=users.username
                                        ORDER BY id DESC) messages where (user1='".$this->db->escape_str($id_members)."' AND user2='".$this->db->escape_str($id)."')  
                                            OR (user1='".$this->db->escape_str($id)."' AND user2='".$this->db->escape_str($id_members)."') 
                                                ORDER BY messages.id DESC LIMIT $dari, $sampai");
    }

    function modkirimpesan(){
        $user1           = $this->input->post('user1');
        $user2       = $this->input->post('user2');
        $message         = $this->input->post('message');
        $ip              = $_SERVER['REMOTE_ADDR'];
        $tgl_pesan   = date("Y-n-d H:i:s");

        $config['upload_path'] = './asset/files_messages/';
        $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx';
        $config['max_size'] = '30000'; // kb
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $hasil=$this->upload->data();

        if ($hasil['file_name']==''){
                $datadb = array('message'=>$message,
                                'user1'=>$this->db->escape_str($user1),
                                'user2'=>$this->db->escape_str($user2),
                                'date_time'=>$tgl_pesan,
                                'ip_address'=>$ip,
                                'stat'=>'1');
        }else{
                $datadb = array('message'=>$message,
                                'file_upload' => $hasil['file_name'],
                                'user1'=>$this->db->escape_str($user1),
                                'user2'=>$this->db->escape_str($user2),
                                'date_time'=>$tgl_pesan,
                                'ip_address'=>$ip,
                                'stat'=>'1');
        }
        $this->db->insert('messages',$datadb);
    }

    function permintaanteman($id_members){
        return $this->db->query("SELECT * FROM teman a JOIN users b ON a.user1=b.username where a.user2='$id_members' AND confirm='N' ORDER BY id_teman DESC");
    }

    function semuateman($id_members){
        return $this->db->query("SELECT * FROM `teman` where (user1='$id_members' AND confirm='Y') OR (user2='$id_members' AND confirm='Y') ORDER BY id_teman DESC");
    }

    function aktivitasteman($id_members){
        return $this->db->query("select * from (select z.*, x.nama_lengkap from berita z JOIN users x ON z.username=x.username) as a join (SELECT if (user1='$id_members',user2,user1) as teman_saya FROM `teman` where confirm='Y') as b on a.username=b.teman_saya where a.status='Y' ORDER BY a.id_berita DESC LIMIT 33");
    }

    function mediateman($id_members){
        return $this->db->query("select * from (select z.*, x.nama_lengkap from users_media z JOIN users x ON z.username=x.username) as a join (SELECT if (user1='$id_members',user2,user1) as teman_saya FROM `teman` where confirm='Y') as b on a.username=b.teman_saya ORDER BY a.id_users_media DESC LIMIT 60");
    }

    function komentarteman($id_members){
        return $this->db->query("select * from (select z.*, x.nama_lengkap, x.foto, x.alamat_lengkap, x.pekerjaan, x.level, y.judul, y.judul_seo from berita_komentar z JOIN users x ON z.username=x.username JOIN berita y ON z.id_berita=y.id_berita) as a join (SELECT if (user1='$id_members',user2,user1) as teman_saya FROM `teman` where confirm='Y') as b on a.username=b.teman_saya where a.aktif='Y' ORDER BY a.id_komentar DESC LIMIT 28");
    }

    function cariteman($keyword){
        return $this->db->query("SELECT * FROM `users` where level != 'admin' AND nama_lengkap LIKE '%$keyword%'");
    }

    function tampilteman($username){
        return $this->db->query("SELECT * FROM users where username='$username'");
    }

    function tampiltemanchat($username){
        $id_members = $this->session->username;
        return $this->db->query("SELECT a.username, a.nama_lengkap, a.foto, a.level, b.pesan, b.waktu FROM users a JOIN messages_chat b ON a.username=b.username where a.username='$username' OR a.username='$id_members' ORDER BY waktu DESC");
    }

    function cekteman($username){
        $id_members = $this->session->username;
        return $this->db->query("SELECT * FROM teman where (user1='$id_members' AND user2='$username' AND confirm='Y') OR (user1='$username' AND user2='$id_members' AND confirm='Y')");
    }

    function cektemanterkirim($username){
        $id_members = $this->session->username;
        return $this->db->query("SELECT * FROM teman where user1='$id_members' AND user2='$username' AND confirm='N'");
    }

    function confirm($id,$username){
        $datadb = array('confirm'=>'Y','waktu_teman'=>date('Y-m-d H:i:s'));
        $this->db->where('user1',$id);
        $this->db->where('user2',$username);
        $this->db->update('teman',$datadb);
    }

    function resetpassword($username,$password){
        $datadb = array('password'=>$password);
        $this->db->where('username',$username);
        $this->db->update('users',$datadb);
    }

    function block($id,$username){
        return $this->db->query("DELETE FROM teman where user1='$id' AND user2='$username'");
    }

    function add($id,$username){
        $datadb = array('user1'=>$username, 'user2'=>$id, 'confirm'=>'N');
        $this->db->insert('teman',$datadb);
    }

    function grafik_klik_view(){
        return $this->db->query("SELECT sum(jumlah) as jumlah, tanggal_view FROM berita_view GROUP BY tanggal_view ORDER BY tanggal_view DESC LIMIT 10");
    }
}