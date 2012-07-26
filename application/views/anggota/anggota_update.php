	<?php
		echo form_open('anggota_cont/updatedata');
	?>
		<label>nim</label><br/>
		<input type="text" name="nim" value="<?php echo $keluar->nim; ?>"/><br/>
		<label>nama anggota</label><br/>
		<input type="text" name="name_anggota" value="<?php echo $keluar->nama_anggota; ?>"/><br/>
		<label>tgl gabung</label><br/>
		<input type="text" name="tgl_gabung" value="<?php echo $keluar->nama_anggota; ?>"/><br/>
		<input type="submit" name="submit" value="submit"/><br/>
	</form>