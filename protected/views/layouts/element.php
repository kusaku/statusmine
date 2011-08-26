<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Running <?= CHtml::encode($this->getId()); ?></title>
		<style type="text/css">
			@import url("theme/styles.css") tv, screen;
		</style>
		<style type="text/css">
			body {
			    position: fixed;			    				
			    background-color: #2f2f2f;
				text-align: center;
			}
			body > div {
				display: inline-block;				
			}
		</style>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.plugins.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		</script>
	</head>
	<body>
		<div class="fullh"></div>
		<?= $content; ?>
		<div class="fullh"></div>
	</body>
</html>
