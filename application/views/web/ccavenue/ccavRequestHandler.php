<html>
<head>
<title>Ccavaneue</title>
</head>
<body>
<center>

<h2>Processing for payment, so please do not refresh or close page....</h2>

<form method="post" name="redirect" action="<?= $this->config->item('ccavenueprocess_url') ?>">
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>"; 
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

