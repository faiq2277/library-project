<h2><?php echo $title;?></h2>
 
<form name="form1" id="form1" action="<?=base_url()?>index.php/koleksi_buku/add" method="post">
<?php
if($this->session->flashdata('message')){
echo "<i>".$this->session->flashdata('message')."</i>";
}
 
echo validation_errors();
?>
<table width="400" border="1">
<tr>
<td colspan="2"><div align="center"><strong>Tambah data Pegawai</strong></div></td>
</tr>
<tr>
<td>Kode Buku</td>
<td><input name="kode_buku" type="text" id="kode_buku" value="<?php echo set_value('kode_buku');?>"></td>
</tr>
<tr>
<td>Judul Buku</td>
<td><input name="judul_buku" type="text" id="judul_buku" value="<?php echo set_value('judul_buku');?>"></td>
</tr>
<tr>
<td>Penulis</td>
<td><input name="penulis" type="text" id="penulis" value="<?php echo set_value('penulis');?>"></td>
</tr>
<tr>
<td>Penerbit</td>
<td><input name="penerbit" type="text" id="penerbit" value="<?php echo set_value('penerbit');?>"></td>
</tr>
<tr>
<td>Tahun Terbit</td>
<td><input name="tahun_terbit" type="text" id="tahun_terbit" value="<?php echo set_value('tahun_terbit');?>"></td>
</tr>
<tr>
<td>Kategori</td>
<td><input name="kategori" type="text" id="kategori" value="<?php echo set_value('kategori');?>"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="Add" type="submit" id="add" value="Submit"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><a href="<?php echo base_url()?>index.php/koleksi_buku">Home>> </a></td>
</tr>
</table>
</form>