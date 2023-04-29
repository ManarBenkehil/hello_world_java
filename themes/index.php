<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Website</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
</head>
<body>
	<?php include('header.php'); ?>

	<main>
		<br>
			<h1 style="color:#000;">Welcome to my website</h1>
	</main>

	<?php include('sidebar.php'); ?>

	<?php include('footer.php'); ?>
</body>
</html>
