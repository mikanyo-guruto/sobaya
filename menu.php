<html>
<head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">

</head>
<body>
<?php
	include 'Product.php';
	$product = new Product();
	$recode = $product->getRecodes();
?>
<div class="wrap">
    <div class="main">
        <div class="header">
            <h1>お品書き</h1>
        </div>

        <div class="navbar">
            <div class="container">
                <ul class="nav nav-justified">
                    <li class="active"><a href="./index.html">トップ</a></li>
                    <li><a href="./about.html">店舗概要</a></li>
                    <li><a href="./menu.html">お品書き</a></li>
                    <li><a href="./contact.html">問い合わせ</a></li>
                </ul>
            </div>
        </div>
        
        <div class="menu">
            <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#men" data-toggle="tab">麺</a></li>
                    <li><a href="#gohan" data-toggle="tab">御飯</a></li>
                    <li><a href="#nabe" data-toggle="tab">鍋もの</a></li>
                    <li><a href="#seiro" data-toggle="tab">せいろ</a></li>
                    <li><a href="#mini" data-toggle="tab">ミニシリーズ</a></li>
                    <li><a href="#drink" data-toggle="tab">飲み物</a></li>
                </ul>
            <div class="tab-content menu_contents">
                <div class="tab-pane fade in active" id="men">
                        <ul>
                            <?php
                                foreach($recode['noodle'] as $key) {
                                    ?><li>
                                       <span class="cool">冷</span>
                                       <img src="./img/menu/tenzaru.jpg">
                                       <h2><?php echo $key['name']; ?></h2><h3>1,150円</h3>
                                    </li>
                                <?php } ?>
                        </ul>
                    </div>
                <div class="tab-pane gade" id="gohan">
                    <ul>
                            <?php
                                foreach($recode['rice'] as $key) {
                                    ?><li>
                                       <span class="cool">冷</span>
                                       <img src="./img/menu/tenzaru.jpg">
                                       <h2><?php echo $key['name']; ?></h2><h3>1,150円</h3>
                                    </li>
                                <?php } ?>
                        </ul>
                        </div>

                <div class="tab-pane gade" id="nabe">
                            <?php
                                foreach($recode['rice'] as $key) {
                                    ?><li>
                                       <span class="cool">冷</span>
                                       <img src="./img/menu/tenzaru.jpg">
                                       <h2><?php echo $key['name']; ?></h2><h3>1,150円</h3>
                                    </li>
                                <?php } ?>
                        </div>

                <div class="tab-pane gade" id="seiro">
                        <ul>
                               <li><p>あああ</p></li> 
                               <li><p>あああ</p></li> 
                               <li><p>あああ</p></li> 
                            </ul>
                    </div>
                
                <div class="tab-pane gade" id="mini">
                            <ul>
                               <li><p>あああ</p></li> 
                               <li><p>あああ</p></li> 
                               <li><p>あああ</p></li> 
                            </ul>
                        </div>

                <div class="tab-pane gade" id="drink">
                            <ul>
                               <li><p>あああ</p></li> 
                               <li><p>あああ</p></li> 
                               <li><p>あああ</p></li> 
                            </ul>
                        </div>
            </div>
        </div>

        <div class="footer">
            <div class="footer_left">
                <h3>お問い合わせ</h3>
                <p class="tel">000-0000-0000</p>
            </div>
            <div class="footer_right">
                <p>〒183-0005 東京都府中市若松町２丁目４−７</p>
                <p>営業時間</p>
                <p>
                    昼の部：11時00分～15時00分<br>
                    夜の部：17時30分～20時30分
                </p>
                <p>定休日：火曜日</p>
            </div>
            <p class="copy">Copyright &copy; Sobaya all rights reserve</p>
        </div>
        
    </div>
</div>
<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>
</html>