<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">
	<title>Sports Player</title>
</head>
<body>
	<div class="container">
		<div class="search_bar">
			<h1>Search Users</h1>
			<form action="<?= base_url(); ?>players/process" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				<input type="text" name="search"><br><br>
				<labe><input type="checkbox" name="Male" value="Male"> Male</label><br>
				<label><input type="checkbox" name="Female" value="Female"> Female</label><br><br>
				<h3>Sports</h3>
				<label><input type="checkbox" name="Basketball" value="Basketball"> Basketball</label><br>
				<label><input type="checkbox" name="Volleyball" value="Volleyball"> Volleyball</label><br>
				<label><input type="checkbox" name="Soccer" value="Soccer"> Soccer</label><br>
				<label><input type="checkbox" name="Baseball" value=Baseball"> Baseball</label><br>
				<label><input type="checkbox" name="Football" value="Football"> Football</label><br>
				<input type="submit" value="Search">
			</form>
		</div>
		<div class="players">
<?php
	foreach($all_players as $player){
?>			
			<div class="gallery">
				<img src="<?= base_url('assets/images/') . $player['file_name']; ?>" alt="Sports">
				<div class="desc"><?= ucfirst($player['name'])?></div>
			</div>

<?php	}  ?>
			
		</div>
	</div>
</body>
</html>