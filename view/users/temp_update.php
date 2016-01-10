<!DOCTYPE html>
<html lang="ja">
<head>
<?php require_once(dirname(__FILE__) . "/../master/temp_head.php"); ?>
</head>
<body>
<h1><?php echo $title; ?></h1>
<form action="" method="post">
	<p>
		名前：
		<input type="text" name="name" value="<?php echo $target['name']; ?>">
	</p>
	<p>
		メールアドレス：
		<input type="text" name="email" value="<?php echo $target['email']; ?>">
	</p>
	<p>
		<input type="submit" value="編集">
		<input type="hidden" name="id" value="<?php echo $target['id']; ?>">
	</p>
</form>
</body>
</html>