<?php
	$id = $_POST['id'];
	$ps = $_POST['ps'];
	
	$dsn = 'mysql:dbname=sobaya;host=localhost';
	$d_usr = 'root';
	$d_pas = '';

	try{
		session_start();
	    $dbh = new PDO($dsn, $d_usr, $d_pas);
	    $query = "SELECT user_id FROM users";
		// idの存在チェック
		$stmt = $dbh->query('SELECT user_id, password FROM users WHERE user_id = "' . $id . '"')->fetch(PDO::FETCH_ASSOC);
	    if($stmt) {
			// パスワード比較
			if(password_verify($ps, $stmt["password"])) {
				
				$_SESSION['id'] = $id;
				$_SESSION['msg'] = "ログインに成功しました。";
				header('Location: ./edit.php');
				exit;
			}
		}
		$_SESSION['msg'] = "ログインに失敗しました。";
		header('Location: ./login_index.php');
	}catch (PDOException $e){
	    echo('Error:'.$e->getMessage());
	    die();
	}
	
	$dsn = null;