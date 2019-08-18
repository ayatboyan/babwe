<?php 
if ($row['level']=='admin'){
  redirect('main');
}else{
  echo "<p class='sidebar-title'><span class='glyphicon glyphicon-volume-up'></span> Data Profile Anda";
      if ($this->uri->segment(3)!=''){
        echo "<a class='btn btn-info btn-xs pull-right' href='".base_url()."users/read/$row[username]/0'><span class='glyphicon glyphicon-envelope'></span> Kirim Pesan</a></p>";
      }else{
        echo "<a class='btn btn-success btn-xs pull-right' href='".base_url()."users/editprofile'><span class='glyphicon glyphicon-edit'></span> Edit Profile</a></p>";
      }
        echo "<p>Berikut Informasi Data Profile anda.<br> 
           Pastikan data-data dibawah ini sudah benar, agar tidak terjadi kesalahan saat transaksi.</p>";                
                  echo "<table class='table table-hover table-condensed'>
                        <thead>
                          <tr><td width='170px'><b>Username</b></td> <td><b style='color:red'>$row[username]</b></td></tr>
                          <tr><td><b>Password</b></td> <td><b style='color:red'>************</b></td></tr>
                          <tr><td><b>Nama Lengkap</b></td>           <td>$row[nama_lengkap]</td></tr>
                          <tr><td><b>Tanggal Lahir</b></td>          <td>".tgl_indo($row['tanggal_lahir'])."</td></tr>
                          <tr><td><b>Kota</b></td>                   <td>$row[kota]</td></tr>
                          <tr><td><b>Provinsi</b></td>               <td>$row[provinsi]</td></tr>
                          <tr><td><b>Negara</b></td>                 <td>$row[negara]</td></tr>
                          <tr><td><b>Facebook</b></td>               <td><a href='$row[facebook]'>$row[facebook]</a></td></tr>
                          <tr><td><b>Twitter</b></td>                <td><a href='$row[twitter]'>$row[twitter]</a></td></tr>
                          <tr><td><b>Google+</b></td>                <td><a href='$row[g_plus]'>$row[g_plus]</a></td></tr>
                          <tr><td><b>Pekerjaan</b></td>              <td>$row[pekerjaan]</td></tr>
                          <tr><td><b>Alamat</b></td>                 <td>$row[alamat_lengkap]</td></tr>
                          <tr><td><b>Alamat Email</b></td>           <td>$row[email]</td></tr>
                          <tr><td><b>No Hp</b></td>                  <td>$row[no_telp]</td></tr>
                          <tr><td><b>Status</b></td>                 <td>$row[status_hubungan]</td></tr>
                          <tr><td><b>Pendidikan</b></td>             <td>$row[pendidikan]</td></tr>";
                          if ($row['level']=='penulis'){
                          echo "<tr><td><b>Nama Bank</b></td>              <td>$row[nama_bank]</td></tr>
                                <tr><td><b>Atas Nama</b></td>              <td>$row[atas_nama]</td></tr>
                                <tr><td><b>No Rekening</b></td>            <td>$row[no_rekening]</td></tr>";
                          }
                          echo "<tr><td><b>Tentang Saya</b></td>           <td>$row[tentang_saya]</td></tr>
                        </thead>
                    </table>";
}
?>