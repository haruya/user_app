<!DOCTYPE html>
<html lang="ja">
<head>
<?php require_once(dirname(__FILE__) . "/../master/temp_head.php"); ?>
</head>
<body>
<h1><?php echo $title; ?></h1>
<table border="1">
	<tr>
		<th>ID</th>
		<td><?php echo $target['id']; ?></td>
	</tr>
	<tr>
		<th>名前</th>
		<td><?php echo $target['name']; ?></td>
	</tr>
	<tr>
		<th>メールアドレス</th>
		<td><?php echo $target['email']; ?></td>
	</tr>
</table>
<p>
	<a href="update.php?id=<?php echo $target['id']; ?>">[編集]</a>&nbsp;
	<a href="#" onclick="document.deleteForm.submit()">[削除]</a>
</p>
<form name="deleteForm" action="delete.php" method="post">
	<input type="hidden" name="id" value="<?php echo $target['id']; ?>">
</form>
</body>
</html>