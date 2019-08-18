<?php
            echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; Informasi Kategori : $title</p><hr>";
                $noo = 1;
                foreach ($premium->result_array() as $row){
                    $isi_berita = strip_tags($row['isi_berita']); 
                    $isi = substr($isi_berita,0,100); 
                    $isi = substr($isi_berita,0,strrpos($isi," "));
                    $tanggal = tgl_indo($row['tanggal']);
                    if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                    echo "<div class='col-md-4'><br>
                            <small><i><span style='margin-top:-10px' class='btn btn-success btn-xs'>Recomended</span></i></small> 
                            <small class='date pull-right'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal</small>
                            <img class='img-thumbnail' width='100%' style='min-height:125px' src='".base_url()."asset/foto_berita/".$foto."'>
                            <small style='color:green' class='date'> Oleh : $row[nama_lengkap] <span class='pull-right'>$row[dibaca] Kali</span></small>
                            <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a>

                        </div>";
                        if ($noo % 3 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                    $noo++;
                }

                echo "<div style='clear:both'></div>";

                $no = 1;
                foreach ($kategori->result_array() as $row){
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
            <div style="clear:both"></div>
            <?php echo $this->pagination->create_links(); ?>
