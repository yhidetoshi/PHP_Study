<?php

session_start();
require('../../dbconnect.php');


if(!empty($_POST)){
	if($_POST['name'] == ''){
	   $error['name'] = 'blank';
	}
	if($_POST['email'] == ''){
	   $error['email'] = 'blank';
	}
	if($_POST['password'] == ''){
	   $error['password'] = 'blank';
	}
	if(strlen($_POST['password']) < 4){
	   $error['password'] = 'length';
	}

	$fileName = $_FILES['image']['name'];
	if(!empty($fileName)){
		$ext = substr($fileName, -3);
		if($ext != 'jpg' && $ext != 'gif'){
			$error['image'] = 'type';
		}
	}
	
	if(empty($error)){
		$sql = sprintf('SELECT COUNT(*) AS cnt FROM members WHERE email="%s"',
		mysql_real_escape_string($_POST['email'])
		);
		$record = mysql_query($sql) or die (mysql_error());
		$table = mysql_fetch_assoc($record);
		if($table['cnt'] > 0){
			$error['email'] = 'duplicate';
		}
	}


	if(empty($error)){
		//画像をアップする
		$image = date('YmdHis') . $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], '../member_picture/' . $image);
	
		$_SESSION['join'] = $_POST;
		$_SESSION['join']['image'] = $image;
		header('Location: check.php');
		exit();
	}
	

}
	
?>




<!DOCTYPE>
	<html lang="ja">
	<head>
		<meta charset="utf8">
		<title> アカウントを作成 </title>
		<link rel="stylesheet" href="../css/join_login.css">
	</head>

<body>

	<section>
		<h2>次の項目に必要な事項を入力してください</h2>

		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="action" value="submit" />
			<dl>
				<dt>ユーザ名 <span class="required">(必須)</span></dt> 
					<dd>
						<input type="text" name="name" size="50" maxlength="255"
						value="<?php echo htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8');?>"/>
				
						<?php if($error['name'] == 'blank'): ?>
						<p class="error">※ニックネームを入力してください	</p>
						<?php endif; ?>
					</dd>
				

				<dt>メールアドレス <span class="required">(必須)</span></dt> 
					<dd>
						<input type="text" name="email" size="50" maxlength="255"
						value="<?php echo htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');?>"/>
				
						<?php if($error['email'] == 'blank'): ?>
						<p class="error">※Emailを入力してください	</p>
						<?php endif; ?>

						<?php if($error['email'] == 'duplicate'): ?>
						<p class="error">*指定したメールアドレスはすでに登録されています*</p>
						<?php endif; ?>

					</dd>

				<dt>パスワード <span class="required">(必須)</span></dt> 
					<dd>
						<input type="text" name="password" size="50" maxlength="255"
						value="<?php echo htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');?>"/>
				
						<?php if($error['password'] == 'blank'): ?>
						<p class="error">※Emailを入力してください	</p>
						<?php endif; ?>

						<?php if($error['passowrd'] == 'length'):?>
						<p class="error">*パスワードは4文字以上で入力してください</p>
						<?php endif;?>
					</dd>

				<dt>プロフィール写真(任意)</dt>
					<dd>
						<input type="file" name="image" size="35" />
						<?php if($error['image'] == 'type'):?>
						<p class="error">ファイルはjpgかgif形式の画像を指定してください</p>
						<?php endif; ?>

						<?php if(!empty($error)):?>
						<p class="error">画像を改めて指定してください</p>
						<?php endif;?>
					</dd>

			</dl>

			<!-- ユーザ作成ボタンはセキュリティ的に非表示にしておく
			<div><input class="btn" type="submit" value="入力内容を確認"/></div>
			-->
		
		</form>

	<section>
</body>
</html>
