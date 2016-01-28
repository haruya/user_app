<?php
/**
 * オートロード
 */
spl_autoload_register(function($classname) {
	require dirname(__FILE__) . "/../model/" . $classname . ".php";
});

/**
 * ユーザ登録or編集バリデーション
 */
function userValidate($post) {
	$error = array();
	// 名前チェック
	if (!Validate::checkNotEmpty($post['name'])) {
		$error[] = '名前は入力必須です';
	} else if (!Validate::checkMaxLength($post['name'], 64)) {
		$error[] = '名前は64文字以内で入力してください。';
	}
	
	if (!Validate::checkNotEmpty($post['password'])) {
		$error[] = 'パスワードは入力必須です';
	} else if (!Validate::checkBetweenLength($post['password'], 4, 32)) {
		$error[] = 'パスワードは4文字～32文字以内で入力してください。';
	}
	
	// メールアドレスチェック
	if (!Validate::checkNotEmpty($post['email'])) {
		$error[] = 'メールアドレスは入力必須です。';
	} else if (!Validate::checkMaxLength($post['email'], 100)) {
		$error[] = 'メールアドレスは100文字以内で入力してください。';
	} else if (!Validate::checkEmail($post['email'])) {
		$error[] = 'メールアドレスを正しい形式で入力してください。';
	}
	
	if (!empty($error)) {
		return $error;
	} else {
		return null;
	}
	
}