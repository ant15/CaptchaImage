<?php
	require("CaptchaImage.php");
	$captcha = new CaptchaImage();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CAPTCHA</title>
</head>
<body>
	<img src="<?php echo $captcha->creaImg();?>" >
	<p>Codice = <?php echo $captcha->getCodice();?></p>
</body>
</html>

