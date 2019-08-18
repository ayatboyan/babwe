<?php
          echo "<p class='sidebar-title'><span class='glyphicon glyphicon-file'></span> $title</p>
                  <div style='clear:both'></div>
                  <p>Siahkan masukkan username dan password pada form dibawah ini. Terima kasih...</p>
            <div style='clear:both'><br></div>
            <div class='col-md-12 login'>";
                $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                echo form_open_multipart('auth/login',$attributes); 
                  echo "<div class='logincontainer'>
                            <div class='form-group'>
                                <label for='inputEmail'>Username</label>
                                <input type='text' name='a' class='required form-control' placeholder='Username' autofocus>
                            </div>

                            <div class='form-group'>
                                <label for='inputPassword'>Password</label>
                                <input type='password' name='b' class='required form-control' placeholder='Password'>
                            </div>

                            <div align='center'>
                                <input type='submit' name='submit' class='btn btn-primary' value='Login'> 
                                <a href='".base_url()."auth/lupapassword' class='btn btn-default'>Lupa Password Anda?</a><br><br>
                                Anda Belum punya akun? <a href='".base_url()."auth/users'>Buat akun disni!</a>
                            </div>
                        </div>";
                echo form_close();
           echo "</div>
            <div style='clear:both'><br></div>";
