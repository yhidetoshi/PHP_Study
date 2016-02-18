<?php
session_start();
require('../../dbconnect.php');
if(!isset($_SESSION['join'])){
	header('Location: index.php');
	exit();
}

if(!empty($_POST)){
	//登録処理をする
	$sql = sprintf('INSERT INTO members SET name="%s", email="%s", password="%s", picture="%s", created="%s"',
		mysql_real_escape_string($_SESSION['join']['name']),
		mysql_real_escape_string($_SESSION['join']['email']),
		mysql_real_escape_string(sha1($_SESSION['join']['password'])),
		mysql_real_escape_string($_SESSION['join']['image']),
		date('Y-m-d H:i:s')
		);
		mysql_query($sql) or die(mysql_error());
		unset($_SESSION['join']);
		header('Location: thanks.php');
		exit();
}
?>
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
		<title> アカウントを作成 </title>
		<link rel="stylesheet" href="../css/join_check.css">
		.css">
	</head>


<form action="" method="post">
	<input type="hidden" name="action" value="submit" />
	<h2>入力内容の</h2>
	<dl>
		<dt>【ニックネーム】</dt>
		<dd>
			<?php echo htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES,'UTF-8'); ?>
		</dd>
			
		<dt>【メールアドレス】</dt>	
		<dd>
			<?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES,'UTF-8'); ?>
		</dd>	
		
		<dt>【パスワード】</dt>	
		<dd>
		表示されません	
		</dd>
		
		<dt>【プロフィール写真】</dt>
		<dd>
			<img src="../member_picture/<?php echo $_SESSION['join']['image']; ?>"
			width="200" height="200" alt="" />
		</dd>
	</dl>
	
	<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a>
	<p></p>
	<input type="submit" class="btn" value="登録する" /></div>
</form>
</html>
