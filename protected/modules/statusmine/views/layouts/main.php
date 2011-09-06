<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?= CHtml::encode($this->getPageTitle()); ?></title>
		<style type="text/css">
			@import url("/theme/styles.css") tv, screen;
		</style>
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery-ui.custom.min.js"></script>
		<script type="text/javascript" src="/js/jquery.plugins.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
	</head>
	<body style="opacity:0">
		<?= $content; ?>
	</body>
</html>
