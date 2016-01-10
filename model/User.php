<?php

require_once(dirname(__FILE__) . "/Db.php");

/**
 * Userクラス
 */
class User extends Db
{
	/**
	 * ユーザ一覧取得
	 */
	public function getIndex() {
		$sql = "
			SELECT
				id,
				name,
				email,
				created,
				modified
			FROM
				users
			ORDER BY
				id ASC
		";
		$this->executeSql($sql);
		return $this->fetchDatabase();
	}
	
	/**
	 * ユーザ取得
	 */
	public function getUser($id) {
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
					email,
					created,
					modified
				) VALUES (
					:name,
					:email,
					now(),
					now()
				)
		";
		$params = [
			[":name", $post['name'], PDO::PARAM_STR],
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
				email = :email,
				modified = now()
			WHERE
				id = :id
		";
		$params = [
			[":name", $post['name'], PDO::PARAM_STR],
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