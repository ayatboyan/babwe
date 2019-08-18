<?php 
echo "
            <div class='col-md-6'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Publish Berita Terpilih</h3>
                </div>
              <div class='box-body'>";
              $nilai = $this->model_berita->nilai_berita($this->uri->segment(3))->row();
              $cektotal = $this->model_berita->nilai_berita($this->uri->segment(3))->num_rows();
              if ($cektotal >= 1){
                  $harga = $nilai->jumlah;
              }else{
                  $harga = 0;
              }

              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/publish_listberita',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='100px' scope='row'>Judul</th>    <td>$rows[judul]</td></tr>
                    <tr><th style='text-transform:capitalize; color:red' scope='row'>$rows[level]</th>    <td>$rows[nama_lengkap] - <a target='_BLANK' class='btn btn-success btn-xs' href='".base_url()."administrator/detail_manajemenuser/$rows[username]'>Lihat Detail $rows[level]</a></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td>$rows[nama_kategori]</td></tr>
                    <tr><th scope='row'>Status</th>                 <td>"; if ($rows['status']=='Y'){ echo "<input type='radio' name='a' value='Y' checked> Published &nbsp; <input type='radio' name='a' value='N'> Unpublished"; }else{ echo "<input type='radio' name='a' value='Y'> Published &nbsp; <input type='radio' name='a' value='N' checked> Unpublished"; } echo "</td></tr>
                    <tr><th scope='row'>Nilai (Rp)</th>             <td><input type='number' class='form-control' name='b' placeholder='Harga atau Nilai artikel..' value='".$harga."'></td></tr>
                    
                  </tbody>
                  </table>
                </div>
            
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit1' class='btn btn-info'>Proses Artikel</button>
                  </div>
            </form>
            </div></div>";

        echo "<div class='col-md-6'>
              <div class='box box-warning'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Revisi Berita Terpilih</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/publish_listberita',$attributes); 
          echo "<div class='col-md-12'>
                  <input type='hidden' name='id' value='$rows[id_berita]'>
                  <table class='table table-condensed table-striped'>
                      <thead>
                        <tr bgcolor='#cecece'>
                          <th style='width:40px'>No</th>
                          <th>Catatan Revisi</th>
                        </tr>
                      </thead>
                      <tbody>";
                      $no = 1;
                      $revisi = $this->model_users->revisi_tulisan($rows['username'], $this->uri->segment(3));
                      foreach ($revisi->result_array() as $row){
                        $ex = explode(' ',$row['waktu_catatan']);
                        $tgl_bayar = tgl_indo($ex[0]);
                        echo "<tr><td>$no</td>
                                <td><small style='color:red'>Revisi Pada : $tgl_bayar ".$ex[1]." WIB - <a style='color:blue' href='".base_url()."administrator/delete_beritacatatan/$row[id_berita_catatan]/".$this->uri->segment(3)."'>Delete</a></small><br> 
                                $row[catatan]</td>
                              </tr>";
                        $no++;
                      }
                      echo "<tr><td></td>
                                <td><textarea class='form-control' name='a' style='width:100%;' placeholder='Tuliskan Revisi Disini...' onkeyup=\"auto_grow(this)\" required></textarea></td></tr>
                      </tbody>
                  </table>
                </div>
                
              </div>
              <div class='box-footer'>
                <button type='submit' name='submit2' class='btn btn-info'>Kirimkan Revisi</button>
              </div>
            </form>
            </div></div>
";
