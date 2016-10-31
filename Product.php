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
	        $recodes = array('noodle'=>array(), 'rice'=>array(), 'pot'=>array(), 'bamboo_steamer'=>array(), 'mini'=>array(), 'drink'=>array());
	        
	        $i = 0;
	        // 配列に格納
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
				// 一度レコードを配列に格納
				$recode = array('id'=>$row['id'], 'name'=>$row['name'], 'price'=>$row['price'], 'tmp'=>$row['tmp'], 'img'=>$row['img']);
				$recode['price'] = number_format($recode['price']);
				$recode['tmp'] = $this->getTemperature((int)$recode['tmp']);
				// ジャンル別に新たな配列に格納
	            array_push($recodes[$row['genre']], $recode);

	            $i++;
	        }
            
            return $recodes;
        } catch(PDOException $e) {
            return false;
        }
    }
    
    /*
    	### 受け取った温度データを文字に変換する関数
    	0 = 冷たい, 1 = 暖かい, 2 = どちらも, 3 = 無し
    	引数: 温度データ(0, 1, 2, 3)
    	返値: 文字列
    */
    private function getTemperature($tmp) {
		$str = null;
		switch($tmp) {
			case 0:
				$str = "cool";
				break;
			case 1:
				$str = "hot";
				break;
			case 2:
				$str = "both";
				break;
			case 3:
				$str = "none";
				break;
		}
		return $str;
	}
}