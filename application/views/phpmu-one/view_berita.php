<script>
jQuery(document).ready(function($) {
    $('.lightbox_trigger').click(function(e) {
        //prevent default action (hyperlink)
        e.preventDefault();
        //Get clicked link href
        var image_href = $(this).attr("href");
        /*  
        If the lightbox window HTML already exists in document, 
        change the img src to to match the href of whatever link was clicked
        If the lightbox window HTML doesn't exists, create it and insert it.
        (This will only happen the first time around)
        */
        if ($('#lightbox').length > 0) { // #lightbox exists
            //place href as img src value
            $('#content').html('<img class="img-thumbnail" src="' + image_href + '" />');
            
            //show lightbox window - you could use .show('fast') for a transition
            $('#lightbox').show();
        }else { //#lightbox does not exist - create and insert (runs 1st time only)
            //create HTML markup for lightbox window
            var lightbox = 
            '<div id="lightbox">' +
                '<p>Close</p>' +
                '<div id="content">' + //insert clicked link's href into img src
                    '<img class="img-thumbnail" src="' + image_href +'" />' +
                '</div>' +  
            '</div>'; 
            //insert lightbox HTML into page
            $('body').append(lightbox);
        }  
    });
    //Click anywhere on the page to get rid of lightbox window
    $('#lightbox').live('click', function() { //must use live, as the lightbox element is inserted into the DOM
        $('#lightbox').hide();
    });

});
</script>
<style type="text/css">
    #lightbox {
    position:fixed; /* keeps the lightbox window in the current viewport */
    top:0; 
    left:0; 
    width:100%; 
    height:100%; 
    background: rgba(0, 0, 0, .8); 
    text-align:center;
    z-index: 99999;
}

#lightbox p {
    text-align:right; 
    color:#fff; 
    margin:20px 20px 0px 0px; 
    font-size:13px; 
    font-weight: bold;
    cursor:pointer
}

#lightbox img {
    box-shadow:0 0 25px #111;
    -webkit-box-shadow:0 0 25px #111;
    -moz-box-shadow:0 0 25px #111;
    max-width:650px !important;
}
</style>
<?php
  if (trim($record['foto'])!=''){ $foto = "$record[foto]"; }else{ $foto = 'users.gif'; } 
  $tanggal = tgl_indo($record['tanggal']);
  echo "<p class='sidebar-title'><span class='judul' class='glyphicon glyphicon-volume-up'></span> $record[judul]</p>
        <p style='color:blue'>$record[sub_judul]</p>
        <div style='padding:0px; margin:0px' class='col-md-12'>
            <div class='col-md-7'>
                <small class='date'><span class='glyphicon glyphicon-time'></span> $record[hari], $tanggal, $record[jam] WIB, $record[dibaca] View</small>
                <small class='date'><span class='glyphicon glyphicon-user'></span> $record[nama_lengkap], Kategori : <a href='".base_url()."berita/kategori/$record[kategori_seo]'>$record[nama_kategori]</a></small>
            </div>

            <div class='col-md-5'>
                <span class='pull-right st_email_large' displayText='Email'></span>
                <span class='pull-right st_googleplus_large' displayText='Google +'></span>
                <span class='pull-right st_twitter_large' displayText='Tweet'></span>
                <span class='pull-right st_facebook_large' displayText='Facebook'></span>
                <span class='pull-right st_sharethis_large' displayText='ShareThis'></span>
            </div>
        </div>

        <hr>
    <div class='col-md-12'>";
        if ($record['gambar'] != ''){
            echo "<img class='img-thumbnail' width='100%' src='".base_url()."asset/foto_berita/".$record['gambar']."'><br>
                  <small class='btn btn-default btn-xs btn-block' style='color:#000; margin-bottom:7px'>$record[keterangan_gambar]</small>";
        }

        if ($record['jual_beli']=='Y'){
            $row = $this->db->query("SELECT * FROM jual_beli where id_berita='".$record['id_berita']."'")->row_array();
            $jmlfoto = $this->db->query("SELECT * FROM jual_beli where id_berita='".$record['id_berita']."'")->num_rows();
            $pecah = explode(',',$row['foto']);
            if ($jmlfoto!=0){
                echo "<div style='padding:4px; margin:4px' class='alert alert-warning col-md-12'>";
                for ($i = 1; $i <= count($pecah); $i++){
                    echo "<div style='padding:8px;' class='col-md-2'>
                            <div class='hidden-xs' style='overflow:hidden; max-height:80px; box-shadow: 0px 7px 7px #888888;'>
                                <a class='lightbox_trigger' href='".base_url()."asset/foto_berita/".$pecah[$i-1]."'><img class='gambar' width='100%' src='".base_url()."asset/foto_berita/".$pecah[$i-1]."'></a>
                            </div>

                            <div class='visible-xs' style='box-shadow: 0px 7px 7px #888888;'>
                                <a class='lightbox_trigger' href='".base_url()."asset/foto_berita/".$pecah[$i-1]."'><img class='gambar' width='100%' src='".base_url()."asset/foto_berita/".$pecah[$i-1]."'></a>
                            </div>

                          </div>";
                }
                echo "</div>";
            }
        }


        //HIDDEN IKLAN DETAIL BERITA 728 X 15
        // $iklantengah1 = $this->model_iklan->iklan_tengah(2);
        // foreach ($iklantengah1->result_array() as $row){
        //       echo "<div><a target='_BLANK' title='".$row['judul']."' href='".$row['url']."'><img class='img-thumbnail' src='".base_url()."asset/foto_iklan/".$row['gambar']."'></a></div>";
        // }


        //HIDDEN IKLAN SIDEBAR TOP 1
        // $iklansidebar1 = $this->model_iklan->iklan_sidebar(2);
        // foreach ($iklansidebar1->result_array() as $row){
        //   $hitung = $this->model_main->iklan_sidebar()->num_rows();
        //     if ($hitung >= 1){
        //       echo "<div><a target='_BLANK'title='".$row['judul']."' href='".$row['url']."'><img class='pull-left img-thumbnail' style='margin:5px' src='".base_url()."asset/foto_iklan/".$row['gambar']."'></a></div>";
        //     }
        // }


        echo "<p>$record[isi_berita]</p>";
    if ($record['youtube'] != ''){
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $record['youtube'], $match)) {
              $video = $match[1];
            } ?>
                  <p><iframe  id="ytplayer" type="text/html" width="100%" height="340px"
                        src="https://www.youtube.com/embed/<?php echo $video ?>?rel=0&showinfo=1&color=white&iv_load_policy=3"
                        frameborder="0" allowfullscreen></iframe>
                  </p>
    <?php 
    }
        if ($record['lowker']=='Y'){
            $row = $this->db->query("SELECT * FROM lowker where id_berita='".$record['id_berita']."'")->row_array();
            echo "<br><table class='table table-condensed '>
                    <tbody>
                        <tr><th width='120px' scope='row'>Perusahaan</th>   <td>$row[nama_perusahaan]</td></tr>
                        <tr><th scope='row'>Posisi Kerja</th>               <td>$row[posisi]</td></tr>
                        <tr><th scope='row'>Kota</th>                       <td>$row[kota]</td></tr>
                        <tr><th scope='row'>Propinsi</th>                   <td>$row[propinsi]</td></tr>
                        <tr><th scope='row'>Alamat</th>                     <td>$row[alamat_lengkap]</td></tr>
                        <tr><th scope='row'>Tgl Expire</th>                 <td>$row[tanggal_berakhir]</td></tr>
                        <tr><th scope='row'>Syarat-Syarat</th>              <td>".nl2br($row['syarat_syarat'])."</td></tr>
                        <tr><th scope='row'>Kontak Kami</th>                <td>$row[kontak]</td></tr>
                    </tbody>
                  </table>";
        }

        if ($record['jual_beli']=='Y'){
            $row = $this->db->query("SELECT * FROM jual_beli where id_berita='".$record['id_berita']."'")->row_array();
            echo "<br><table class='table table-condensed '>
                    <tbody>
                        <tr><th width='120px' scope='row'>Nama Produk</th>   <td>$row[nama_produk]</td></tr>
                        <tr><th scope='row'>Harga</th>               <td>Rp ".rupiah($row['harga'])."</td></tr>
                        <tr><th scope='row'>Berat</th>                       <td>$row[berat]</td></tr>
                        <tr><th scope='row'>Jumlah</th>                   <td>$row[jumlah]</td></tr>
                    </tbody>
                  </table>";
        }
    ?>
    <hr>
    <div class="fb-like" data-href="<?php echo base_url(); ?>berita/detail/<?php echo $record['judul_seo']; ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

    <?php
    echo "</div><div style='clear:both'><br></div>

    <p id='add' class='judul'> &nbsp; Tentang Penulis</p>
    <table class='table'>
    <tr class='info'>
        <td width='100px'><img class='img-thumbnail' width='90px' src='".base_url()."asset/foto_user/$foto'</td> 
        <td><span style='font-size:14px; font-weight:bold'>by : $record[nama_lengkap]</span>"; 
        if ($this->session->level != ''){
            $cek = $this->model_users->cekteman($username)->num_rows();
            if ($cek >= 1){
                echo "<a class='btn btn-info btn-xs pull-right' href='".base_url()."users/read/$username/0'><span class='glyphicon glyphicon-envelope'></span> Kirimkan Pesan</a>"; 
            }else{
                $cekterkirim = $this->model_users->cektemanterkirim($username)->num_rows();
                if ($cekterkirim >= 1){
                    echo "<a class='pull-right btn btn-info btn-xs' href='#'>Permintaan terkirim</a>";  
                }else{
                    echo "<a class='pull-right btn btn-success btn-xs' href='".base_url()."users/add/$username/".$this->uri->segment(3)."'>Tambahkan Teman</a>";  
                }
            }
        }
            echo "<br>$record[tentang_saya]</td>
    </tr>
    </table>";
        $iklantengah2 = $this->model_iklan->iklan_tengah(3);
        foreach ($iklantengah2->result_array() as $row){
            echo "<div><a target='_BLANK' title='".$row['judul']."' href='".$row['url']."'><img class='img-thumbnail' src='".base_url()."asset/foto_iklan/".$row['gambar']."'></a></div>";
        }

    echo "<p class='sidebar-title' style='text-transform:uppercase'><span class='glyphicon glyphicon-list'></span> &nbsp; ".$record['nama_kategori']." TERBARU</p><hr>";
        $no = 1;
        $infoterbarukategori = $this->model_berita->info_terbarukategori(6,$record['id_kategori']);
        foreach ($infoterbarukategori->result_array() as $row){
            $isi_berita = strip_tags($row['isi_berita']); 
            $isi = substr($isi_berita,0,150); 
            $isi = substr($isi_berita,0,strrpos($isi," "));
            $tanggal = tgl_indo($row['tanggal']);
            if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
            echo "<div class='col-md-4'><br>
                    <small class='date pull-right'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal, $row[jam] WIB</small>
                    <img class='img-thumbnail' width='100%' style='min-height:120px' src='".base_url()."asset/foto_berita/".$foto."'>
                    <small style='color:green' class='date'> Oleh : $row[nama_lengkap] <span class='pull-right'>$row[dibaca] Kali</span></small>
                    <a class='judul' href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a>

                </div>";
                if ($no % 3 == 0){
                    echo "<div style='clear:both'><hr></div>";
                }
            $no++;
        }
        echo "<div style='clear:both'></div>";
    ?>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="viewcomment" class="block-title">
    <p class='sidebar-title'><span class='glyphicon glyphicon-comment'></span> &nbsp; Tuliskan Komentar anda dari Facebook</p><hr>
    </div>
    <div class="block-content">
        <div class="comment-block">
            <div class="fb-comments" data-href="<?php echo base_url().'berita/detail/'.$this->uri->segment(3); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div> 
        </div>
    </div>

    <?php
    if ($this->session->level != ''){
        echo "<p class='sidebar-title'><span class='glyphicon glyphicon-comment'></span> &nbsp; Tuliskan Komentar anda dari Web</p><hr>";
        $usrk = $this->db->query("SELECT * FROM users where username='".$this->session->username."'")->row_array();
        if ($usrk['foto'] == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $usrk['foto']; }
        $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
        echo form_open_multipart('berita/detail/'.$this->uri->segment(3),$attributes); 
            echo "<input type='hidden' name='id' value='$record[id_berita]'>
            <table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
                <tr>
                    <td width='60px;'>
                        <img style='border:1px solid #cecece' width='55px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'>
                    </td>
                    <td valign=top>
                        <textarea name='c' class='form-control' placeholder='Tuliskan Komentar...' onkeyup=\"auto_grow(this)\"></textarea>
                    </td>
                </tr>
            </table>
            <button style='margin-top:-18px' type='submit' name='submit' class='pull-right btn btn-primary btn-sm'>Kirimkan Komentar</button>

        </form><br>";
    }else{
        echo "<div class='alert alert-danger'><center>Silahkan <a href='".base_url()."auth/users'>Buat akun</a> atau <a href='".base_url()."auth/users'>Login</a> untuk Berkomentar dari web!</center></div>";
    }

    echo "<p id='komentar'><b>".$komentar->num_rows()." Comment</b></p>
        <table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>";
        foreach ($komentar->result_array() as $row) {
            $usrk = $this->db->query("SELECT * FROM users where username='".$row['username']."'")->row_array();
            if ($usrk['foto'] == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $usrk['foto']; }
            $tanggal = cek_terakhir($row['tgl_komentar'].' '.$row['jam_komentar']);
            echo "<tr>
                    <td width='60px;'>
                        <img style='border:1px solid #cecece' width='55px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'>
                    </td>
                    <td valign=top>
                        <a href='#'><b>$usrk[nama_lengkap]</b></a> <small style='color:#8a8a8a'>$tanggal</small><br>
                        $row[isi_komentar]
                    </td>
                  </tr>";
        }
        echo "</table>";


