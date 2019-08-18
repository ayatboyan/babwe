<script>    
$(document).ready(function(){
	function tampildata(){
	    $.ajax({
	    type:"POST",
	    url:"<?php echo base_url(); ?>users/ambil_pesan",    
		    success: function(data){                 
		      $('#isi_chat').html(data);
		    }  
	    });
	}

	$('#kirim').click(function(){
	  var pesan = $('#pesan').val(); 
	  var user = $('#user').val(); 
	  $("#pesan").value= "";
	  $.ajax({
	  type:"POST",
	  url:"<?php echo base_url(); ?>users/kirim_chat",    
	  data: 'pesan=' + pesan + '&user=' + user,        
	     success: function(data){                 
	       $('#isi_chat').html(data);
	     }  
	  });
	});
	           
	setInterval(function(){
	   tampildata();
	},1500);
});
</script>
		<br>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-comment"></span> Chat Room <small style='color:red'><i>Live!</i></small>
			</div>
			<div class="panel-footer">
				<div class="clearfix">
					<input id="user" type="hidden" class="form-control input-sm" value='<?php echo $this->session->username; ?>' />
						<div class="input-group">
							<input id="pesan" type="text" class="form-control input-sm" placeholder="Type your message here..." />
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="kirim">Send</button>
							</span>
						</div>
				</div>
			</div>
			<div class="panel-body">
				<div id="isi_chat"> </div>
			</div>
			
		</div>
