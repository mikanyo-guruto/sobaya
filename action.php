<?php
	include 'Product.php';
	session_start();
	
	// form�̃f�[�^��ϐ��ɑ��
	$id = $_POST['id'];
	$name = $_POST['name'];
	$tmp = $_POST['tmp'];
	$price = $_POST['price'];
	$img = null;
	
	// �f�B���N�g���̎w��
	$tmp_dir = __DIR__ . "/tmp";
	$img_dir = "./img/menu/";
	
	if (isset($_FILES['img'])) {
		if (move_uploaded_file($_FILES['img']['tmp_name'], $tmp_dir . "/" . basename($_FILES['img']['name']))) {
			// ���O�����j�[�N��
			$tmpfile = tempnam($tmp_dir, 'IMG_');
			$tmp_imgname = pathinfo($tmpfile, PATHINFO_FILENAME) . '.jpg';
			// ���O��ύX��Aimg�f�B���N�g����
			if (rename($tmp_dir . "/". $_FILES['img']['name'], $img_dir . "/" . $tmp_imgname)) {
				$img = $tmp_imgname;
			}
		}
	}
	
	// �A�b�v�f�[�g����
	$product = new Product();
	$stmt = $product->updateRecode($id, $name, $tmp, $price, $img);
	
	// �������Ă����琬�����b�Z�[�W����
	$msg = null;
	if($stmt && $img != null) {
		$msg = "�X�V�ɐ������܂����B";
	}else{
		$msg = "�X�V�Ɏ��s���܂����B";
	}
	
	$_SESSION['msg'] = mb_convert_encoding($msg, 'utf-8', 'shift-jis');
	
	// �Ǘ��҈ꗗ��ʂɖ߂�
	header("Location: ./edit.php");
	