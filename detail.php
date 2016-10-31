<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/detail.css">
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
	include 'Product.php';
	$product = new Product();
	$id = preg_match('/id=(\w+)/', $_SERVER["REQUEST_URI"]);
	$item = $product->findId($id);
?>
<body>
    <div class="wrap">
        <h1>メニュー変更画面</h1>
        <div class="main">
            <form name="edit" class="edit" method="post" onSubmit="return check()">
            <?php if(!empty($item)) { ?>
	            <img src="./img/menu/<?php echo $item['img']; ?>">
	            <ul>
	                <li class="name">
	                    <h2 class="title">商品名</h2><input type="text" class="inp" name="name" value="<?php echo $item['name']; ?>">
	                </li>
	                <li class="warmth">
	                    <h2 class="title">暖かさ</h2>
	                    <input type="radio" name="warth" value="1" <?php if($item['tmp'] == 1 || $item['tmp'] == 3)? echo "checked='checked'" : ""; ?>><span>冷</span>
	                    <input type="radio" name="warth" value="2" <?php if($item['tmp'] == 1 || $item['tmp'] == 3)? echo "checked='checked'" : ""; ?>>暖
	                    <input type="radio" name="warth" value="4" <?php if($item['tmp'] == 4)? echo "checked='checked'" : ""; ?>>無
	                </li>
	                <li class="price">
	                    <h2 class="title">値段</h2>
	                    <input type="text" class="inp" name="price" value="<?php echo $item['price']; ?>">円
	                </li>
	                <li class="sub_btn">
	                    <button type="submit" class="btn btn-success">変更</button>
	                </li>
	            </ul>
	        <?php }else{ echo "ERROR"; }
			?>
            </form>
        </div>
    </div>
</body>
</html>
