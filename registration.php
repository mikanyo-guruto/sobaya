<html>
<head>
	<meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/registration.css">
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
<body>
    <div class="wrap">
    
		<?php include 'common/view/admin/header.php'; ?>
		
        <div class="main_contents">
            <form name="regist" class="edit" id="edit" action="Controller/insertData.php" method="post" enctype="multipart/form-data">
	            
	            <div class="right_contents">
		            <ul>
						<input type="hidden" name="img">
		            	<input type="file" name="img" class="img_input">

		                <li class="name">
		                    <h2 class="title">商品名</h2><input type="text" class="inp" name="name">
		                </li>
		                <li class="warmth">
		                    <h2 class="title">暖かさ</h2>
		                    <input type="radio" name="tmp" value="0"><span>冷</span>
		                    <input type="radio" name="tmp" value="1"><span>暖</span>
		                    <input type="radio" name="tmp" value="2"><span>どちらも</span>
		                    <input type="radio" name="tmp" value="3"><span>無</span>
		                </li>
		                <li class="price">
		                    <h2 class="title">値段</h2>
		                    <input type="text" class="inp" name="price">円
		                </li>
						<li class="genre">
							<h2 class="title">種類</h2>
							<input type="radio" name="genre" value="noodle"><span>麺</span>
							<input type="radio" name="genre" value="rice"><span>飯</span>
							<input type="radio" name="genre" value="pot"><span>鍋</span>
							<input type="radio" name="genre" value="bamboo_steamer"><span>蒸</span>
							<input type="radio" name="genre" value="mini"><span>ミニ</span>
							<input type="radio" name="genre" value="drink"><span>飲み物</span>
						</li>
		                <li class="sub_btn">
		                    <button type="submit" class="btn btn-success" onClick="check()">登録</button>
		                </li>
		            </ul>
	            </div>
            </form>
        </div>
    </div>
</body>
</html>
