            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manajemen <?php echo $this->uri->segment(3); ?></h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_manajemenuser'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Tulisan</th>
                        <th>Penghasilan</th>
                        <th>Dibayarkan</th>
                        <th>Block</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $tulisan = $this->model_users->hitungtulisanusers($row['username'])->num_rows();
                    $penghasilan = $this->model_users->penghasilan_publish_total($row['username'])->row_array();
                    $bayar = $this->model_users->penghasilan_bayar($row['username'])->row_array();
                    if ($row['foto'] == ''){ $foto ='users.gif'; }else{ $foto = $row['foto']; }
                    echo "<tr><td>$no</td>
                              <td><img style='border:1px solid #cecece' width='40px' class='img-circle' src='".base_url()."asset/foto_user/$foto'></td>
                              <td>$row[nama_lengkap]</td>
                              <td>$row[email]</td>
                              <td>$tulisan Artikel</td>
                              <td>Rp ".rupiah($penghasilan['total'])."</td>
                              <td>Rp ".rupiah($bayar['bayar_publish'])."</td>
                              <td>$row[blokir]</td>
                              <td><center>
                                <a class='btn btn-primary btn-xs' title='Detail Data' href='".base_url()."administrator/detail_manajemenuser/$row[username]'><span class='glyphicon glyphicon-search'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_manajemenuser/$row[username]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_manajemenuser/$row[username]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>