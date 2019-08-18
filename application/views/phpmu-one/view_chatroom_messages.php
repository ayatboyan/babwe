<?php
echo "<table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>";
        if ($ambilpesan->num_rows() <= 0){
        	echo "<div class='alert alert-danger'><center>Maaf, Belum ada percakapan di Chat Room!!</center></div>";
        }else{
	        foreach ($ambilpesan->result_array() as $row){
	        	$ambilpesanan = $this->model_users->tampiltemanchat($row['temanku']);
	        	foreach ($ambilpesanan->result_array() as $r){
					if ($r['foto'] == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $r['foto']; }
		        	echo "<tr>
							<td width='60px;'><a href='".base_url()."users/profile/$r[username]'>
								<img style='border:1px solid #cecece' width='45px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'></a>
							</td>
							<td valign=top>
								<a href='".base_url()."users/profile/$r[username]'><b>".$r['nama_lengkap']."</b></a> 
								<small style='color:red'>(".$r['level'].")</small> <small style='color:green' class='pull-right'><i>".cek_terakhir($r['waktu'])."</i></small><br>
								$r[pesan]
							</td>
						  </tr>";
				}
	        }
	    }
        echo "</table>";