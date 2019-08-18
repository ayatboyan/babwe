<?php
          echo "<p class='sidebar-title'><span class='glyphicon glyphicon-file'></span> $title</p>
                  <div style='clear:both'></div>
                  <p>Siahkan masukkan Alamat email anda yang digunakan pada saat pendaftaran atau yang terkait dengan akun anda pada form dibawah ini. Terima kasih...</p>
            <div style='clear:both'><br></div>
            <div class='col-md-12 login'>";
              if ($email != ''){
                 echo "<div class='alert alert-danger'><center>Maaf, Email <b>$email</b> tidak ditemukan di database kami,..!!!</center></div>";
              }
                $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                echo form_open_multipart('auth/lupapassword',$attributes); 
                  echo "<div class='logincontainer'>
                            <div class='form-group'>
                                <label for='inputEmail'>Alamat Email</label>
                                <input type='email' name='a' class='email required form-control' autofocus>
                            </div>
                            <div align='center'>
                                <input type='submit' name='submit' class='btn btn-primary' value='Kirimkan Permintaan'> 
                            </div>
                        </div>";
                echo form_close();
           echo "</div>
            <div style='clear:both'><br></div>";
