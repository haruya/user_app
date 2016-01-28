<?php

/**
 * Authクラス
 */
class Auth extends Db
{
	
	public function __construct() {
		parent::__construct();
		// セッションスタート
		session_start();
	}
	
	/**
	 * ログイン情報取得
	 */
	public function getUser() {
		if (isset($_SESSION['loginInfo'])) {
			return $_SESSION['loginInfo'];
		} else {
			return false;
		}
	}
	
	/**
	 * ログイン処理
	 */
	public function login($email, $password, $memoryFlag) {
		$sql = "
			SELECT
				id,
				name,
				password,
				email,
				created,
				modified
			FROM
				users
			WHERE
				email = :email
			AND
				password = :password
		";
		
		$params[] = [
			":email", $email, PDO::PARAM_STR,
			":password", $password, PDO::PARAM_STR
		];
		try {
			$this->executeSql($sql, $params);
			$loginUser = $this->fetchDatabase();
			if ($loginUser !== false) {
				$_SESSION['loginInfo'] =[
					'id' => $loginUser[0]['id'],
					'name' => $loginUser[0]['name'],
					'email' => $loginUser[0]['email']
				];
				// ログイン情報記憶処理
				$this->memory($email, $password, $memoryFlag);
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo "ログインの際にエラー: ";
			Log::message("ログインの際にエラー: " . $e->getMessage());
		}
		
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$_SESSION = array(); // まずはセッションの中身を空にする
		session_destroy(); // サーバー側のセッション情報を削除する。
	}
	
	/**
	 * ログイン情報記憶処理
	 */
	private function memory($email, $password, $memoryFlag) {
		if (isset($_COOKIE['loginEmail'])) {
			setcookie("loginEmail", "", time() - 1800, '/user_app/users/login.php/');
			setcookie("loginPw", "", time() - 1800, '/user_app/users/login.php/');
		}
		if ($memoryFlag == 1) {
			setcookie("loginEmail", $email, time()+60*60*24*14, '/user_app/users/login.php/');
			setcookie("loginPw", $password, time()+60*60*24*14, '/user_app/users/login.php/');
		}
	}
}
