<?php 
  echo "<p class='sidebar-title'><span class='glyphicon glyphicon-volume-up'></span> Edit Data Profile Anda</p>
        <p>Berikut Informasi Data Profile anda.<br> 
           Pastikan data-data dibawah ini sudah benar, agar tidak terjadi kesalahan saat transaksi.</p>";                
                  $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart('users/editprofile',$attributes); 
                  echo "<table class='table table-hover table-condensed'>
                        <thead>
                          <tr><td width='170px'><b>Username</b></td> <td><input class='required form-control' style='width:50%; display:inline-block' type='text' value='$row[username]' disabled> <small style='color:red'><i>Username Tidak Bisa ubah.</i></small></td></tr>
                          <tr><td><b>Password</b></td>               <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a' placeholder='************'> <small style='color:red'><i>Kosongkan Saja JIka Tidak ubah.</i></small></td></tr>

                          <tr><td><b>Nama Lengkap</b></td>           <td><input class='required form-control' type='text' name='b' value='$row[nama_lengkap]'></td></tr>
                          <tr><td><b>Tanggal Lahir</b></td>          <td><input style='width:50%; padding-left:10px' class='required datepicker form-control' type='text' name='c' value='".tgl_view($row['tanggal_lahir'])."' data-date-format='dd-mm-yyyy'></td></tr>
                           <tr><td><b>Kota</b></td>                   <td><input class='required form-control' type='text' name='d' value='$row[kota]'></td></tr>
                          <tr><td><b>Provinsi</b></td>               <td><input class='required form-control' type='text' name='e' value='$row[provinsi]'></td></tr>
                          <tr><td><b>Negara</b></td>               <td><input class='required form-control' type='text' name='f' value='$row[negara]'></td></tr>
                          <tr><td><b>Facebook</b></td>               <td><input class='required form-control' type='text' name='g' value='$row[facebook]'></td></tr>
                          <tr><td><b>Twitter</b></td>               <td><input class='required form-control' type='text' name='h' value='$row[twitter]'></td></tr>
                          <tr><td><b>Google+</b></td>               <td><input class='required form-control' type='text' name='i' value='$row[g_plus]'></td></tr>
                          <tr><td><b>Pekerjaan</b></td>               <td><input class='required form-control' type='text' name='j' value='$row[pekerjaan]'></td></tr>
                          <tr><td><b>Alamat Lengkap</b></td>         <td><input class='required form-control' type='text' name='k' value='$row[alamat_lengkap]'></td></tr>
                          <tr><td><b>Alamat Email</b></td>           <td><input class='required email form-control' type='email' name='l' value='$row[email]'></td></tr>
                          <tr><td><b>No Hp</b></td>                  <td><input style='width:40%' class='required number form-control' type='number' name='m' value='$row[no_telp]'></td></tr>
                          <tr><td><b>Status</b></td>               <td><input class='required form-control' type='text' name='n' value='$row[pekerjaan]'></td></tr>
                          <tr><td><b>Pendidikan</b></td>               <td><input class='required form-control' type='text' name='o' value='$row[pekerjaan]'></td></tr>";
                          if ($row['level']=='penulis'){
                            echo "<tr><td><b>Nama Bank</b></td>              <td><input style='width:60%' class='required form-control' type='text' name='p' value='$row[nama_bank]'></td></tr>
                                  <tr><td><b>Atas Nama</b></td>              <td><input class='required form-control' type='text' name='q' value='$row[atas_nama]'></td></tr></td></tr>
                                  <tr><td><b>No Rekening</b></td>            <td><input style='width:60%' class='required number form-control' type='number' name='r' value='$row[no_rekening]'></td></tr>";
                          }
                          echo "
                          <tr><td><b>Ganti Foto</b></td>               <td><input class='form-control' type='file' name='foto'></td></tr>
                          <tr><td><b>Tentang Saya</b></td>         <td><textarea style='height:140px' class='required form-control' name='s'>$row[tentang_saya]</textarea></td></tr>
                          <tr><td></td><td><input class='btn btn-sm btn-primary' type='submit' name='submit' value='Simpan Perubahan'></td></tr>
                        </thead>
                    </table>";
                  echo form_close();
?>