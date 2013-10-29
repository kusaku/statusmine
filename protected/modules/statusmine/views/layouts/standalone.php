<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?= CHtml::encode($this->getPageTitle()); ?></title>
<style type="text/css">
	body {
		text-align: center;
		}

	body > div {
		display: inline-block;
		height:  100%;
		}

	body > .content {
		height:    auto;
		padding:   1em;
		font-size: 150%;
		}

	body > .content > .innershadow {
		height:           auto;
		border-width:     1em;
		background-color: #2f2f2f;
		}
</style>
</head>
<body style="opacity:0">
<div class="full"></div>
<div class="content">
<div class="innershadow"></div>
<?= $content; ?>
</div>
<div class="full"></div>
</body>
</html>
