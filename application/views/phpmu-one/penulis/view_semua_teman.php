	<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?>
		<?php 
            $attributes = array('id' => 'formku','role'=>'form');
            echo form_open('users/cariteman',$attributes); 
          ?>
			<div style='width:100%' class="input-group">
	            <input type="text" name='cari' class="form-control" placeholder="Cari teman lain disini...">
	            <span class="input-group-btn">
	                <button type='submit' class="btn btn-primary" name='submit' type="button">Cari Teman</button>
	            </span>
	        </div><br>
        <?php echo form_close(); ?>
		<table style='background:#fff; border-radius:6px;' class='table table-hover table-striped table-condensed'>
			<?php 
				$no = 1;
				foreach ($semuateman->result() as $row) {
					if ($row->user1 == $this->session->username){ $teman = $row->user2;
					}else{ $teman = $row->user1; }
					$r = $this->model_users->tampilteman($teman)->row(); 
					if ($r->foto == ''){ $foto_user = 'users.gif'; }else{ $foto_user = $r->foto; }
					echo "<tr>
							<td width='80px;'><a href='".base_url()."users/profile/$r->username'>
								<img style='border:1px solid #cecece' width='60px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'></a>
							</td>
							<td valign=top>
								<a href='".base_url()."users/profile/$r->username'><b>".$r->nama_lengkap."</b></a> <a class='btn btn-success btn-xs' style='margin-bottom:2px' href=\"javascript:register_popup('".$r->username."', '".$r->nama_lengkap."');\"><span class='glyphicon glyphicon-comment' aria-hidden='true'></span></a><br>
								Alamat : $r->alamat_lengkap <br>
								Pekerjaan : $r->pekerjaan
							</td>
							<td valign=center width='50px'>
								<a class='pull-right btn btn-info btn-sm' href='".base_url()."users/read/".$r->username."/0'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span></a>
								<a class='pull-right btn btn-danger btn-sm' style='margin-top:2px' href='".base_url()."users/block/$r->username' onclick=\"return confirm('Apa anda yakin untuk hapus Pertemanan ini?')\"><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a><br>
							</td></tr>";
					$no++;
				}
			?>
		</tbody></table>
		<?php echo $this->pagination->create_links(); ?>

       <style>
            .chat-sidebar{
                width: 200px;
                position: fixed;
                min-height: 150px;
                right: 0px;
                bottom: 0px;
                padding-top: 10px;
                padding-bottom: 10px;
                border: 1px solid rgba(29, 49, 91, .3);
            }
            
            .sidebar-name 
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }
            
            .sidebar-name span
            {
                padding-left: 5px;
            }
            
            .sidebar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }
            
            .sidebar-name:hover
            {
                background-color:#e1e2e5;
            }
            
            .sidebar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }
            
            .popup-box
            {
                display: none;
                position: fixed;
                bottom: 0px;
                right: 0;
                height: 285px;
                margin-bottom: 0px;
                background-color: rgb(237, 239, 244);
                width: 300px;
                border: 1px solid rgba(29, 49, 91, .3);
            }
            
            .popup-box .popup-head
            {
                background-color: #6d84b4;
                padding: 5px;
                color: white;
                font-weight: bold;
                font-size: 14px;
                clear: both;
            }
            
            .popup-box .popup-head .popup-head-left
            {
                float: left;
            }
            
            .popup-box .popup-head .popup-head-right
            {
                float: right;
                opacity: 0.5;
            }
            
            .popup-box .popup-head .popup-head-right a
            {
                text-decoration: none;
                color: inherit;
            }
            
            .popup-box .popup-messages
            {
                height: 100%;
                overflow-y: scroll;
            }
            


        </style>
        
        <script>
            //this function can remove a array element.
            Array.remove = function(array, from, to) {
                var rest = array.slice((to || from) + 1 || array.length);
                array.length = from < 0 ? array.length + from : from;
                return array.push.apply(array, rest);
            };
        
            //this variable represents the total number of popups can be displayed according to the viewport width
            var total_popups = 0;
            
            //arrays of popups ids
            var popups = [];
        
            //this is used to close a popup
            function close_popup(id)
            {
                for(var iii = 0; iii < popups.length; iii++)
                {
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                        
                        document.getElementById(id).style.display = "none";
                        
                        calculate_popups();
                        
                        return;
                    }
                }   
            }
        
            //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
            function display_popups()
            {
                var right = 220;
                
                var iii = 0;
                for(iii; iii < total_popups; iii++)
                {
                    if(popups[iii] != undefined)
                    {
                        var element = document.getElementById(popups[iii]);
                        element.style.right = right + "px";
                        right = right + 320;
                        element.style.display = "block";
                    }
                }
                
                for(var jjj = iii; jjj < popups.length; jjj++)
                {
                    var element = document.getElementById(popups[jjj]);
                    element.style.display = "none";
                }
            }
            
            //creates markup for a new popup. Adds the id to popups array.
            function register_popup(id, name)
            {
                
                for(var iii = 0; iii < popups.length; iii++)
                {   
                    //already registered. Bring it to front.
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                    
                        popups.unshift(id);
                        
                        calculate_popups();
                        
                        
                        return;
                    }
                }               
                
                var element = '<div class="popup-box chat-popup panel panel-primary" id="'+ id +'">';
                element = element + '<div class="panel-heading"><span class="glyphicon glyphicon-comment"></span> '+ name +'';
                element = element + '<a class="pull-right" style="color:#fff" href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
                element = element + '<div style="clear: both"></div>';
                element = element + '</div><div class="popup-messages"></div></div>';
                
                document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  
        
                popups.unshift(id);
                        
                calculate_popups();
                
            }
            
            //calculate the total number of popups suitable and then populate the toatal_popups variable.
            function calculate_popups()
            {
                var width = window.innerWidth;
                if(width < 540)
                {
                    total_popups = 0;
                }
                else
                {
                    width = width - 200;
                    //320 is width of a single popup box
                    total_popups = parseInt(width/320);
                }
                
                display_popups();
            }
            
            //recalculate when window is loaded and also when window is resized.
            window.addEventListener("resize", calculate_popups);
            window.addEventListener("load", calculate_popups);
        </script>