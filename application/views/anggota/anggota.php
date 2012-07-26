<html>
<head>
<title><?php echo $title; ?></title>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		window.onload = function(){ alert("welcome"); }
	});
</script>
</head>
<body>
	<?php 

			echo $table; 
			echo $this->pagination->create_links();
	?>
	

	<br/>
	<?php
		echo form_open('anggota_cont/add');
	?>
		<label>nim</label><br/>
		<input type="text" name="nim"></input><br/>
		<label>nama anggota</label><br/>
		<input type="text" name="name_anggota"></input><br/>
		<label>tgl gabung</label><br/>
		<input type="text" name="tgl_gabung"></input><br/>
		<input type="submit" name="submit" value="submit"/><br/>
	</form>
	
	<?php
		echo form_open('anggota_cont/index');
	?>
	<label>search name</label>
	<input type="text" name="nama_anggota"/>
	<input type="submit" name="submit" value="submit"/>
	</form>
	
	<?php
		if(!empty($test)){
			echo $test->nama_anggota;
		}
	?>
	
</body>
</html>