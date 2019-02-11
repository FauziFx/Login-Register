<?php  

class Session{

	public static function exists($nama)
	{
		return (isset($_SESSION[$nama])) ? true : false;
	}

	public static function set($user, $nilai)
	{
		return $_SESSION[$user] = $nilai;
	}

	public static function get($nama)
	{
		return $_SESSION[$nama];
	}

}

?> 