<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Berita Terpilih</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_listberita',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='100px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td></tr>
                    <tr><th scope='row'>Sub Judul</th>              <td><input type='text' class='form-control' name='c' value='$rows[sub_judul]'></td></tr>
                    <tr><th scope='row'>Youtube</th>          <td><input type='text' class='form-control' name='d' value='$rows[youtube]' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select id='getlowker' name='a' class='form-control' required>";
                                                                            foreach ($record->result_array() as $row){
                                                                                if ($rows['id_kategori'] == $row['id_kategori']){
                                                                                  echo "<option value='$row[id_kategori]' selected>$row[nama_kategori]</option>";
                                                                                }else{
                                                                                  echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                                                                }
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Headline</th>               <td>"; if ($rows['headline']=='Y'){ echo "<input type='radio' name='e' value='Y' checked> Ya &nbsp; <input type='radio' name='e' value='N'> Tidak"; }else{ echo "<input type='radio' name='e' value='Y'> Ya &nbsp; <input type='radio' name='e' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Pil. Redaksi</th>        <td>"; if ($rows['aktif']=='Y'){ echo "<input type='radio' name='f' value='Y' checked> Ya &nbsp; <input type='radio' name='f' value='N'> Tidak"; }else{ echo "<input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Berita Utama</th>           <td>"; if ($rows['utama']=='Y'){ echo "<input type='radio' name='g' value='Y' checked> Ya &nbsp; <input type='radio' name='g' value='N'> Tidak"; }else{ echo "<input type='radio' name='g' value='Y'> Ya &nbsp; <input type='radio' name='g' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Isi Berita</th>             <td><textarea class='ckeditor form-control' name='h' style='height:260px' required>$rows[isi_berita]</textarea></td></tr>
                    <tr><th scope='row'>Ganti Gambar</th>                 <td><input type='file' class='form-control' name='k'>";
                                                                               if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_berita/$rows[gambar]'>$rows[gambar]</a>"; } echo "</td></tr>
                    <tr><th scope='row'>Keterangan</th>            <td><input type='text' class='form-control' name='i' value='$rows[keterangan_gambar]' placeholder='Keterangan dari Gambar'></td></tr>
                    <tr><th scope='row'>Sumber</th>             <td><input type='text' class='form-control' name='ii' value='$rows[sumber_berita]' placeholder='Sumber dari Berita atau article ini'></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll'>";
                                                                            $_arrNilai = explode(',', $rows['tag']);
                                                                            foreach ($tag->result_array() as $tag){
                                                                                $_ck = (array_search($tag['tag_seo'], $_arrNilai) === false)? '' : 'checked';
                                                                                echo "<span style='display:block;'><input type=checkbox value='$tag[tag_seo]' name=j[] $_ck>$tag[nama_tag] &nbsp; &nbsp; &nbsp; </span>";
                                                                            }
                    echo "</div></td></tr>
                  </tbody>
                  </table>

                  <div class='' id='display'></div>";

                  $cekkategori = $this->db->query("SELECT * FROM kategori where id_kategori='".$rows['id_kategori']."'")->row();
                  if ($cekkategori->lowker == 'Y'){
                    $row = $this->db->query("SELECT * FROM lowker where id_berita='".$rows['id_berita']."'")->row_array();
                    echo "<table class='table table-condensed'>
                          <tbody>
                            <input type='hidden' value='lowkerupdate' name='lowkerupdate'>
                            <tr><th width='120px' scope='row'>Perusahaan</th> <td><input type='text' class='required form-control' name='aa' value='$row[nama_perusahaan]' required></td></tr>
                            <tr><th scope='row'>Posisi Kerja</th>             <td><input type='text' class='required form-control' name='bb' value='$row[posisi]' required></td></tr>
                            <tr><th scope='row'>Kota</th>                     <td><input type='text' class='required form-control' name='cc' value='$row[kota]' required></td></tr>
                            <tr><th scope='row'>Propinsi</th>                 <td><input type='text' class='required form-control' name='dd' value='$row[propinsi]' required></td></tr>
                            <tr><th scope='row'>Alamat</th>                   <td><textarea class='required form-control' name='ee' onkeyup=\"auto_grow(this)\" placeholder='Alamat Perusahaan,...' required>$row[alamat_lengkap]</textarea></td></tr>
                            <tr><th scope='row'>Tanggal</th>        <td><input type='text' class='form-control' name='ff' placeholder='Tanggal Expire atau berakhir lowker...'></td></tr>
                            <tr><th scope='row'>Syarat</th>         <td><textarea class='required form-control' name='gg' onkeyup=\"auto_grow(this)\" placeholder='Syarat-syarat harus dipenuhi,...' required></textarea></td></tr>
                            <tr><th scope='row'>Kontak</th>         <td><textarea class='required form-control' name='hh' onkeyup=\"auto_grow(this)\" placeholder='Data Kontak Perusahaan,...' required></textarea></td></tr>
                          </tbody>
                        </table>";
                  }elseif($cekkategori->jual_beli == 'Y'){
                    $row = $this->db->query("SELECT * FROM jual_beli where id_berita='".$rows['id_berita']."'")->row_array();
                    $jmlfoto = $this->db->query("SELECT * FROM jual_beli where id_berita='".$rows['id_berita']."'")->num_rows();
                    echo "<table class='table table-condensed'>
                          <tbody>
                            <input type='hidden' name='jualbeliupdate' value='jualbeliupdate'>
                              <tr><th width='120px' scope='row'>Produk</th> <td><input type='text' class='required form-control' name='aa' value='$row[nama_produk]' placeholder='Tuliskan nama produk anda,...' required></td></tr>
                              <tr><th scope='row'>Harga</th>           <td><input type='text' class='number required form-control' name='bb' value='$row[harga]' required></td></tr>
                              <tr><th scope='row'>Berat</th>          <td><input type='text' class='required form-control' name='cc' value='$row[berat]' required></td></tr>
                              <tr><th scope='row'>Ganti Foto</th>               <td><input type='file' class='required form-control upload' name='userfile[]' required multiple><small>Multiple Upload, Allowed File Extensions : .jpg, .gif, .jpeg, .png</small> <br>
                                <i style='color:red'>Lihat Gambar Saat ini : </i>";
                                $pecah = explode(',',$row['foto']);
                                if ($jmlfoto!=0){
                                  for ($i = 1; $i <= count($pecah); $i++){
                                      echo "<a target='_BLANK' href='".base_url()."asset/foto_berita/".$pecah[$i-1]."'>".$pecah[$i-1]."</a>,";
                                  }
                                }
                              echo "</td></tr>
                              <tr><th scope='row'>Jumlah</th>         <td><input type='text' class='required form-control' name='ee' value='$row[jumlah]' required></td></tr>
                            </tbody>
                          </table>";
                  }

                echo "</div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
