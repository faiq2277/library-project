<h2><?php echo $title;?></h2>
<form id="form1" action="<?=base_url()?>index.php/koleksi_buku/edit" method="post" name="form1">
<?php
if($this->session->flashdata('message')){
echo "<i>".$this->session->flashdata('message')."</i>";
}
 
echo validation_errors();
?>
<?php echo form_hidden('kode_buku',$buku['kode_buku']);?>
<table width="400" border="1">
<tr>
<td colspan="2"><div align="center"><strong>Edit Data Pegawai</strong></div></td>
</tr>
<tr>
<td>Kode Buku</td>
<td><input name="kode_buku" type="text" id="kode_buku" value="<?php echo set_value('kode_buku',isset($buku['kode_buku'])?$buku['kode_buku'] :'');?>"></td>
</tr>
<tr>
<td>Judul Buku</td>
<td><input name="judul_buku" type="text" id="judul_buku" value="<?php echo set_value('judul_buku',isset($buku['judul_buku'])?$buku['judul_buku'] :'');?>"></td>
</tr>
<tr>
<td>Penulis</td>
<td><input name="penulis" type="text" id="penulis" value="<?php echo set_value('penulis',isset($buku['penulis'])?$buku['penulis'] :'');?>"></td>
</tr>
<tr>
<td>Penerbit</td>
<td><input name="penerbit" type="text" id="penerbit" value="<?php echo set_value('penerbit',isset($buku['penerbit'])?$buku['penerbit'] :'');?>"></td>
</tr>
<tr>
<tr>
<td>Tahun Terbit</td>
<td><input name="tahun_terbit" type="text" id="tahun_terbit" value="<?php echo set_value('tahun_terbit',isset($buku['tahun_terbit'])?$buku['tahun_terbit'] :'');?>"></td>
</tr>
<tr>
<tr>
<td>Kategori</td>
<td><input name="kategori" type="text" id="kategori" value="<?php echo set_value('kategori',isset($buku['kategori'])?$buku['kategori'] :'');?>"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="Add" type="submit" id="add" value="Submit"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><a href="<?php echo base_url()?>index.php/buku">Home>> </a></td>
</tr>
</table>
 
</form>