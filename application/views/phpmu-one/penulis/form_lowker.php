<?php
	$id = $this->input->post('action');
	$data = $this->db->query("SELECT * FROM kategori WHERE id_kategori='$id' AND lowker='Y'")->num_rows();
	if($data > 0){
		echo "<table class='table table-condensed '>
                <tbody>
                	<input type='hidden' name='lowker' value='lowker'>
                  	<tr><th width='100px' scope='row'>Perusahaan</th> <td><input type='text' class='required form-control' name='aa' required></td></tr>
			  		<tr><th scope='row'>Posisi Kerja</th>           <td><input type='text' class='required form-control' name='bb' required></td></tr>
			  		<tr><th scope='row'>Kota</th> 					<td><input type='text' class='required form-control' name='cc' required></td></tr>
			  		<tr><th scope='row'>Propinsi</th>              	<td><input type='text' class='required form-control' name='dd' required></td></tr>
			  		<tr><th scope='row'>Alamat</th> 				<td><textarea class='required form-control' name='ee' onkeyup=\"auto_grow(this)\" placeholder='Alamat Perusahaan,...' required></textarea></td></tr>
			  		<tr><th scope='row'>Tanggal</th>				<td><input type='text' class='form-control' name='ff' placeholder='Tanggal Expire atau berakhir lowker...'></td></tr>
			  		<tr><th scope='row'>Syarat</th> 				<td><textarea class='required form-control' name='gg' onkeyup=\"auto_grow(this)\" placeholder='Syarat-syarat harus dipenuhi,...' required></textarea></td></tr>
			  		<tr><th scope='row'>Kontak</th> 				<td><textarea class='required form-control' name='hh' onkeyup=\"auto_grow(this)\" placeholder='Data Kontak Perusahaan,...' required></textarea></td></tr>
			  	</tbody>
			  </table>";		
	}

	$data2 = $this->db->query("SELECT * FROM kategori WHERE id_kategori='$id' AND jual_beli='Y'")->num_rows();
	if($data2 > 0){
		echo "<table class='table table-condensed '>
                <tbody>
                	<input type='hidden' name='jualbeli' value='jualbeli'>
                  	<tr><th width='100px' scope='row'>Produk</th> <td><input type='text' class='required form-control' name='aa' placeholder='Tuliskan nama produk anda,...' required></td></tr>
			  		<tr><th scope='row'>Harga</th>           <td><input type='text' class='number required form-control' name='bb' required></td></tr>
			  		<tr><th scope='row'>Berat</th> 					<td><input type='text' class='required form-control' name='cc' required></td></tr>
			  		<tr><th scope='row'>Foto</th>              	<td><input type='file' class='required form-control upload' name='userfile[]' required multiple><small>Multiple Upload, Allowed File Extensions : .jpg, .gif, .jpeg, .png</small></td></tr>
			  		<tr><th scope='row'>Jumlah</th> 				<td><input type='text' class='required form-control' name='ee' required></td></tr>
			  	</tbody>
			  </table>";		
	}
	?>