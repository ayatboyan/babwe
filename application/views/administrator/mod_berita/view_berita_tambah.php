<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Berita Baru</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_listberita',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='100px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Sub Judul</th>              <td><input type='text' class='form-control' name='c'></td></tr>
                    <tr><th scope='row'>Youtube</th>          <td><input type='text' class='form-control' name='d' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select id='getlowker' name='a' class='form-control' required>
                                                                            <option value='' selected>- Pilih Kategori -</option>";
                                                                            foreach ($record->result_array() as $row){
                                                                                echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Headline</th>               <td><input type='radio' name='e' value='Y'> Ya &nbsp; <input type='radio' name='e' value='N' checked> Tidak</td></tr>
                    <tr><th scope='row'>Pil. Redaksi</th>        <td><input type='radio' name='f' value='Y'> Ya &nbsp; <input type='radio' name='f' value='N' checked> Tidak</td></tr>
                    <tr><th scope='row'>Berita Utama</th>           <td><input type='radio' name='g' value='Y'> Ya &nbsp; <input type='radio' name='g' value='N' checked> Tidak</td></tr>
                    <tr><th scope='row'>Isi Berita</th>             <td><textarea class='ckeditor form-control' name='h' style='height:260px' required></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='k'></td></tr>
                    <tr><th scope='row'>Keterangan</th>            <td><input type='text' class='form-control' name='i' placeholder='Keterangan dari Gambar'></td></tr>
                    <tr><th scope='row'>Sumber</th>             <td><input type='text' class='form-control' name='ii' placeholder='Sumber dari Berita atau article ini'></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll'>";
                                                                            foreach ($tag->result_array() as $tag){
                                                                                echo "<span style='display:block;'><input type=checkbox value='$tag[tag_seo]' name=j[]>$tag[nama_tag] &nbsp; &nbsp; &nbsp; </span>";
                                                                            }
                    echo "</div></td></tr>
                  </tbody>
                  </table>

                  <div class='' id='display'></div>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
