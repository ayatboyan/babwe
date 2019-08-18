<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data User</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_manajemenuser',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><td width='130px'><b>Username</b></td> <td><input class='required form-control' style='width:50%; display:inline-block' type='text' name='username'></td></tr>
                          <tr><td><b>Password</b></td>               <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a'></td></tr>

                          <tr><td><b>Nama Lengkap</b></td>           <td><input class='required form-control' type='text' name='b'></td></tr>
                          <tr><td><b>Tanggal Lahir</b></td>          <td><input style='width:50%; padding-left:10px' class='required form-control' type='text' name='c' placeholder='dd-mm-yyyy'></td></tr>
                           <tr><td><b>Kota</b></td>                   <td><input class='required form-control' type='text' name='d'></td></tr>
                          <tr><td><b>Provinsi</b></td>               <td><input class='required form-control' type='text' name='e'></td></tr>
                          <tr><td><b>Negara</b></td>               <td><input class='required form-control' type='text' name='f'></td></tr>
                          <tr><td><b>Facebook</b></td>               <td><input class='required form-control' type='text' name='g'></td></tr>
                          <tr><td><b>Twitter</b></td>               <td><input class='required form-control' type='text' name='h'></td></tr>
                          <tr><td><b>Google+</b></td>               <td><input class='required form-control' type='text' name='i'></td></tr>
                          <tr><td><b>Pekerjaan</b></td>               <td><input class='required form-control' type='text' name='j'></td></tr>
                          <tr><td><b>Alamat Lengkap</b></td>         <td><input class='required form-control' type='text' name='k'></td></tr>
                          <tr><td><b>Alamat Email</b></td>           <td><input class='required email form-control' type='email' name='l'></td></tr>
                          <tr><td><b>No Hp</b></td>                  <td><input style='width:40%' class='required number form-control' type='number' name='m'></td></tr>
                          <tr><td><b>Status</b></td>               <td><input class='required form-control' type='text' name='n'></td></tr>
                          <tr><td><b>Pendidikan</b></td>               <td><input class='required form-control' type='text' name='o'></td></tr>
                          <tr><td><b>Nama Bank</b></td>              <td><input style='width:60%' class='required form-control' type='text' name='p'></td></tr>
                          <tr><td><b>Atas Nama</b></td>              <td><input class='required form-control' type='text' name='q'></td></tr></td></tr>
                          <tr><td><b>No Rekening</b></td>            <td><input style='width:60%' class='required number form-control' type='number' name='r'></td></tr>
                          <tr><td><b>Tentang Saya</b></td>         <td><textarea style='height:90px' class='required form-control' name='s'></textarea></td></tr>

                    <tr><th scope='row'>Level</th>                    <td><input type='radio' name='t' value='penulis' checked> Penulis &nbsp; <input type='radio' name='t' value='user'> Users &nbsp; <input type='radio' name='t' value='admin'> Administrator </td></tr>
                    <tr><th scope='row'>Blokir</th>                   <td><input type='radio' name='u' value='Y' checked> Ya &nbsp; <input type='radio' name='u' value='N'> Tidak</td></tr>
                    <tr><th scope='row'>Foto</th>               <td><input type='file' class='form-control' name='foto'><hr style='margin:5px'></td></tr>
                  </tbody>
                  </table>
                  </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";