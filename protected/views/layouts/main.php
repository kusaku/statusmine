<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?= CHtml::encode($this->pageTitle); ?></title>
		<style type="text/css">
			@import url("theme/styles.css") tv, screen;
		</style>
		<!--link href="theme/styles.css" rel="stylesheet" type="text/css" /-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.plugins.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		</script>
	</head>
	<body>
		<?= $content; ?>
	</body>
</html>
