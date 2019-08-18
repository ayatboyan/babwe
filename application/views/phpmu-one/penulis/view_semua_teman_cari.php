	<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?>
		<?php 
            $attributes = array('id' => 'formku','role'=>'form');
            echo form_open('users/cariteman',$attributes); 
          ?>
			<div style='width:100%' class="input-group">
	            <input type="text" name='cari' class="form-control" placeholder="Cari teman lainnya disini...">
	            <span class="input-group-btn">
	                <button type='submit' class="btn btn-primary" name='submit' type="button">Cari Teman</button>
	            </span>
	        </div><br>
        <?php echo form_close(); ?>
		<table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
			<?php 
				$no = 1;
				foreach ($cariteman->result_array() as $r) {
					if ($r['foto'] == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $r['foto']; }
					echo "<tr>
							<td width='80px;'><a href='".base_url()."users/profile/$r[username]'>
								<img style='border:1px solid #cecece' width='60px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'></a>
							</td>
							<td valign=top>
								<a href='".base_url()."users/profile/$r[username]'><b>".$r['nama_lengkap']."</b></a> <small style='color:red'>($r[level])</small><br>
								Alamat : $r[alamat_lengkap] <br>
								Pekerjaan : $r[pekerjaan]
							</td>
							<td valign=center width='50px'>";
								$username = $r['username'];
								$cek = $this->model_users->cekteman($username)->num_rows();
			                    if ($cek >= 1){
			                        echo "<a style='width:140px; text-align:left' class='btn btn-info btn-sm pull-right' href='".base_url()."users/read/$username/0'><span class='glyphicon glyphicon-envelope'></span> Kirimkan Pesan</a>"; 
			                    }else{
			                        $cekterkirim = $this->model_users->cektemanterkirim($username)->num_rows();
			                        if ($cekterkirim >= 1){
			                            echo "<a style='width:140px; text-align:left' class='pull-right btn btn-info btn-sm' href='#'><span class='glyphicon glyphicon-send'></span> Permintaan terkirim</a>";  
			                        }else{
			                            echo "<a style='width:140px; text-align:left' class='pull-right btn btn-success btn-sm' href='".base_url()."users/addcari/$username/".$this->uri->segment(3)."'><span class='glyphicon glyphicon-plus'></span> Tambahkan Teman</a>";  
			                        }
			                    }
							echo "</td></tr>";
					$no++;
				}
			?>
		</tbody></table>
		<?php echo $this->pagination->create_links(); ?>