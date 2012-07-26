<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
<script type="text/javascript">
          
          function windowLoad()
          {
		         var myform1=document.myform1;
		         myform1.dtUser.focus();
		         myform1.dtUser.select();
          }
          
          function check()
          {
          var myform1=document.myform1;
          var user = document.myform1.dtUser.value;
          var password = document.myform1.dtPass.value;
          if (user == "")
             {
              alert ("Enter User Name");
              myform1.dtUser.focus();
              return false;
             }
          else if (password == "")
             {
              alert ("Enter Password");
             myform1.dtPass.focus();
              return false;
             }
          else
          return true;
          }
 window.onload=windowLoad;
        </script>
</head>

<body>
<div id>
			
	<div id style="margin-top:20px;">
	<?php $attributes = array('class' => 'loginform', 'id' => 'myform1', 'name' =>'myform1'); ?>
	<?php echo form_open('petugas_cont/login',$attributes ); ?>
    <div id >Username</div>
	<div id> <input type="text" name="dtUser" /></div>
	<div id> Password</div>
	<div id> <input type="password" name="dtPass" /></div>
	<br />
			<input type="submit" name="Submit" value="Login"  onClick="return check();"/>
	<?php echo form_close(); ?>
	</div>
</div>



</body>
</html>

