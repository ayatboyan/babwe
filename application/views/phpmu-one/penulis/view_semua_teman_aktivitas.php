	<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?>
		<div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#tab1' id='tab1-tab' role='tab' data-toggle='tab' aria-controls='tab1' aria-expanded='true'>Artikel Terbaru </a></li>
                      <li role='presentation'><a href='#tab2' id='tab2-tab' role='tab' data-toggle='tab' aria-controls='tab2' aria-expanded='false'>Foto Terbaru </a></li>
                      <li role='presentation'><a href='#tab3' id='tab3-tab' role='tab' data-toggle='tab' aria-controls='tab3' aria-expanded='false'>Komentar Terbaru </a></li>
                    </ul><br>
                    <div id='myTabContent' class='tab-content'>
                      <div role='tabpanel' class='tab-pane fade active in' id='tab1' aria-labelledby='tab1-tab'>
     						<table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
								<?php 
									$no = 1;
									foreach ($aktivitasteman->result_array() as $row) {
										$isi_berita = strip_tags($row['isi_berita']); 
						                $isi = substr($isi_berita,0,100); 
						                $isi = substr($isi_berita,0,strrpos($isi," "));
						                $tanggal = tgl_indo($row['tanggal']);
						                if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
						                    echo "<div class='col-md-4'><br>";
						                            if ($row['premium']=='Y'){
						                                echo "<small><i><span style='margin-top:-10px' class='btn btn-success btn-xs'>Recomended</span></i></small>";
						                            }
						                            echo "<small class='date pull-right'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal</small>
						                            <img class='img-thumbnail' width='100%' style='min-height:125px' src='".base_url()."asset/foto_berita/".$foto."'>
						                            <small style='color:green' class='date'> Oleh : $row[nama_lengkap] <span class='pull-right'>$row[dibaca] Kali</span></small>
						                            <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a>

						                        </div>";
						                        if ($no % 3 == 0){
						                            echo "<div style='clear:both'><hr></div>";
						                        }
										$no++;
									}
								?>
							</tbody></table>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab2' aria-labelledby='tab2-tab'>
                            <table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
								<?php 
									$no = 1;
									foreach ($mediateman->result_array() as $row) {
										$pecah = explode(' ',$row['waktu_upload']);
					                    $tanggal = tgl_indo($pecah[0]);
					                    echo "<p class='hidden' id='ambil$no'>".base_url()."asset/media/".$row['file_media']."</p>
					                          <div class='col-md-3'><br>
					                          <div class='hidden-xs' style='overflow:hidden; max-height:95px'>
					                          	<small style='color:green' class='date'> Oleh : $row[nama_lengkap]</small>
					                            <a target='_BLANK' href='".base_url()."asset/media/".$row['file_media']."'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/media/".$row['file_media']."'></a>
					                          </div>

					                          <div class='visible-xs'>
					                          	<small style='color:green' class='date'> Oleh : $row[nama_lengkap]</small>
					                            <a target='_BLANK' href='".base_url()."asset/media/".$row['file_media']."'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/media/".$row['file_media']."'></a>
					                          </div>
					                            <button id='myButton' style='margin-top:2px' data-toggle='button' aria-pressed='false' autocomplete='off' class='btn btn-block btn-success btn-xs pull-right' onclick=\"copyToClipboard('#ambil$no')\"><span class='glyphicon glyphicon-paperclip'></span> Copy url</button>
					                          </div>";
					                        if ($no % 4 == 0){
					                            echo "<div style='clear:both'><hr></div>";
					                        }
					                    $no++;
									}
								?>
							</tbody></table>
                      </div>

                      <div role='tabpanel' class='tab-pane fade' id='tab3' aria-labelledby='tab3-tab'>
                      	<table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
                           <?php 
								$no = 1;
								foreach ($komentarteman->result() as $r) {
									if ($r->foto == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $r->foto; }
									echo "<tr>
											<td width='80px;'><a href='".base_url()."users/profile/$r->username'>
												<img style='border:1px solid #cecece' width='60px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'></a>
											</td>
											<td valign=top>
												<a href='".base_url()."users/profile/$r->username'><b>".$r->nama_lengkap."</b></a> <small style='color:green'><i>Mengomentari Artikel :</i></small><br>
												<a href='".base_url()."berita/detail/$r->judul_seo#komentar'>$r->judul</a> <br>
												Waktu Komentar - ".cek_terakhir($r->tgl_komentar." ".$r->jam_komentar)."
											</td></tr>";
									$no++;
								}
							?> 
						</tbody></table>
                      </div>
                    </div>
        </div>