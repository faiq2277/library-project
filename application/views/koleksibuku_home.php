<h2><?php echo $title;?></h2>
<p><a href="<?php echo base_url()?>index.php/koleksi_buku/add"> Add</a></p>
 
<?php
if($this->session->flashdata('message')){
echo "<p><i>".$this->session->flashdata('message')."</i></p>";
}
?>
<table width="550" border="1">
<tr>
<td width="27">Kode Buku</td>
<td width="99">Judul Buku</td>
<td width="101">Penulis</td>
<td width="91">Penerbit</td>
<td width="200">Tahun Terbit</td>
<td width="100">Kategori</td>
</tr>
<?php
if(!empty($buku)){
foreach($buku as $book){
?>
<tr>
<td><?php echo $book['kode_buku'];?></td>
<td><?php echo $book['judul_buku'];?></td>
<td><?php echo $book['penulis'];?></td>
<td><?php echo $book['penerbit'];?></td>
<td><?php echo $book['tahun_terbit'];?></td>
<td><?php echo $book['kategori'];?></td>
<td>
<a href="<?=base_url()?>index.php/koleksi_buku/edit/<?php echo $book['kode_buku'];?>">Edit</a> |
<a href="<?=base_url()?>index.php/koleksi_buku/delete/<?php echo $book['kode_buku'];?>"  onclick="return confirm('Anda yakin akan menghapus data?')">Delete</a>
</td>
</tr>
<?php
}
}
?>
<tr>
<td colspan="4">Total</td>
<td><?php echo count($buku);?></td>
</tr>
</table>
<p>&nbsp;</p>