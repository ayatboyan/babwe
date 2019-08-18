<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?> </p>
      <table class=' table-condensed'>
        <tr><td width='140px'><b>Judul Tulisan</b></td>    <td>: <?php echo $record['judul']; ?></td></tr>
        <tr><td><b>Kategori Tulisan</b></td> <td>: <?php echo $record['nama_kategori']; ?></td></tr>
        <tr><td><b>Waktu Penulisan</b></td>  <td>: <?php echo "$record[hari], ".tgl_indo($record['tanggal']).", $record[jam] WIB"; ?></td></tr>
      </table><br>


                            <table class='table table-condensed table-striped'>
                                <thead>
                                  <tr bgcolor='#cecece'>
                                    <th style='width:40px'>No</th>
                                    <th>Catatan Revisi</th>
                                  </tr>
                                </thead>
                                <tbody>
                              <?php
                                $no = 1;
                                foreach ($revisi->result_array() as $row){
                                $ex = explode(' ',$row['waktu_catatan']);
                                $tgl_bayar = tgl_indo($ex[0]);
                                echo "<tr><td>$no</td>
                                          <td><small style='color:red'>Revisi Pada : $tgl_bayar ".$ex[1]." WIB </small><br> $row[catatan]</td>
                                      </tr>";
                                  $no++;
                                }
                              ?>
                              </tbody>
                            </table>
                     