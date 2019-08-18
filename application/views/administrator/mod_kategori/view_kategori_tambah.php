<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Kategori Berita</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_kategoriberita',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Nama Kategori</th>    <td><input type='text' class='form-control' name='a' required></td></tr>
                    <tr><th scope='row'>Komisi</th>                         <td><input type='radio' name='d' value='Y' checked> Ya &nbsp; <input type='radio' name='d' value='N'> Tidak</td></tr>
                    <tr><th scope='row'>Lowker</th>                         <td><input type='radio' name='e' value='Y' checked> Ya &nbsp; <input type='radio' name='e' value='N'> Tidak</td></tr>
                    <tr><th scope='row'>Jual-beli</th>                      <td><input type='radio' name='f' value='Y' checked> Ya &nbsp; <input type='radio' name='f' value='N'> Tidak</td></tr>
                    <tr><th scope='row'>Level</th>                          <td><input type='radio' name='level' value='penulis' checked> Penulis &nbsp; <input type='radio' name='level' value='user'> Users</td></tr>
                    <tr><th scope='row'>Aktif</th>                          <td><input type='radio' name='b' value='Y' checked> Ya &nbsp; <input type='radio' name='b' value='N'> Tidak</td></tr>
                    <tr><th scope='row'>Posisi</th>                         <td><input type='text' class='form-control' name='c'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
