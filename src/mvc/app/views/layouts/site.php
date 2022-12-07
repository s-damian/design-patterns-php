<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title><?php echo htmlspecialchars($baliseTitle); ?></title>
	<meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> 
	<![endif]-->
</head>
<body>
	<header>
        <p>Header content</p>
	</header>

	<?php echo $contentInLayout;  // VUE?>

	<footer>
        <p>Footer content</p>
	</footer>
</body>
</html>