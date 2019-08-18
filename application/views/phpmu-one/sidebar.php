  <!--START - SIDEBAR KANAN - SEARCH -->

  <div class='hidden-xs'>
  <?php 
    $attributes = array('id' => 'formku','role'=>'form');
    echo form_open('berita',$attributes); 
  ?>
      <div style='width:100%' class="input-group">
        <input type="text" name='cari' class="form-control" placeholder="Cari Informasi Disini...">
        <span class="input-group-btn">
          <button type='submit' class="btn btn-primary" name='submit' type="button">Go!</button>
        </span>
      </div><br>
  <?php echo form_close(); ?>

  <?php 
    if ($this->session->level == 'user'){
        include "sidebar_users.php";
    }elseif ($this->session->level == 'penulis'){
        include "sidebar_penulis.php";
    }
  ?>
  </div>

  <!--END - SIDEBAR KANAN - SEARCH -->

  <?php 
      $hitung = $this->model_main->ym()->num_rows();
      echo "<br> ";
      if ($hitung >= 1){
      echo "<p class='sidebar-title top'><span class='glyphicon glyphicon-envelope'></span> &nbsp; ONLINE SUPPORT</p>";
        $ym = $this->model_main->ym();
        foreach ($ym->result_array() as $row){
              echo "<div>
                      <center>
                        $row[nama]<br>
                        <a href='ymsgr:sendIM?".$row['username']."'><img src='".base_url()."asset/images/online.gif'></a>
                      </center>
                    </div><hr>";
        }
      }
  ?>

  <?php 
  //START IKLAN SIDEBAR ATAS 1 336 x 280
    $iklansidebar1 = $this->model_iklan->iklan_sidebar(2);
      foreach ($iklansidebar1->result_array() as $row){
        $hitung = $this->model_main->iklan_sidebar()->num_rows();
          if ($hitung >= 1){
            echo "<div><a target='_BLANK'title='".$row['judul']."' href='".$row['url']."'><img class='pull-left img-thumbnail' style='margin:5px' src='".base_url()."asset/foto_iklan/".$row['gambar']."'></a></div>";
          }
      }
    //END IKLAN SIDEBAR ATAS 1 336 x 280
     echo "<p>&nbsp;</p>";

//---------------------------------------------------------------------------------------------

     //START IKLAN SIDEBAR ATAS 2 336 x 280
    $iklansidebar1 = $this->model_iklan->iklan_sidebar(3);
      foreach ($iklansidebar1->result_array() as $row){
        $hitung = $this->model_main->iklan_sidebar()->num_rows();
          if ($hitung >= 1){
            echo "<div><a target='_BLANK'title='".$row['judul']."' href='".$row['url']."'><img class='pull-left img-thumbnail' style='margin:5px' src='".base_url()."asset/foto_iklan/".$row['gambar']."'></a></div>";
          }
      }
    //END IKLAN SIDEBAR ATAS 2 336 x 280
     echo "<p>&nbsp;</p>";

//---------------------------------------------------------------------------------------------

    //START SIDEBAR KANAN - INFORMASI TERPOPULER
    if ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='kategori'){
      $cekkat = $this->db->query("SELECT * FROM kategori where kategori_seo='".$this->uri->segment(3)."'")->row();
    }elseif($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail'){
      $cekkat = $this->db->query("SELECT * FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori where a.judul_seo='".$this->uri->segment(3)."'")->row();
    }

    if ($this->uri->segment(2)=='kategori' OR ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail')){
      echo "<p class='sidebar-title' style='text-transform:uppercase'><span class='glyphicon glyphicon-th'></span> &nbsp; ".$cekkat->nama_kategori." TERPOPULER</p>";
      $terpopuler = $this->model_berita->kategoriterpopuler(3,$cekkat->id_kategori);
    }else{
      echo "<p class='sidebar-title top'><span class='glyphicon glyphicon-star'></span> &nbsp; INFORMASI TERPOPULER</p>";
      $terpopuler = $this->model_berita->terpopuler(3);
    }
    foreach ($terpopuler->result_array() as $row){
        $isi_berita = strip_tags($row['isi_berita']); 
        $isi = substr($isi_berita,0,100); 
        $isi = substr($isi_berita,0,strrpos($isi," "));
        if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
        echo "<small class='date'><span class='glyphicon glyphicon-user'></span> Oleh : $row[nama_lengkap]</small>
              <a class='judul' href='".base_url()."berita/detail/$row[judul_seo]'>$row[judul]</a>
              <small style='color:green' class='date'> Pada : $row[hari], ".tgl_indo($row['tanggal']).", $row[jam] WIB <span class='pull-right'>$row[dibaca] Kali</span></small>
              <img class='img-thumbnail' width='40%' style='min-height:50px; float:left; margin-right:6px' src='".base_url()."asset/foto_berita/".$foto."'>
              <p>$isi...</p><hr>";
    }
    //END SIDEBAR KANAN - INFORMASI TERPOPULER

//---------------------------------------------------------------------------------------------

    //START SIDEBAR KANAN - INFORMASI PILIHAN

    if ($this->uri->segment(2)=='kategori' OR ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail')){
      echo "<p class='sidebar-title' style='text-transform:uppercase'><span class='glyphicon glyphicon-th'></span> &nbsp; ".$cekkat->nama_kategori." PILIHAN</p>";
      $pilihan = $this->model_berita->kategoripilihan(3,$cekkat->id_kategori);
    }else{
      echo "<p class='sidebar-title'><span class='glyphicon glyphicon-th'></span> &nbsp; INFORMASI PILIHAN</p>";
      $pilihan = $this->model_berita->pilihan(3);
    }
    foreach ($pilihan->result_array() as $row){
        $isi_berita = strip_tags($row['isi_berita']); 
        $isi = substr($isi_berita,0,100); 
        $isi = substr($isi_berita,0,strrpos($isi," "));
        if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
        echo "<small class='date'><span class='glyphicon glyphicon-user'></span> Oleh : $row[nama_lengkap]</small>
              <a class='judul' href='".base_url()."berita/detail/$row[judul_seo]'>$row[judul]</a>
              <small style='color:green' class='date'> Pada : $row[hari], ".tgl_indo($row['tanggal']).", $row[jam] WIB <span class='pull-right'>$row[dibaca] Kali</span></small>
              <img class='img-thumbnail' width='40%' style='min-height:50px; float:left; margin-right:6px' src='".base_url()."asset/foto_berita/".$foto."'>
              <p>$isi...</p><hr>";
    }
    //END SIDEBAR KANAN - INFORMASI PILIHAN

//---------------------------------------------------------------------------------------------

    //START IKLAN SIDEBAR KANAN
    $iklansidebar = $this->model_iklan->iklan_sidebar(1);
    foreach ($iklansidebar->result_array() as $row){
        echo "<div><a target='_BLANK'title='".$row['judul']."' href='".$row['url']."'><img class='img-thumbnail' src='".base_url()."asset/foto_iklan/".$row['gambar']."'></a></div>";
    }
    //END IKLAN SIDEBAR KANAN

//---------------------------------------------------------------------------------------------

  ?>
