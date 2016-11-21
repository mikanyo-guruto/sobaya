<?php
	include 'Product.php';
	session_start();
		
	// formのデータを変数に代入
	$id = $_POST['id'];
	$name = $_POST['name'];
	$tmp = $_POST['tmp'];
	$price = $_POST['price'];
	
	// アップデート処理
	$product = new Product();
	$stmt = $product->updateRecode($id, $name, $tmp, $price);
	
	// 成功していたら成功メッセージを代入
	$msg = null;
	if($stmt) {
		$msg = "更新に成功しました。";
	}else{
		$msg = "更新に失敗しました。";
	}
	
	$_SESSION['msg'] = mb_convert_encoding($msg, 'utf-8', 'shift-jis');
	
	// 管理者一覧画面に戻る
	header("Location: ./edit.php");
	