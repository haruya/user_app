<?php

class Validate
{
	/**
	 * 空文字チェック
	 */
	public static function checkNotEmpty($param) {
		if (!empty($param)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 最大文字数チェック
	 * 第一引数：対象文字
	 * 第二引数：最大文字数
	 */
	public static function checkMaxLength($param, $maxLength) {
		if (mb_strlen($param, "UTF-8") <= $maxLength) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 文字数範囲チェック
	 */
	public static function checkBetweenLength($param, $minLength, $maxLength) {
		if (mb_strlen($param, "UTF-8") >= $minLength && mb_strlen($param, "UTF-8") <= $maxLength) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * メールアドレス書式チェック
	 */
	public static function checkEmail($param) {
		if (filter_var($param, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}
}