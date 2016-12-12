<html>
<head>
	<meta charset="UTF-8">
	
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    <link rel="stylesheet" type="text/css" href="./css/common.admin.css">
</head>
<?php
	include 'common/admin.php';
	include 'Product.php';
	$product = new Product();
	$recode = $product->getRecodes();
?>
<body>
    <div class="wrap">
        <?php include 'common/view/admin.header.php'; ?>
        <?php if(!empty($_SESSION['msg'])) { ?>
	        <div class="msg">
	        	<h3><?php echo $_SESSION['msg']; ?></h3>
	        </div>
	    <?php 
	    	unset($_SESSION['msg']);
	    }
	    ?>
        <div class="menu_edit_main">
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
	                		if(!empty($recode['noodle'])) {
		                    	foreach($recode['noodle'] as $key) {
	                    ?>
	                    	<a href="<?php echo "./detail.php?id=" . $key['id']; ?>">
		                    	<li>
		                    		<div class="li_left">
			                    		<div class="tmp">
			                    			<?php echo $product->getTmpStr($key['tmp']); ?>
			                    		</div>
			                            <img src="./img/menu/<?php echo $key['img']; ?>">
			                        </div>
		                            <div class="li_right">
		                            	<h2><?php echo $key['name']; ?></h2><h3><?php echo $key['price']; ?>円</h3>
		                        	</div>
		                        </li>
	                        </a>
	                    <?php 	}
	                    	}else{
								echo "データがありません";
							}
						?>
	                </ul>
                </div>
                
                <div class="tab-pane gade" id="gohan">
                	<ul>
	                	<?php
	                		if(!empty($recode['rice'])) {
		                    	foreach($recode['rice'] as $key) {
	                    ?>
	                    <a href="<?php echo "./detail.php?id=" . $key['id']; ?>">
		                   	<li>
		                   		<div class="li_left">
			                   		<div class="tmp">
			                   			<?php echo $product->getTmpStr($key['tmp']); ?>
			                  		</div>
			                        <img src="./img/menu/<?php echo $key['img']; ?>">
			                    </div>
		                       	<div class="li_right">
		                       		<h2><?php echo $key['name']; ?></h2><h3><?php echo $key['price']; ?>円</h3>
		                       	</div>
		                    </li>
	                    </a>
	                    <?php 	}
	                    	}else{
								echo "データがありません";
							}
						?>
	                </ul>
                </div>

                <div class="tab-pane gade" id="nabe">
                	<ul>
	                	<?php
	                		if(!empty($recode['pot'])) {
		                    	foreach($recode['pot'] as $key) {
	                    ?>
	                   <a href="<?php echo "./detail.php?id=" . $key['id']; ?>">
		                   	<li>
		                   		<div class="li_left">
			                   		<div class="tmp">
			                   			<?php echo $product->getTmpStr($key['tmp']); ?>
			                  		</div>
			                        <img src="./img/menu/<?php echo $key['img']; ?>">
			                    </div>
		                       	<div class="li_right">
		                       		<h2><?php echo $key['name']; ?></h2><h3><?php echo $key['price']; ?>円</h3>
		                       	</div>
		                    </li>
	                    </a>
	                    <?php 	}
	                    	}else{
								echo "データがありません";
							}
						?>
	                </ul>
                </div>

                <div class="tab-pane gade" id="seiro">
                	<ul>
	                	<?php
	                		if(!empty($recode['bamboo_steamer'])) {
		                    	foreach($recode['bamboo_steamer'] as $key) {
	                    ?>
	                    <a href="<?php echo "./detail.php?id=" . $key['id']; ?>">
		                   	<li>
		                   		<div class="li_left">
			                   		<div class="tmp">
			                   			<?php echo $product->getTmpStr($key['tmp']); ?>
			                  		</div>
			                        <img src="./img/menu/<?php echo $key['img']; ?>">
			                    </div>
		                       	<div class="li_right">
		                       		<h2><?php echo $key['name']; ?></h2><h3><?php echo $key['price']; ?>円</h3>
		                       	</div>
		                    </li>
	                    </a>
	                    <?php 	}
	                    	}else{
								echo "データがありません";
							}
						?>
	                </ul>
                </div>
                
                <div class="tab-pane gade" id="mini">
               	<ul>
	                	<?php
	                		if(!empty($recode['mini'])) {
		                    	foreach($recode['mini'] as $key) {
	                    ?>
	                    <a href="<?php echo "./detail.php?id=" . $key['id']; ?>">
		                   	<li>
		                   		<div class="li_left">
			                   		<div class="tmp">
			                   			<?php echo $product->getTmpStr($key['tmp']); ?>
			                  		</div>
			                        <img src="./img/menu/<?php echo $key['img']; ?>">
			                    </div>
		                       	<div class="li_right">
		                       		<h2><?php echo $key['name']; ?></h2><h3><?php echo $key['price']; ?>円</h3>
		                       	</div>
		                    </li>
	                    </a>
	                    <?php 	}
	                    	}else{
								echo "データがありません";
							}
						?>
	                </ul>
                </div>

                <div class="tab-pane gade" id="drink">
                	<ul>
	                	<?php
	                		if(!empty($recode['drink'])) {
		                    	foreach($recode['drink'] as $key) {
	                    ?>
	                    <a href="<?php echo "./detail.php?id=" . $key['id']; ?>">
		                   	<li>
		                   		<div class="li_left">
			                   		<div class="tmp">
			                   			<?php echo $product->getTmpStr($key['tmp']); ?>
			                  		</div>
			                        <img src="./img/menu/<?php echo $key['img']; ?>">
			                    </div>
		                       	<div class="li_right">
		                       		<h2><?php echo $key['name']; ?></h2><h3><?php echo $key['price']; ?>円</h3>
		                       	</div>
		                    </li>
	                    </a>
	                    <?php 	}
	                    	}else{
								echo "データがありません";
							}
						?>
	                </ul>
                </div>
            </div>
            
        </div>
    </div>
<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>
</html>