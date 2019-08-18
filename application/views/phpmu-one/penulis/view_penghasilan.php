<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?> </p>
                  <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#tab1' id='tab1-tab' role='tab' data-toggle='tab' aria-controls='tab1' aria-expanded='true'>Bonus Publish </a></li>
                      <li role='presentation' class=''><a href='#tab3' role='tab' id='tab3-tab' data-toggle='tab' aria-controls='tab3' aria-expanded='false'>History Pembayaran</a></li>
                    </ul><br>

                    <div id='myTabContent' class='tab-content'>

                      <div role='tabpanel' class='tab-pane fade active in' id='tab1' aria-labelledby='tab2-tab'>
                            <table id='example2' class='table table-condensed table-striped'>
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
                                          <td><a href='".base_url()."berita/detail/$row[judul_seo]'>$row[judul]</a></td>
                                          <td>Rp ".rupiah($row['jumlah'])."</td>
                                          <td>$row[dibaca] Kali</td>
                                      </tr>";
                                  $no++;
                                }
                              ?>
                          </tbody>
                          </table>
                          <table id='example2' class='table table-condensed table-striped'>
                              <tbody>
                                  <tr class='info'>
                                    <td colspan='3'>Total Semua</td>
                                    <td width='205px'><b>Rp <?php echo rupiah($totpublish['total']); ?></b></td>
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
                            <table id='example3' class='table table-condensed table-striped'>
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

                    </div>
                  </div>

