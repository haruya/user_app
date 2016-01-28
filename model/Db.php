<?php

/**
 * DBクラス
 */
class Db
{
	private $dbCon; // DBハンドラー
	private $stmt;
	
	public function __construct() {
		try {
			$this->dbCon = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
			$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			exit($e->getMessage());
		}
	}
	
	/**
	 * プリペア&エクスキュート(プリペアする値がない場合が$paramsに値は入れない)
	 */
	protected function executeSql($sql, $params = null) {
		$this->stmt = $this->dbCon->prepare($sql);
		if (!is_null($params)) {
			foreach ($params as $p) {
				$this->stmt->bindValue($p[0], $p[1], $p[2]);
			}
		}
		return $this->stmt->execute();
	}
	
	/**
	 * すべての結果行を含む配列を返す(添字はフィールド名)
	 */
	protected function fetchDatabase() {
		$ar = array();
		$ar = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		return !empty($ar) ? $ar : false;
	}
	
	/**
	 * UPDATE, INSERT, DELETEで更新された行数を取得するメソッド
	 * UPDATEの場合は更新内容が更新前と同じだとrowCountは0を返してくるので要注意
	 */
	protected function getRowCount() {
		return $this->stmt->rowCount();
	}
	
	/**
	 * 直近にINSERTされたデータのIDを取得する
	 */
	protected function getLastInsertId() {
		return $this->dbCon->lastInsertId();
	}
	
	/**
	 * トランザクション開始
	 */
	protected function beginTransaction() {
		$this->dbCon->beginTransaction();
	}
	
	/**
	 * トランザクションコミット
	 */
	protected function commit() {
		$this->dbCon->commit();
	}
	
	/**
	 * トランザクションロールバック
	 */
	protected function rollBack() {
		$this->dbCon->rollBack();
	}
	
	/**
	 * エラー出力
	 */
	protected function errorInfo() {
		return $this->stmt->errorInfo();
	}
}