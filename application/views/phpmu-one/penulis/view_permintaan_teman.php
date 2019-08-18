	<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?>
		<table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
			<?php 
				$no = 1;
				foreach ($permintaanteman->result() as $r) {
					$tglex = cek_terakhir($r->waktu_teman);
					if ($r->foto == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $r->foto; }
					echo "<tr>
							<td width='80px;'><a href='".base_url()."users/profile/$r->username'>
								<img style='border:1px solid #cecece' width='60px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'></a>
							</td>
							<td valign=top>
								<a href='".base_url()."users/profile/$r->username'><b>".$r->nama_lengkap."</b></a> <small style='color:red'>(".$r->level.")</small><br>
								Alamat : $r->alamat_lengkap <br>
								Pekerjaan : $r->pekerjaan
							</td>
							<td valign=center width='50px'>
								<a class='pull-right btn btn-success btn-sm' href='".base_url()."users/confirm/$r->username'>Confirm</a><br>
							</td></tr>";
					$no++;
				}
			?>
		</tbody></table>
		<?php echo $this->pagination->create_links(); ?>