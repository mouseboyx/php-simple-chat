<head>
<script>
	function init() {
		if (<?php if (isset($_POST['name']) || isset($_GET['name'])) { echo 1; } else { echo 0; } ?>==1) {
		
			document.getElementById("text").focus();
		} else {
			document.getElementById("name").focus();
		}
	}
</script>
<style>
/*
div:nth-of-type(0n+0) {
	background-color:#ccc;
	
	}
	div:nth-of-type(2n+1) {
	background-color:#ccc;
	display:block;
	}
	*/
	div.b {
	display:block;
	}
div.i {
display:inline;
}
div {
	padding:.4em;
	display:inline;
	}
	div:first-of-type {
	margin-top:0;
	}
</style>
</head>
<body onload="init()" style="font-family:sans;">
<?php if (isset($_GET['name'])) {
echo '<a accesskey="r" href="javascript:window.location.href=window.location.href">Refresh</a>';
} else {
echo '<a accesskey="r" href="javascript:window.location.href=window.location.href+\'?name=\'+document.getElementById(\'name\').value;">Refresh</a>';
}
?>
<form name="chat" action="" method="post" style="margin-bottom:0;">
<input size="16" placeholder="Enter Name" id="name" name="name" type="text" value="<?php if (isset($_GET['name'])) { echo strip_tags(str_replace('"','&quot;',$_GET['name'])); } else { if (isset($_POST['name'])) { echo strip_tags(str_replace('"','&quot;',$_POST['name'])); }} ?>">
<input id="text" name="text" type="text" value="" style="width:50%;">
<input type="submit">
</form>
<pre>
<?php
$database='chat';
include '../mysql.php';
if (isset($_POST['name']) && isset($_POST['text']) && ($_POST['name']!="")) {
//echo strip_tags($_POST['name']).' '.strip_tags($_POST['text']).'<br>';
$q='insert into bigtable (name,text) values ("'.mysqli_real_escape_string($connection,$_POST['name']).'","'.mysqli_real_escape_string($connection,$_POST['text']).'")';
$res = mysqli_query($connection,$q);
}


$q='select name,text from bigtable order by id desc';
$res = mysqli_query($connection,$q);
while ($row = mysqli_fetch_assoc($res)) {
	while (strlen($row['name'])<16) {
		$row['name'].=' ';
	}
	echo ''.$row['name'].' : '.$row['text'].''."\n";
	}
?>
</pre>
</body>
