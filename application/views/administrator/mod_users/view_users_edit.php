<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data User</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_manajemenuser',$attributes); 
              if ($rows['foto']==''){ $foto = 'users.gif'; }else{ $foto = $rows['foto']; }
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[username]'>
                    <input type='hidden' name='level' value='$rows[level]'>
                    <tr><td width='130px'><b>Username</b></td> <td><input class='required form-control' style='width:50%; display:inline-block' type='text' value='$rows[username]' disabled> <small style='color:red'><i>Username Tidak Bisa ubah.</i></small></td></tr>
                          <tr><td><b>Password</b></td>               <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a' placeholder='************'> <small style='color:red'><i>Kosongkan Saja JIka Tidak ubah.</i></small></td></tr>

                          <tr><td><b>Nama Lengkap</b></td>           <td><input class='required form-control' type='text' name='b' value='$rows[nama_lengkap]'></td></tr>
                          <tr><td><b>Tanggal Lahir</b></td>          <td><input style='width:50%; padding-left:10px' class='required datepicker form-control' type='text' name='c' value='".tgl_view($rows['tanggal_lahir'])."' data-date-format='dd-mm-yyyy'></td></tr>
                           <tr><td><b>Kota</b></td>                   <td><input class='required form-control' type='text' name='d' value='$rows[kota]'></td></tr>
                          <tr><td><b>Provinsi</b></td>               <td><input class='required form-control' type='text' name='e' value='$rows[provinsi]'></td></tr>
                          <tr><td><b>Negara</b></td>               <td><input class='required form-control' type='text' name='f' value='$rows[negara]'></td></tr>
                          <tr><td><b>Facebook</b></td>               <td><input class='required form-control' type='text' name='g' value='$rows[facebook]'></td></tr>
                          <tr><td><b>Twitter</b></td>               <td><input class='required form-control' type='text' name='h' value='$rows[twitter]'></td></tr>
                          <tr><td><b>Google+</b></td>               <td><input class='required form-control' type='text' name='i' value='$rows[g_plus]'></td></tr>
                          <tr><td><b>Pekerjaan</b></td>               <td><input class='required form-control' type='text' name='j' value='$rows[pekerjaan]'></td></tr>
                          <tr><td><b>Alamat Lengkap</b></td>         <td><input class='required form-control' type='text' name='k' value='$rows[alamat_lengkap]'></td></tr>
                          <tr><td><b>Alamat Email</b></td>           <td><input class='required email form-control' type='email' name='l' value='$rows[email]'></td></tr>
                          <tr><td><b>No Hp</b></td>                  <td><input style='width:40%' class='required number form-control' type='number' name='m' value='$rows[no_telp]'></td></tr>
                          <tr><td><b>Status</b></td>               <td><input class='required form-control' type='text' name='n' value='$rows[pekerjaan]'></td></tr>
                          <tr><td><b>Pendidikan</b></td>               <td><input class='required form-control' type='text' name='o' value='$rows[pekerjaan]'></td></tr>";
                          if ($rows['level']=='penulis'){
                            echo "<tr><td><b>Nama Bank</b></td>              <td><input style='width:60%' class='required form-control' type='text' name='p' value='$rows[nama_bank]'></td></tr>
                                  <tr><td><b>Atas Nama</b></td>              <td><input class='required form-control' type='text' name='q' value='$rows[atas_nama]'></td></tr></td></tr>
                                  <tr><td><b>No Rekening</b></td>            <td><input style='width:60%' class='required number form-control' type='number' name='r' value='$rows[no_rekening]'></td></tr>";
                          }
                          echo "
                          <tr><td><b>Tentang Saya</b></td>         <td><textarea style='height:90px' class='required form-control' name='s'>$rows[tentang_saya]</textarea></td></tr>

                    <tr><th scope='row'>Level</th>                    <td>"; if ($rows['level']=='penulis'){ echo "<input type='radio' name='t' value='penulis' checked> Penulis &nbsp; <input type='radio' name='t' value='user'> Users &nbsp; <input type='radio' name='t' value='admin'> Administrator"; 
                                                                             }elseif($rows['level']=='user'){ echo "<input type='radio' name='t' value='penulis'> Penulis &nbsp; <input type='radio' name='t' value='user' checked> Users &nbsp; <input type='radio' name='t' value='admin'> Administrator"; 
                                                                             }else{ echo "<input type='radio' name='t' value='penulis'> Penulis &nbsp; <input type='radio' name='t' value='user'> Users &nbsp; <input type='radio' name='t' value='admin' checked> Administrator"; } echo "</td></tr>
                    <tr><th scope='row'>Blokir</th>                   <td>"; if ($rows['blokir']=='Y'){ echo "<input type='radio' name='u' value='Y' checked> Ya &nbsp; <input type='radio' name='u' value='N'> Tidak"; }else{ echo "<input type='radio' name='u' value='Y'> Ya &nbsp; <input type='radio' name='u' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                     <td><input type='file' class='form-control' name='foto'><hr style='margin:5px'>
                                                                                 <img class='img-thumbnail' style='height:60px' src='".base_url()."asset/foto_user/$foto'></td></tr>
                  </tbody>
                  </table>
                  </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";