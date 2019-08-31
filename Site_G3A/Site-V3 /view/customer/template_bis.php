<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href=<?= $css ?>>
		<title><?= $title ?></title>
	</head>
	
	<body>
		<?php include("bloc_header_view.php")?>
		
		<div class="center">
    		<?php include("bloc_nav_view.php")?>
    		
			<?= $content ?>
		</div>
		<?php include("bloc_footer_view.php")?>
	</body>

</html>





