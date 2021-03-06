<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/detail.css">
    <link rel="stylesheet" type="text/css" href="./css/common.admin.css">
    <script type="text/javascript"> 
    function check(){
        if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示
            return true; // 「OK」時は送信を実行
        }
        else{ // 「キャンセル」時の処理
            window.alert('キャンセルされました'); // 警告ダイアログを表示
            return false; // 送信を中止
        }
    }
    </script>
</head>
<?php
	include 'common/login_check.php';
	include 'Model/Product.php';
	$product = new Product();
	$id = $_GET['id'];
	$item = $product->findId($id);
?>
<body>
    <div class="wrap">
    
		<?php include 'common/view/admin/header.php'; ?>
		
        <div class="main_contents">
            <form name="edit" class="edit" id="edit" action="Controller/productController.php" method="post" enctype="multipart/form-data">
            <?php if(!empty($item)) { ?>
            
	            <div class="left_contents">
		            <img src="./img/menu/<?php echo $item['img']; ?>">
		            <input type="hidden" name="img" value="<?php echo $item['img']; ?>">
		            <input type="file" name="img" class="img_input">
	            </div>
	            
	            <div class="right_contents">
		            <ul>
		                <li class="name">
		                    <h2 class="title">商品名</h2><input type="text" class="inp" name="name" value="<?php echo $item['name']; ?>">
		                </li>
		                <li class="warmth">
		                    <h2 class="title">暖かさ</h2>
		                    <input type="radio" name="tmp" value="0" <?php if($item['tmp'] == 0) echo "checked"; ?>><span>冷</span>
		                    <input type="radio" name="tmp" value="1" <?php if($item['tmp'] == 1) echo "checked"; ?>><span>暖</span>
		                    <input type="radio" name="tmp" value="2" <?php if($item['tmp'] == 2) echo "checked"; ?>><span>どちらも</span>
		                    <input type="radio" name="tmp" value="3" <?php if($item['tmp'] == 3) echo "checked"; ?>><span>無</span>
		                </li>
		                <li class="price">
		                    <h2 class="title">値段</h2>
		                    <input type="text" class="inp" name="price" value="<?php echo $item['price']; ?>">円
		                </li>
		                <input type="hidden" name="id" value="<?php echo $id; ?>">
		                <li class="sub_btn">
		                    <button type="submit" class="btn btn-success" onClick="check()">変更</button>
		                </li>
		            </ul>
	            </div>
	        <?php }else{ echo "ERROR"; }?>
            </form>
        </div>
    </div>
</body>
</html>
