<?php
class Product {
	
	private $dsn;
	private $user;
	private $pass;
	
	function __construct() {
		$this->dsn = 'mysql:dbname=sobaya;host=localhost';
	    $this->user = 'root';
	    $this->pass = '';
    }
    
    // Productのレコードを全件取得
    public function getRecodes() {
        try {
            $db = new PDO($this->dsn, $this->user, $this->pass);
            
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
    	指定したIDを検索
    	引数: ID
    	途中でエラーが出た場合falseを返す
    */
    public function findId($id) {
		try {
            $db = new PDO($this->dsn, $this->user, $this->pass);
            $stmt = $db->query("SELECT * FROM products WHERE id LIKE " . $id);
            //query実行
            $recode = $stmt->fetch(PDO::FETCH_ASSOC);
            
			return $recode;
		} catch(PDOException $e) {
			return false;
		}
	}
    
    public function updateRecode($id, $name, $tmp, $price, $img) {
		$error = null;
		// バリデーションチェック
		
		// DB操作
		$db = new PDO($this->dsn, $this->user, $this->pass);
		$query = "UPDATE products SET name = :name, price = :price, tmp = :tmp, img = :img WHERE id = :id";
		$stmt = $db->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->bindValue(':name', $name, PDO::PARAM_STR);
		$stmt->bindValue(':price', $price, PDO::PARAM_INT);
		$stmt->bindValue(':tmp', $tmp, PDO::PARAM_INT);
		$stmt->bindValue(':img', $img, PDO::PARAM_STR);
		
		if($stmt->execute()) {
			return true;
		}else{
			$error = "db insert error";
			return $error;
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
	
	// tmpに応じた文字を返す
	function getTmpStr($tmp) {
		$str = null;
		$html = null;
		if($tmp == "both") {
			$html = '
				<p class="cool">冷</p>
				<p class="hot">暖</p>
			';
		}else{
			switch($tmp){
			case "cool":
				$str = "冷";
				break;
			case "hot":
				$str = "暖";
				break;
			}
			$html = "<p class=" . $tmp . ">" . $str . "</p>";
		}
		
		return $html;
	}
}