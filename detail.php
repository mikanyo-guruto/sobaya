<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/detail.css">
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
	$id = $_GET['id'];
	$item = $product->findId($id);
?>
<body>
    <div class="wrap">
        <h1>メニュー変更画面</h1>
        <div class="main">
            <form name="edit" class="edit" id="edit" action="action.php" method="post">
            <?php if(!empty($item)) { ?>
	            <img src="./img/menu/<?php echo $item['img']; ?>">
	            <ul>
	                <li class="name">
	                    <h2 class="title">商品名</h2><input type="text" class="inp" name="name" value="<?php echo $item['name']; ?>">
	                </li>
	                <li class="warmth">
	                    <h2 class="title">暖かさ</h2>
	                    <input type="checkbox" id="radio1" name="warth[0]" value="1" <?php if($item['tmp'] == 0 || $item['tmp'] == 2) echo "checked"; ?> onclick="clearBtn('radio1')"><span>冷</span>
	                    <input type="checkbox" id="radio2" name="warth[1]" value="2" <?php if($item['tmp'] == 1 || $item['tmp'] == 2) echo "checked"; ?>><span>暖</span>
	                    <input type="checkbox" id="radio3" name="warth[2]" value="4" <?php if($item['tmp'] == 3) echo "checked"; ?>><span>無</span>
	                </li>
	                <li class="price">
	                    <h2 class="title">値段</h2>
	                    <input type="text" class="inp" name="price" value="<?php echo $item['price']; ?>">円
	                </li>
	                <li class="sub_btn">
	                    <button type="submit" class="btn btn-success">変更</button>
	                </li>
	            </ul>
	        <?php }else{ echo "ERROR"; }?>
            </form>
        </div>
    </div>
</body>
</html>