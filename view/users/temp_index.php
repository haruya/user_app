<!DOCTYPE html>
<html lang="ja">
<head>
<?php require_once(dirname(__FILE__) . "/../master/temp_head.php"); ?>
</head>
<body>
<h1><?php echo $title; ?></h1>
<?php if (!empty($users)) : ?>
<table border="1">
	<tr>
		<th></th>
		<th>ID</th>
		<th>名前</th>
		<th>メールアドレス</th>
	</tr>
	<?php foreach ($users as $user) : ?>
	<tr>
		<td><a href="view.php?id=<?php echo $user['id']; ?>">[詳細]</a></td>
		<td><?php echo $user['id']; ?></td>
		<td><?php echo $user['name']; ?></td>
		<td><?php echo $user['email']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php else : ?>
	<p>ユーザが存在しません。</p>
<?php endif; ?>
</body>
</html>