<?php
class Product {
    
    public function getRecodes() {
        $dsn = 'mysql:dbname=test;host=localhost';
        $user = 'root';
        $pass = '';

        try {
            $db = new PDO($dsn, $user, $pass);
            
            // 検索をかけるジャンルの名前
	        $stmt = $db->query("SELECT * FROM products");
	        // レコードを配列に格納
	        $recodes = array('noodle'=>array(), 'rice'=>array(), 'pot'=>array(), 'bamboo steamer'=>array(), 'mini'=>array(), 'drink'=>array());
	        
	        $i = 0;
	        // 配列に格納
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
				// 一度レコードを配列に格納
				$recode = array('id'=>$row['id'], 'name'=>$row['name'], 'price'=>$row['price'], 'tmp'=>$row['tmp'], 'img'=>$row['img']);
				// ジャンル別に新たな配列に格納
	            array_push($recodes[$row['genre']], $recode);

	            $i++;
	        }
            
            return $recodes;
        } catch(PDOException $e) {
            return false;
        }
    }
}