<?php 
    echo $this->recaptcha->getScriptTag(); // javascript recaptcha 
          echo "<p class='sidebar-title'><span class='glyphicon glyphicon-file'></span> $title</p>
                  <div style='clear:both'></div>
                  <p>Siahkan mengisi atau melengkapi form dibawah ini, Diharapkan diisi dengan data yang sebenarnya karena data yang didaftarkan ini  
                     akan digunakan nantinya untuk pengiriman bonus anda. Terima kasih...</p>
            <div style='clear:both'><br></div>
            <div class='col-md-12'>";
            if (isset($_POST['submit'])){
                echo "<div class='alert alert-danger'><center>Anda Belum Melakukan Validasi reCAPTCHA !!!</center></div>";
            }
                $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                echo form_open_multipart('auth/users',$attributes); 
                    echo "<input type='hidden' value='user' name='v'>
                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Username</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-5'>
                            <input type='text' class='required form-control' name='a' minlength='5' onkeyup=\"nospaces(this)\" required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Password</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-5'>
                            <input type='password' class='required form-control' name='b' minlength='5' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Nama Anda</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-10'>
                            <input type='text' class='required form-control' name='c' minlength='10' placeholder='Input Nama Lengkap,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Tanggal lahir</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-5'>
                            <input type='text' class='datepicker required form-control' style='padding-left:13px' data-date-format='dd-mm-yyyy' name='d' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Kota</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-10'>
                            <input type='text' class='required form-control' name='e' placeholder='Input Nama Kota anda Tinggal,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Provinsi</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input type='text' class='required form-control' name='f' placeholder='Input Nama Provinsi anda Tinggal,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Negara</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <label class='radio-inline'>
                              <input type='radio' name='g' id='inlineRadio1' value='wni' checked> WNI
                            </label>
                            <label class='radio-inline'>
                              <input type='radio' name='g' id='inlineRadio2' value='wna'> WNA
                            </label>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Facebook</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input type='text' class='required form-control' name='h' placeholder='Input username/url Facebook anda,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Twitter</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input type='text' class='required form-control' name='i' placeholder='Input username/url twitter anda,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Google+</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input type='text' class='required form-control' name='j' placeholder='Input username/url Google+ anda,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Pekerjaan</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input type='text' class='required form-control' name='k' placeholder='Tulis Informasi Pekerjaan anda,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputPassword3' class='col-sm-2 control-label'>Alamat</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-lg-12'>
                            <textarea class='required form-control' name='l' style='height:60px' minlength='10' placeholder='Tulis Alamat Lengkap Saat ini,..' required></textarea>
                        </div></div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Email</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-10'>
                            <input type='email' class='required email form-control' name='m' placeholder='Alamat Email yang valid,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>No Telpon</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-5'>
                            <input type='number' class='required number form-control' name='n' placeholder='Input No telpon aktif,..' required>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Status</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-5'>
                            <select class='required form-control' name='o' required>
                                <option value='' selected>- Pilih -</option>";
                            $status = array('Lajang','Berpacaran','Bertunangan','Menikah','Duda','Janda');
                            for ($i = 0; $i <= 5; $i++){
                                echo "<option>".$status[$i]."</option>";
                            }
                            echo "</select>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Pendidikan</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input type='text' class='required form-control' name='p' placeholder='Tulis Informasi Pendidikan Terakhir,..' required>
                        </div>
                        </div>
                    </div>

                            <input type='hidden' class='form-control' name='q'>
                            <input type='hidden' class='form-control' name='r'>
                            <input type='hidden' class='form-control' name='s'>

                    <div class='form-group'>
                        <label for='inputPassword3' class='col-sm-2 control-label'>Tentang</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-lg-12'>
                            <textarea class='required form-control' name='t' style='height:100px' minlength='50' placeholder='Sekilas Informasi Tentang anda,..' required></textarea>
                        </div></div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Foto</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input type='file' class='form-control' name='u'>
                        </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='inputEmail3' style='margin-top:-5px' class='col-sm-2 control-label'>$image</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <input name='secutity_code' maxlength=6 type='text' class='form-control' placeholder='Masukkkan kode di sebelah kiri..''>
                        </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class='form-group'>
                        <div class='col-sm-offset-2'>
                            <button type='submit' name='submit' class='btn btn-primary btn-sm'>Daftarkan</button>
                        </div>
                    </div>
                </form>
           </div>
            <div style='clear:both'><br></div>";
