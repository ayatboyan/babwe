<?php
            echo "<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; $title </p> <hr>";
                  $attributes = array('class'=>'pull-right','role'=>'form');
                echo form_open_multipart('users/koleksifoto',$attributes); 
                        echo "<input type='file' name='a' style='display:inline-block; border:1px solid #e3e3e3; padding:3px' required> 
                              <input type='submit' name='submit' class='btn btn-primary btn-sm' value='Upload Foto' style='margin-top:-2px'>
                     </form>
                  <div style='clear:both'></div>";
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

                            <a style='width:49%' class='btn btn-danger btn-xs pull-right' href='".base_url()."users/delete_koleksifoto/$row[id_users_media]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span> Delete</a>
                            <button id='myButton' data-toggle='button' aria-pressed='false' autocomplete='off' style='width:49%; margin-right:2px' class='btn btn-success btn-xs pull-right' onclick=\"copyToClipboard('#ambil$no')\"><span class='glyphicon glyphicon-paperclip'></span> Copy url</button>
                          </div>";
                        if ($no % 4 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                    $no++;
                }
            ?>
            <div style="clear:both"></div>
            <?php echo $this->pagination->create_links(); ?>