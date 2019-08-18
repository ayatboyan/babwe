<?php 
class Model_berita extends CI_model{
    function info_terbaru($limit){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username left join kategori on berita.id_kategori=kategori.id_kategori where status='Y' ORDER BY id_berita DESC LIMIT 0,$limit");
    }

    function info_terbarukategori($limit,$id){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username left join kategori on berita.id_kategori=kategori.id_kategori where status='Y' AND berita.id_kategori='$id' ORDER BY id_berita DESC LIMIT 0,$limit");
    }

    function utama($start,$limit){
        return $this->db->query("SELECT * FROM berita 
                                            left join users on berita.username=users.username
                                                left join kategori on berita.id_kategori=kategori.id_kategori 
                                                    WHERE utama='Y' ORDER BY id_berita DESC LIMIT $start, $limit");
    }

    function beritaacak(){
        return $this->db->query("SELECT * FROM berita 
                                            left join users on berita.username=users.username
                                                left join kategori on berita.id_kategori=kategori.id_kategori 
                                                    ORDER BY RAND() DESC LIMIT 6");
    }

    function terpopuler($limit){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username left join kategori on berita.id_kategori=kategori.id_kategori where status='Y' ORDER BY dibaca DESC LIMIT 0,$limit");
    }

    function kategoriterpopuler($limit, $id){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username left join kategori on berita.id_kategori=kategori.id_kategori where berita.status='Y' AND berita.id_kategori='$id' ORDER BY berita.dibaca DESC LIMIT 0,$limit");
    }

    function hitungberitautama(){
        return $this->db->query("SELECT * FROM berita where utama='Y'");
    }

    function hitungberita(){
        return $this->db->query("SELECT * FROM berita where status='Y'");
    }

    function hitungberitakategori($kat){
        return $this->db->query("SELECT * FROM berita where status='Y' AND id_kategori='".$this->db->escape_str($kat)."'");
    }

    function pilihan($limit){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username left join kategori on berita.id_kategori=kategori.id_kategori where status='Y' AND berita.aktif='Y' ORDER BY id_berita DESC LIMIT 0,$limit");
    }

    function kategoripilihan($limit,$id){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username left join kategori on berita.id_kategori=kategori.id_kategori where status='Y' AND berita.aktif='Y' AND berita.id_kategori='$id' ORDER BY id_berita DESC LIMIT 0,$limit");
    }

    function kategori_utama(){
        return $this->db->query("SELECT * FROM kategori where sidebar != '0' ORDER BY sidebar ASC");
    }

    function kategori_content($id,$dari,$sampai){
        return $this->db->query("SELECT * FROM berita where id_kategori='$id' AND status='Y' ORDER BY id_berita DESC LIMIT $dari,$sampai");
    }

    function semua_berita($start, $limit){
        return $this->db->query("SELECT * FROM berita a JOIN users b on a.username=b.username where status='Y' ORDER BY id_berita DESC LIMIT $start,$limit");
    }

    function semua_berita_premium($limit){
        return $this->db->query("SELECT * FROM berita a JOIN users b on a.username=b.username where status='Y' AND premium='Y' ORDER BY rand() DESC LIMIT $limit");
    }

    function semua_berita_cari($start, $limit, $keyword){
        return $this->db->query("SELECT * FROM berita a JOIN users b on a.username=b.username where status='Y' AND judul LIKE '%$keyword%' ORDER BY id_berita DESC LIMIT $start,$limit");
    }

    function berita_detail($id){
        return $this->db->query("SELECT * FROM berita a LEFT JOIN users b ON a.username=b.username LEFT JOIN kategori c ON a.id_kategori=c.id_kategori where status='Y' AND (a.id_berita='".$this->db->escape_str($id)."' OR a.judul_seo='".$this->db->escape_str($id)."')");
    }

    function berita_detail_penulis($id){
        return $this->db->query("SELECT * FROM berita a LEFT JOIN users b ON a.username=b.username LEFT JOIN kategori c ON a.id_kategori=c.id_kategori where (a.id_berita='".$this->db->escape_str($id)."' OR a.judul_seo='".$this->db->escape_str($id)."')");
    }

    function berita_dibaca_update($id){
        return $this->db->query("UPDATE berita SET dibaca=dibaca+1 where id_berita='".$this->db->escape_str($id)."' OR judul_seo='".$this->db->escape_str($id)."'");
    }

    function berita_view($id){
        $cek = $this->db->query("SELECT * FROM berita_view where id_berita='$id' AND tanggal_view='".date('Y-m-d')."'");
        $row = $cek->row_array();
        if ($cek->num_rows() >= 1){
            $datadb = array('id_berita'=>$id,
                        'jumlah'=>$row['jumlah']+1);
            $this->db->where('id_berita',$id);
            $this->db->update('berita_view',$datadb);
        }else{
            $datadb = array('id_berita'=>$id,
                        'jumlah'=>1,
                        'tanggal_view'=>date('Y-m-d'));
            $this->db->insert('berita_view',$datadb);
        }
    }

    function view_single($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        return $this->db->get($table);
    }

    public function view_join_two($table1,$table2,$table3,$field,$field1,$where,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field1.'='.$table3.'.'.$field1);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get();
    }

    function tambahkomentar(){
        $datadb = array('id_berita'=>$this->db->escape_str($this->input->post('id')),
                        'username'=>$this->session->username,
                        'isi_komentar'=>$this->db->escape_str($this->input->post('c')),
                        'tgl_komentar'=>date('Y-m-d'),
                        'jam_komentar'=>date('H:i:s'),
                        'aktif'=>'Y');
        $this->db->insert('berita_komentar',$datadb);
    }

    function komentar_view($id){
        return $this->db->query("SELECT * FROM berita_komentar where id_berita='$id' AND aktif='Y'");
    }

    function detail_kategori($id, $start,$limit){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username where status='Y' AND id_kategori='".$this->db->escape_str($id)."' ORDER BY id_berita DESC LIMIT $start,$limit");
    }

    function detail_kategori_premium($id,$limit){
        return $this->db->query("SELECT * FROM berita left join users on berita.username=users.username where status='Y' AND id_kategori='".$this->db->escape_str($id)."' AND premium='Y' ORDER BY rand() DESC LIMIT $limit");
    }

    function list_berita(){
        return $this->db->query("SELECT a.*, b.nama_kategori FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori ORDER BY a.id_berita DESC");
    }

    function unpublished_berita($username){
        return $this->db->query("SELECT a.*, b.nama_kategori FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori where a.username='$username' AND status='N' ORDER BY a.id_berita DESC");
    }

    function published_berita($username){
        return $this->db->query("SELECT a.*, b.nama_kategori FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori where a.username='$username' AND status='Y' ORDER BY a.id_berita DESC");
    }

    function kategori_berita(){
        return $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    }

    function kategori_berita_tambah(){
        $datadb = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'aktif'=>$this->db->escape_str($this->input->post('b')),
                        'sidebar'=>$this->db->escape_str($this->input->post('c')),
                        'komisi'=>$this->db->escape_str($this->input->post('d')),
                        'lowker'=>$this->db->escape_str($this->input->post('e')),
                        'jual_beli'=>$this->db->escape_str($this->input->post('f')),
                        'level_user'=>$this->db->escape_str($this->input->post('level')));
        $this->db->insert('kategori',$datadb);
    }

    function kategori_berita_edit($id){
        return $this->db->query("SELECT * FROM kategori where id_kategori='$id'");
    }

    function kategori_berita_update(){
        $datadb = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'aktif'=>$this->db->escape_str($this->input->post('b')),
                        'sidebar'=>$this->db->escape_str($this->input->post('c')),
                        'komisi'=>$this->db->escape_str($this->input->post('d')),
                        'lowker'=>$this->db->escape_str($this->input->post('e')),
                        'jual_beli'=>$this->db->escape_str($this->input->post('f')),
                        'level_user'=>$this->db->escape_str($this->input->post('level')));
        $this->db->where('id_kategori',$this->input->post('id'));
        $this->db->update('kategori',$datadb);
    }

    function kategori_berita_delete($id){
        return $this->db->query("DELETE FROM kategori where id_kategori='$id'");
    }

    function tag_berita(){
        return $this->db->query("SELECT * FROM tag ORDER BY id_tag DESC");
    }

    function tag_berita_tambah(){
        $datadb = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')),
                        'count'=>'0');
        $this->db->insert('tag',$datadb);
    }

    function tag_berita_edit($id){
        return $this->db->query("SELECT * FROM tag where id_tag='$id'");
    }

    function tag_berita_update(){
        $datadb = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')));
        $this->db->where('id_tag',$this->input->post('id'));
        $this->db->update('tag',$datadb);
    }

    function tag_berita_delete($id){
        return $this->db->query("DELETE FROM tag where id_tag='$id'");
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
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>'Y',
                                    'sumber_berita'=>$this->db->escape_str($this->input->post('ii')));
            }else{
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
                                    'status'=>'Y',
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

    function list_berita_cepat(){
        if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
        $datadb = array('id_kategori'=>'0',
                        'username'=>$this->session->username,
                        'judul'=>$this->db->escape_str($this->input->post('a')),
                        'judul_seo'=>seo_title($this->input->post('a')),
                        'isi_berita'=>$this->input->post('b'),
                        'hari'=>hari_ini(date('w')),
                        'tanggal'=>date('Y-m-d'),
                        'jam'=>date('H:i:s'),
                        'dibaca'=>'0',
                        'status'=>$status);
        $this->db->insert('berita',$datadb);
    }

    function list_berita_publish(){
        $cek = $this->db->query("SELECT * FROM berita_penghasilan where id_berita='".$this->input->post('id')."'")->num_rows();
        if ($cek >= 1){
            $datadb = array('jumlah'=>$this->db->escape_str($this->input->post('b')));
            $this->db->where('id_berita',$this->input->post('id'));
            $this->db->update('berita_penghasilan',$datadb);
        }else{
            $datadb = array('id_berita'=>$this->db->escape_str($this->input->post('id')),
                            'jumlah'=>$this->db->escape_str($this->input->post('b')),
                            'waktu_publish'=>date('Y-m-d H:i:s'));
            $this->db->insert('berita_penghasilan',$datadb);
        }

        $datapublish = array('status'=>$this->db->escape_str($this->input->post('a')));
        $this->db->where('id_berita',$this->input->post('id'));
        $this->db->update('berita',$datapublish);
    }

    function list_berita_revisi(){
        $datadb = array('id_berita'=>$this->db->escape_str($this->input->post('id')),
                        'catatan'=>$this->db->escape_str($this->input->post('a')),
                        'waktu_catatan'=>date('Y-m-d H:i:s'));
        $this->db->insert('berita_catatan',$datadb);
    }

    function list_berita_edit($id){
        return $this->db->query("SELECT * FROM berita where id_berita='$id'");
    }

    function nilai_berita($id){
        return $this->db->query("SELECT * FROM berita_penghasilan where id_berita='$id'");
    }

    function list_berita_detail($id){
        return $this->db->query("SELECT a.*, b.nama_kategori, c.nama_lengkap, c.level FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori JOIN users c ON a.username=c.username where id_berita='$id'");
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
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'tag'=>$tag,
                                    'sumber_berita'=>$this->db->escape_str($this->input->post('ii')));
            }else{
                    $datadb = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'sub_judul'=>$this->db->escape_str($this->input->post('c')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'aktif'=>$this->db->escape_str($this->input->post('f')),
                                    'utama'=>$this->db->escape_str($this->input->post('g')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->db->escape_str($this->input->post('i')),
                                    'gambar'=>$hasil['file_name'],
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

    function list_berita_delete($id){
        return $this->db->query("DELETE FROM berita where id_berita='$id'");
    }

    function list_beritacatatan_delete($id){
        return $this->db->query("DELETE FROM berita_catatan where id_berita_catatan='$id'");
    }
}