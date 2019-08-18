	<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?>
		<table style='background:#fff; border-radius:6px;' class="table tblphpmu table-hover">
			<thead>
			<tr>
				<th class="hidden-xs">No</th>
				<th>Pengirim Pesan</th>
				<th>Ringkasan Pesan</th>
				<th class="hidden-xs">Waktu / Tanggal</th>
				<th colspan='2'>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				$no = $this->uri->segment(3) + 1;
				foreach ($record->result() as $r) {
					if ($r->baca == '1'){ $baca = 'red'; }else{ $baca = '#000'; }
					$message = substr($r->message,0,63);
					$ex = explode(' ',$r->date_time);
					$tglex = $this->mylibrary->tgl_indo($ex[0]);
					$jamex = $ex[1];
					echo "<tr>
							<td class='hidden-xs'>$no</td>
							<td style='text-transform:capitalize'>".$r->nama_lengkap."</td>
							<td style='color:$baca'>".$message."...</td>
							<td  class='hidden-xs'>".$tglex." ".$jamex."</td>
							<td align=center>".anchor('users/read/'.$r->username.'/0','<button class="btn btn-primary btn-sm"><i class="fa fa-comments fa-fw"></i>  Read</button>')."</td>
							</tr></tbody>";
					$no++;
				}
			?>
		</table>
		<?php 
				echo $this->pagination->create_links(); 
		?>