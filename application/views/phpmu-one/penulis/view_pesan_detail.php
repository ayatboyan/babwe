	<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?>

		<table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
			<?php 
			$attributes = array('id' => 'formku');
			echo form_open_multipart('users/kirimpesan',$attributes); 
			?>
				<thead>
				<tr>
					<input name='user1' type='hidden' value='<?php echo $this->session->username; ?>'/>
					<input name='user2' type='hidden' value='<?php echo $this->uri->segment(3); ?>'/>
					<td colspan='2' valign=top><textarea name='message' class='required form-control textarea' onkeyup="auto_grow(this)" placeholder='Tuliskan Pesan Disini...'></textarea>
					<input type='file' name='userfile'>
					<input style='margin-top:-15px' type='submit' class='btn btn-primary btn-sm pull-right' name='komentar' value='Kirimkan Pesan'></td>
				</tr>
				</thead>
				<tbody>
			<?php 
			echo form_close(); 

				$no = 1;
				foreach ($pesan->result() as $r) {
					$pesan = auto_link(nl2br(stripslashes(htmlentities($r->message))));
					$tglex = cek_terakhir($r->date_time);
					if ($r->foto == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $r->foto; }
					echo "<tr>
							<td width='80px;'><a href='".base_url()."users/profile/$r->username'><img style='border:1px solid #cecece' width='50px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'></a></td>
							<td valign=top><a href='".base_url()."users/profile/$r->username'><b>".$r->nama_lengkap."</b></a> <small style='color:red'> <i>Mengatakan :</i></small>
							<a class='pull-right' href='".base_url()."users/profile/$r->username'><small style='color:#428bca'>".$tglex."</small></a>";
							echo "<br>$pesan";
								if ($r->file_upload != ''){ 
									if (file_exists("asset/files_messages/".$r->file_upload)) { 
										$files_pesan = $this->mylibrary->Size("asset/files_messages/".$r->file_upload);
										echo "<br><span><i class='fa fa-link fa-fw'></i> File Kiriman : </span> <a href='".site_url('users/download/'.$r->file_upload)."'>$r->file_upload ($files_pesan)</a><br>";
									}else{
										$files_pesan = "0";
										echo "<br><span><i class='fa fa-link fa-fw'></i> File Kiriman : </span> <a href='#'><i>Maaf File '$r->file_upload ($files_pesan)' Gagal Terkirim!</i></a><br>";
									}
								}
							echo "</td></tr>";
					$no++;
				}
			?>
		</tbody></table>
		<?php echo $this->pagination->create_links(); ?>