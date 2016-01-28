<!DOCTYPE html>
<html lang="ja">
<head>
<?php require_once(dirname(__FILE__) . "/../master/temp_head.php"); ?>
</head>
<body>
<h1><?php echo $title; ?></h1>
<?php if(isset($error)) : ?>
<ul>
	<?php foreach ($error as $e) : ?>
	<li><?php echo $e; ?></li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
<form action="" method="post">
	<p>
		名前：
		<input type="text" name="name" value="<?php echo $target['name']; ?>">
	</p>
	<p>
		パスワード：
		<input type="password" name="password" value="<?php echo $target['password']; ?>">
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