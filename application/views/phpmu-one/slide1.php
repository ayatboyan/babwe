    <div id="jssor_1" class='jssor_2'>
        <!-- Loading Screen -->
        <div data-u="loading" class='loading'>
            <div class='slide1'></div>
            <div class='slide2'></div>
        </div>
        <div data-u="slides" class='slides'>
            <?php
                $slide1 = $this->model_berita->view_join_two('berita','users','kategori','username','id_kategori',array(''),'id_berita','DESC',0,5);
                $no=1;
                foreach ($slide1->result_array() as $row) {
                    if ($row['gambar'] ==''){ $foto = 'no-image.jpg'; }else{ $foto = $row['gambar']; }
                    if (strlen($row['judul']) > 40){ $judul = substr($row['judul'],0,40).',..';  }else{ $judul = $row['judul']; }
                    echo "<div>
                            <img data-u='image' src='".base_url()."asset/foto_berita/$foto'/>
                            <div data-u='thumb'><a style='color:#fff' href='".base_url()."$row[judul_seo]'>$judul</a></div>
                        </div>"; 
                    $no++;
                }
            ?>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort09-600-45">
            <div class="slide3"></div>
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div data-u="thumbnailtemplate" class="t"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
    </div>
    