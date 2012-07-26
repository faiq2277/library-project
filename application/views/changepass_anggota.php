<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Petugas</title>
<script type="text/javascript">
          function check()
          {
          var myform=document.myform;
          var Newpassword  = document.myform.dtNPass.value;
          var Confpassword = document.myform.dtCoPass.value;
          if (Newpassword == "")
             {
              alert ("Enter New Password");
              myform.dtNPass.focus();
              return false;
             }
          else if (Confpassword == "")
             {
              alert ("Enter Confirm Password");
             myform.dtCoPass.focus();
              return false;
             }
		  else if (Newpassword != Confpassword)
		  {
			alert (" Confirm Password Not Match");
             myform.dtCoPass.focus();
              return false;
		  }
          else
          return true;
          }
        </script>
</head>

<body>
<?php
if ($session_id = $this->session->userdata('username') !=""){
?>
<div >
	login as <?php echo $session_id = $this->session->userdata('nama_petugas'); ?>
	<br>

	<div id style="margin-top:20px;">
	<?php $attributes = array('class' => 'loginform', 'id' => 'myform', 'name' =>'myform'); ?>
	<?php echo form_open('petugas_cont/update_petugas', $attributes ); ?>
	<div id> <input type="hidden" name="myId" value=" <?php echo $session_id = $this->session->userdata('id_petugas'); ?> " /></div>
	<div id> <input type="hidden" name="myPass" value=" <?php echo $session_id = $this->session->userdata('pass'); ?> " /></div>
    <div id >User Name</div>
	<div id> <input type="text" name="dtUser" value=" <?php echo $session_id = $this->session->userdata('username'); ?> " readonly /></div>
	<div id> New Password</div>
	<div id> <input type="password" name="dtNPass" /></div>
	<div id> Confirm Password</div>
	<div id> <input type="password" name="dtCoPass" /></div>
	<div>&nbsp;</div>
	<input type="submit" name="Submit" value="Comfirm"  onClick="return check();"/>
	<?php echo form_close(); ?>
	</div>
	<?php
        echo $link= anchor('petugas_cont/logout','Logout');
	?> 
	
<?php
}else{
	echo $link= anchor('petugas_cont/index','Login');
}
?>

</div>

</body>
</html>

