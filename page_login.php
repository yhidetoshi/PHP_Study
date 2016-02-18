<!DOCTYPE>

<?php
require('../dbconnect.php');
session_start();

//フォームにメアドとパスワードが入力された時の処理を記述
if(!empty($_POST)){
	if($_POST['email'] != '' && $_POST['password'] != ''){
		$sql = sprintf('SELECT * FROM members WHERE email="%s" AND password="%s"',
			mysql_real_escape_string($_POST['email']),
			mysql_real_escape_string(sha1($_POST['password']))
		);
		$record = mysql_query($sql) or die(mysql_error());
	
		//mysql_fetch_assoc — 連想配列として結果の行を取得する
		if($table = mysql_fetch_assoc($record)){
			$_SESSION['id'] = $table['id'];
			$_SESSION['time'] = time();
			header('Location: index.php');
			exit();
		}else{
			$error['login'] = 'failed';
		}
	}else{
		$error['login'] = 'blank';
	}
}


?>

<html>

	<head>
		<meta charset="utf8">
		<title>Sign in</title>
		<link rel="stylesheet" href="./css/login.css"> 
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
	</head>
	<!--
	<header>
		<h2>Sign in</h2>
	</header>
	-->
<body>	

<!--
	<h3><section>アカウントをまだ作成されてない方はこちら</section></h3>
	<p>&raquo;<a href="join/">入会手続きをする</a></p>
-->
 <div id="login">
      <form name='form-login' action="" method="post">
        <span class="fontawesome-user"></span>
          <input type="text" name="email" id="user" placeholder="USERNAME" value="<?php echo htmlspecialchars($_POST['email']);?>"/>
			<?php if($error['login'] == 'blank'): ?>
							<p class="error">*メールアドレスを入力してください*</p>
			<?php endif;?>
			<?php if($error['login'] == 'failed'):?>
				<p class="error">*ログインに失敗しました。正しく入力してください*</p>
			<?php endif;?>

		<span class="fontawesome-lock"></span>
          <input type="text" name="password" id="pass" placeholder="PASSWORD" maxlength="255"
			value="<?php echo htmlspecialchars($_POST['email']);?>"/>
  
  		 <input type="submit" value="Login">
  		 <h3><section>初めての方はこちら</section></h3>
		 <p>&raquo;<a href="join/">入会手続きをする</a></p>
  	 </form>		
</body>
</html>
