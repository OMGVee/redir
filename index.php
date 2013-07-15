<?php
$url = $_REQUEST['link'];
if ($url == '') {
	//echo "huh? redirect null? even I can't do that, buster ;)";
	// could also do:
	//echo "redirecting";
	echo("
		<form method='POST' action='index.php'>
			bounce.me.to:<input type='text' id='link' name='link' value=''><input type='submit' name='submit' value='go baby go!'>
		</form>
	");
}
else {
	//needs error checking and all that shit, path traversal possible on apache
	if (strpos($url, "http://") === FALSE) {
		$url = "http://" . $url;
	}
	//gay js redirect, because my php doesn't support http_redirect and everything, and I hate the header() hack.
	echo("
	<script language='JavaScript'>
	self.location='$url';
	</script>
	");
	//echo "<meta http-equiv='Refresh' content='1;URL=$url'>";
}
?>

