<!DOCTYPE html>
<html>
<head>
	<title>Latihan | Muhammad Najich</title>
</head>
<body>
	<form method="post">
		<label>Test</label>
		<input type="text" name="nama">
		<input type="submit" name="hasil">
	</form>
	<?php if (isset($_POST['hasil'])) {
		$nama = $_POST['nama'];
		$result = $nama;
	} ?>
	<div>
		<h1><?php echo $result ?></h1>
	</div>
</body>
</html>