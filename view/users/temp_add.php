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
		<input type="text" name="name" value="<?php echo $post['name']; ?>">
	</p>
	<p>
		パスワード：
		<input type="password" name="password" value="<?php echo $post['password']; ?>">
	</p>
	<p>
		メールアドレス：
		<input type="text" name="email" value="<?php echo $post['email']; ?>">
	</p>
	<p><input type="submit" value="追加"></p>
</form>
</body>
</html>