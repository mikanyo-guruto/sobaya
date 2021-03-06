<?php
	include '../Model/Product.php';
	session_start();
	
	// formのデータを変数に代入
	$name = $_POST['name'];
	$tmp = $_POST['tmp'];
	$price = $_POST['price'];
	$genre = $_POST['genre'];
	$img = $_POST['img'];
	
	// ディレクトリの指定
	$tmp_dir = __DIR__ . "/tmp/";
	$img_dir = "../img/menu/";
	
	// 画像登録処理
	if (isset($_FILES['img'])) {
		if (move_uploaded_file($_FILES['img']['tmp_name'], $tmp_dir . "/" . basename($_FILES['img']['name']))) {
			// 名前をユニークに
			$tmpfile = tempnam($tmp_dir, 'IMG_');
			$tmp_name = pathinfo($tmpfile, PATHINFO_FILENAME);
			$tmp_imgname = $tmp_name . '.jpg';
			// 名前を変更後、imgディレクトリへ
			if (rename($tmp_dir . "/". $_FILES['img']['name'], $img_dir . "/" . $tmp_imgname)) {
				$img = $tmp_imgname;
			}
			unlink($tmp_dir . $tmp_name . ".tmp");
		}
	}
	
	// アップデート処理
	$product = new Product();
	$stmt = $product->insertRecode($name, $tmp, $price, $genre, $img);
	
	// 成功していたら成功メッセージを代入
	$msg = null;
	if($stmt && $img != null) {
		$msg = "更新に成功しました。";
	}else{
		$msg = "更新に失敗しました。";
	}
	
	$_SESSION['msg'] = mb_convert_encoding($msg, 'utf-8', 'shift-jis');
	
	// 管理者一覧画面に戻る
	header("Location: ../edit");
	
