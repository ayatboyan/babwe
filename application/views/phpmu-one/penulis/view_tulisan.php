<?php
            echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; $title 
                  <a style='margin-left:5px' class='btn btn-success btn-xs pull-right' href='".base_url()."users/statistik_tulisan'><span class='glyphicon glyphicon-stats'></span> Statistik Tulisan</a>
                  <a class='btn btn-primary btn-xs pull-right' href='".base_url()."users/tambah_tulisan'><span class='glyphicon glyphicon-plus'></span> Tambahkan Tulisan</a></p> <hr>";
                $no = 1;
                foreach ($tulisan->result_array() as $row){
                    $rev = $this->db->query("SELECT * FROM berita_catatan where id_berita='$row[id_berita]'")->num_rows();
                    if ($row['status']=='Y'){ $status = '<span style="margin-top:-10px" class="btn btn-success btn-xs">Published</span>'; }else{ $status = '<span style="margin-top:-10px" class="btn btn-warning btn-xs">Unpublished</span>'; }
                    $isi_berita = strip_tags($row['isi_berita']); 
                    $isi = substr($isi_berita,0,100); 
                    $isi = substr($isi_berita,0,strrpos($isi," "));
                    $tanggal = tgl_indo($row['tanggal']);
                    if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                    echo "<div class='col-md-4'><br>
                            <small><i>$status</i></small> 
                            <a style='margin-top:-5px' class='btn btn-danger btn-xs pull-right' href='".base_url()."users/delete_tulisan/$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                            <a style='margin-top:-5px; margin-right:3px' class='btn btn-primary btn-xs pull-right' href='".base_url()."users/edit_tulisan/$row[id_berita]' ><span class='glyphicon glyphicon-edit'></span></a>
                            <a style='margin-top:-5px; margin-right:3px' class='btn btn-info btn-xs pull-right' href='".base_url()."users/revisi/$row[id_berita]'> <b>".rupiah($rev)."</b> <span class='glyphicon glyphicon-envelope'></span></a>
                            
                            <img class='img-thumbnail' width='100%' style='min-height:125px' src='".base_url()."asset/foto_berita/".$foto."'>
                            <small style='color:green' class='date'> Oleh : $row[nama_lengkap] <span class='pull-right'>$row[dibaca] Kali</span></small>
                            <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']." </a>

                        </div>";
                        if ($no % 3 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                    $no++;
                }
            ?>
            <div style="clear:both"></div>
            <?php echo $this->pagination->create_links(); ?>