<?php
class Login
{
		
		private $action;
		
		public function __construct($action) {
			$this->action = $action;
		}
		
		// ログインかログアウトかの判定
		public function action() {
			switch($this->action) {
				case "login":
					$this->login();
					break;
				case "logout":
					$this->logout();
					break;
			}
		}
		
		// ログインする関数
		public function login() {
			$id = $_POST['id'];
			$ps = $_POST['ps'];
			
			$dsn = 'mysql:dbname=sobaya;host=localhost';
			$d_usr = 'root';
			$d_pas = '';

			try{
				session_start();
			    $dbh = new PDO($dsn, $d_usr, $d_pas);
			    $query = "SELECT user_id FROM users";
				// idの存在チェック
				$stmt = $dbh->query('SELECT user_id, password FROM users WHERE user_id = "' . $id . '"')->fetch(PDO::FETCH_ASSOC);
			    if($stmt) {
					// パスワード比較
					if(password_verify($ps, $stmt["password"])) {
						
						$_SESSION['id'] = $id;
						$_SESSION['msg'] = "ログインに成功しました。";
						header('Location: ../edit');
						exit;
					}
				}
				$_SESSION['msg'] = "ログインに失敗しました。";			
			}catch (PDOException $e){
				$_SESSION['msg'] = "DatabaseError";
			    header('Location: ../login');
			}
			
			$dsn = null;
		}
		
		// ログアウトする関数
		public function logout() {
			session_start();
			session_destroy();
			header('Location: ../login');
		}
}

$action = $_REQUEST['action'];
$account = new Login($action);
$account->action();
