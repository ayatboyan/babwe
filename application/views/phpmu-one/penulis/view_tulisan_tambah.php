<?php 
    echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; $title";

              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('users/tambah_tulisan',$attributes); 
          echo "<table class='table table-condensed '>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='100px' scope='row'>Judul</th>    <td><input type='text' class='required form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Sub Judul</th>              <td><input type='text' class='form-control' name='c'></td></tr>
                    <tr><th scope='row'>Youtube</th>          <td><input type='text' class='form-control' name='d' placeholder='Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU'></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select id='getlowker' name='a' class='required form-control' required>
                                                                            <option value='' selected>- Pilih Kategori -</option>";
                                                                            foreach ($record->result_array() as $row){
                                                                                echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Isi Tulisan</th>             <td><textarea class='required ckeditor form-control' name='h' style='height:260px' required></textarea></td></tr>
                    <tr><th scope='row'>Gambar</th>                 <td><input type='file' class='form-control' name='k'></td></tr>
                    <tr><th scope='row'>Keterangan</th>             <td><input type='text' class='form-control' name='i' placeholder='Keterangan dari Gambar'></td></tr>
                    <tr><th scope='row'>Sumber</th>             <td><input type='text' class='form-control' name='ii' placeholder='Sumber dari Berita atau article ini'></td></tr>
                    <tr><th scope='row'>Tag</th>                    <td><div class='checkbox-scroll'>";
                                                                            foreach ($tag->result_array() as $tag){
                                                                                echo "<span style='display:block;'><input type=checkbox value='$tag[tag_seo]' name=j[]> $tag[nama_tag] &nbsp; &nbsp;  </span>";
                                                                            }
                    echo "</div></td></tr>
                  </tbody>
                  </table>

                  <div class='' id='display'></div>

                    <button type='submit' name='submit' class='btn btn-primary'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-warning'>Cancel</button></a>";
