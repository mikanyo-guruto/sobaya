<?php
	include 'Product.php';
	session_start();
		
	// form�̃f�[�^��ϐ��ɑ��
	$id = $_POST['id'];
	$name = $_POST['name'];
	$tmp = $_POST['tmp'];
	$price = $_POST['price'];
	
	// �A�b�v�f�[�g����
	$product = new Product();
	$stmt = $product->updateRecode($id, $name, $tmp, $price);
	
	// �������Ă����琬�����b�Z�[�W����
	$msg = null;
	if($stmt) {
		$msg = "�X�V�ɐ������܂����B";
	}else{
		$msg = "�X�V�Ɏ��s���܂����B";
	}
	
	$_SESSION['msg'] = mb_convert_encoding($msg, 'utf-8', 'shift-jis');
	
	// �Ǘ��҈ꗗ��ʂɖ߂�
	header("Location: ./edit.php");
	