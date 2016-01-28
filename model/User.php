<?php

require_once(dirname(__FILE__) . "/Db.php");
require_once(dirname(__FILE__) . "/Log.php");

/**
 * Userクラス
 */
class User extends Auth
{
	/**
	 * ユーザ一覧取得
	 */
	public function getIndex() {
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
			ORDER BY
				id ASC
		";
		try {
			$this->executeSql($sql);
			return $this->fetchDatabase();
		} catch (PDOException $e) {
			echo "ユーザ一覧取得の際にエラー";
			Log::message("ユーザ一覧取得の際にエラー: " . $e->getMessage());
			exit;
		}
	}
	
	/**
	 * ユーザ取得
	 */
	public function getTargetUser($id) {
		$sql = "
			SELECT
				id,
				name,
				email,
				created,
				modified
			FROM
				users
			WHERE
				id = :id
		";
		$params[] = [
			":id", $id, PDO::PARAM_INT
		];
		$this->executeSql($sql, $params);
		$data = $this->fetchDatabase();
		if ($data !== false) {
			$user['id'] = $data[0]['id'];
			$user['password'] = '';
			$user['name'] = $data[0]['name'];
			$user['email'] = $data[0]['email'];
			return $user;
		} else {
			return false;
		}
	}
	
	/**
	 * ユーザ追加
	 */
	public function addUser($post) {
		$sql = "
			INSERT INTO
				users (
					name,
					password,
					email,
					created,
					modified
				) VALUES (
					:name,
					:password,
					:email,
					now(),
					now()
				)
		";
		$params = [
			[":name", $post['name'], PDO::PARAM_STR],
			[":password", $post['password'], PDO::PARAM_STR],
			[":email", $post['email'], PDO::PARAM_STR]
		];
		
		$this->executeSql($sql, $params);
		return true;
	}
	
	/**
	 * ユーザ編集
	 */
	public function updateUser($post) {
		$sql = "
			UPDATE
				users
			SET
				name = :name,
				password = :password,
				email = :email,
				modified = now()
			WHERE
				id = :id
		";
		$params = [
			[":name", $post['name'], PDO::PARAM_STR],
			[":password", $post['password'], PDO::PARAM_STR],
			[":email", $post['email'], PDO::PARAM_STR],
			[":id", $post['id'], PDO::PARAM_INT]
		];
		
		$this->executeSql($sql, $params);
		return true;
	}
	
	/**
	 * ユーザ削除
	 */
	public function deleteUser($id) {
		$sql = "
			DELETE FROM
				users
			WHERE
				id = :id
		";
		
		$params = [
			[":id", $id, PDO::PARAM_INT]
		];
		
		$this->executeSql($sql, $params);
		return true;
	}
}