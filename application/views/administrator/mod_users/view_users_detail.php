<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data User</h3>
                </div>
              <div class='box-body'>
              <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#tab1' id='tab1-tab' role='tab' data-toggle='tab' aria-controls='tab1' aria-expanded='true'>Data Profile </a></li>
                      <li role='presentation'><a href='#tab7' id='tab7-tab' role='tab' data-toggle='tab' aria-controls='tab7' aria-expanded='false'>Artikel Unpublished </a></li>
                      <li role='presentation'><a href='#tab8' id='tab8-tab' role='tab' data-toggle='tab' aria-controls='tab8' aria-expanded='false'>Artikel Published </a></li>
                      <li role='presentation'><a href='#tab2' id='tab2-tab' role='tab' data-toggle='tab' aria-controls='tab2' aria-expanded='false'>Penghasilan </a></li>
                      <li role='presentation'><a href='#tab3' role='tab' id='tab3-tab' data-toggle='tab' aria-controls='tab3' aria-expanded='false'>Pembayaran</a></li>
                      <li role='presentation'><a href='#tab4' role='tab' id='tab4-tab' data-toggle='tab' aria-controls='tab4' aria-expanded='false'>Media / Foto</a></li>
                      <li role='presentation'><a href='#tab5' role='tab' id='tab5-tab' data-toggle='tab' aria-controls='tab5' aria-expanded='false'>Semua Teman</a></li>
                      <li role='presentation'><a href='#tab6' role='tab' id='tab6-tab' data-toggle='tab' aria-controls='tab6' aria-expanded='false'>Permintaan Teman</a></li>
                    </ul><br>
                    <div id='myTabContent' class='tab-content'>
                      <div role='tabpanel' class='tab-pane fade active in' id='tab1' aria-labelledby='tab1-tab'>
                            <?php 
                          $attributes = array('class'=>'form-horizontal','role'=>'form');
                          echo form_open_multipart('#',$attributes); 
                          if ($rows['foto']==''){ $foto = 'users.gif'; }else{ $foto = $rows['foto']; }
                        echo "<div class='col-md-12'>
                              <table class='table table-condensed table-bordered'>
                              <tbody>
                                <tr><td width='130px'><b>Username</b></td> <td><input class='required form-control' style='width:50%; display:inline-block' type='text' value='$rows[username]'></td></tr>
                                      <tr><td><b>Password</b></td>               <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a' placeholder='************'></td></tr>
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
                              </div></form>";
                              ?>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab2' aria-labelledby='tab2-tab'>
                            <table  id="example2" class='table table-condensed table-striped'>
                                <thead>
                                  <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Judul Berita</th>
                                    <th>Bonus</th>
                                    <th>View</th>
                                  </tr>
                                </thead>
                                <tbody>
                              <?php
                                $no = 1;
                                foreach ($publish->result_array() as $row){
                                $ex = explode(' ',$row['waktu_publish']);
                                $tgl_bayar = tgl_indo($ex[0]);
                                echo "<tr><td>$no</td>
                                          <td><a target='BLANK' href='".base_url()."berita/detail/$row[judul_seo]'>$row[judul]</a></td>
                                          <td>Rp ".rupiah($row['jumlah'])."</td>
                                          <td>$row[dibaca] Kali</td>
                                      </tr>";
                                  $no++;
                                }
                              ?>
                              </tbody>
                            </table>
                            <table class='table table-condensed table-striped'>
                                <tr class='info'>
                                    <td colspan='3'>Total Semua</td>
                                    <td width='318px'><b>Rp <?php echo rupiah($totpublish['total']); ?></b></td>
                                  </tr>
                                  <tr class='success'>
                                    <td colspan='3'>Sudah Bayar</td>
                                    <td><b>Rp <?php echo rupiah($totbayar['bayar_publish']); ?></b></td>
                                  </tr>
                                  <tr class='danger'>
                                    <td colspan='3'>Sisa Bayar</td>
                                    <td><b>Rp <?php echo rupiah($totpublish['total']-$totbayar['bayar_publish']); ?></b></td>
                                  </tr>
                              </tbody>
                            </table>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab3' aria-labelledby='tab3-tab'>
                          <?php
                            $attributes = array('class'=>'form-horizontal','role'=>'form');
                            echo form_open_multipart('administrator/detail_manajemenuser',$attributes); 
                            ?>
                              <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='id'>
                              <input type="text" name='bayar' class='form-control' style='display:inline-block; width:90%;' placeholder='Tuliskan Jumlah atau Nominal yang sudah dibayarkan disini,..'>
                              <input type="submit" name='submit' class='btn btn-primary' value='Bayarkan'>
                            </form>
                            <table id="example10" class='table table-condensed table-striped'>
                                <thead>
                                  <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Bonus Publish Artikel</th>
                                    <th width='180px'>Waktu Bayar</th>
                                  </tr>
                                </thead>
                                <tbody>
                              <?php
                                $no = 1;
                                foreach ($bayar->result_array() as $row){
                                $ex = explode(' ',$row['waktu_bayar']);
                                $tgl_bayar = tgl_indo($ex[0]);
                                echo "<tr><td>$no</td>
                                          <td>Rp ".rupiah($row['bonus_publish'])."</td>
                                          <td>$tgl_bayar ".$ex[1]."</td>
                                      </tr>";
                                  $no++;
                                }
                              ?>
                              </tbody>
                            </table>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab4' aria-labelledby='tab4-tab'>
                          <?php
                              $no = 1;
                              foreach ($koleksifoto->result_array() as $row){
                                  $pecah = explode(' ',$row['waktu_upload']);
                                  $tanggal = tgl_indo($pecah[0]);
                                  echo "<p class='hidden' id='ambil$no'>".base_url()."asset/media/".$row['file_media']."</p>
                                        <div class='col-md-3'><br>
                                        <div class='hidden-xs' style='overflow:hidden; max-height:95px'>
                                          <a target='_BLANK' href='".base_url()."asset/media/".$row['file_media']."'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/media/".$row['file_media']."'></a>
                                        </div>

                                        <div class='visible-xs'>
                                          <a target='_BLANK' href='".base_url()."asset/media/".$row['file_media']."'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/media/".$row['file_media']."'></a>
                                        </div>

                                          <a style='width:49%' class='btn btn-danger btn-xs pull-right' href='".base_url()."administrator/delete_koleksifoto/$row[id_users_media]/".$this->uri->segment(3)."' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span> Delete</a>
                                          <button id='myButton' data-toggle='button' aria-pressed='false' autocomplete='off' style='width:49%; margin-right:2px' class='btn btn-success btn-xs pull-right' onclick=\"copyToClipboard('#ambil$no')\"><span class='glyphicon glyphicon-paperclip'></span> Copy url</button>
                                        </div>";
                                      if ($no % 4 == 0){
                                          echo "<div style='clear:both'><hr></div>";
                                      }
                                  $no++;
                              }
                          ?>  
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab5' aria-labelledby='tab5-tab'>
                          <table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
                          <?php 
                            $no = 1;
                            foreach ($semuateman->result() as $row) {
                              if ($row->user1 == $this->uri->segment(3)){ $teman = $row->user2;
                              }else{ $teman = $row->user1; }
                              $r = $this->model_users->tampilteman($teman)->row(); 
                              if ($r->foto == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $r->foto; }
                              echo "<tr>
                                  <td width='80px;'><a href='".base_url()."users/profile/$r->username'>
                                    <img style='border:1px solid #cecece' width='60px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'></a>
                                  </td>
                                  <td valign=top>
                                    <a href='".base_url()."users/profile/$r->username'><b>".$r->nama_lengkap."</b></a> <small style='color:red'>(".$r->level.")</small><br>
                                    Alamat : $r->alamat_lengkap <br>
                                    Pekerjaan : $r->pekerjaan
                                  </td></tr>";
                              $no++;
                            }
                          ?>
                        </tbody></table>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab6' aria-labelledby='tab6-tab'>
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
                                  </td></tr>";
                              $no++;
                            }
                          ?>
                        </tbody></table>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab7' aria-labelledby='tab7-tab'>
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style='width:20px'>No</th>
                                <th>Judul Berita</th>
                                <th>Kategori</th>
                                <th>View</th>
                                <th>Tgl Posting</th>
                                <th>Status</th>
                                <th style='width:70px'>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                          <?php 
                            $no = 1;
                            foreach ($unpublished->result_array() as $row){
                            $tgl_posting = tgl_indo($row['tanggal']);
                            if ($row['status']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }
                            echo "<tr><td>$no</td>
                                      <td><a target='BLANK' href='".base_url()."berita/detail/$row[judul_seo]'>$row[judul]</a></td>
                                      <td>$row[nama_kategori]</td>
                                      <td>$row[dibaca]</td>
                                      <td>$tgl_posting</td>
                                      <td>$status</td>
                                      <td><center>
                                        <a class='btn btn-primary btn-xs' title='Publish Data' href='".base_url()."administrator/publish_listberita/$row[id_berita]'><span class='glyphicon glyphicon-ok'></span></a>
                                        <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_listberita/$row[id_berita]'><span class='glyphicon glyphicon-edit'></span></a>
                                        <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_listberita/$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                                      </center></td>
                                  </tr>";
                              $no++;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab8' aria-labelledby='tab8-tab'>
                          <table id="example9" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style='width:20px'>No</th>
                                <th>Judul Berita</th>
                                <th>Kategori</th>
                                <th>View</th>
                                <th>Tgl Posting</th>
                                <th>Status</th>
                                <th style='width:70px'>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                          <?php 
                            $no = 1;
                            foreach ($published->result_array() as $row){
                            $tgl_posting = tgl_indo($row['tanggal']);
                            if ($row['status']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }
                            echo "<tr><td>$no</td>
                                      <td><a target='BLANK' href='".base_url()."berita/detail/$row[judul_seo]'>$row[judul]</a></td>
                                      <td>$row[nama_kategori]</td>
                                      <td>$row[dibaca]</td>
                                      <td>$tgl_posting</td>
                                      <td>$status</td>
                                      <td><center>
                                        <a class='btn btn-primary btn-xs' title='Publish Data' href='".base_url()."administrator/publish_listberita/$row[id_berita]'><span class='glyphicon glyphicon-ok'></span></a>
                                        <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_listberita/$row[id_berita]'><span class='glyphicon glyphicon-edit'></span></a>
                                        <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_listberita/$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                                      </center></td>
                                  </tr>";
                              $no++;
                            }
                          ?>
                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>


              
    </div>
</div>