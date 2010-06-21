<?php
Class Dase_Util 
{
	function __construct() {}

	public static function getVersion()
	{
		$ver = explode( '.', PHP_VERSION );
		return $ver[0] . $ver[1] . $ver[2];
	}

	//from http://us3.php.net/readfile
	public static function readfileChunked ($filename) {
		$chunksize = 1*(1024*1024); // how many bytes per chunk
		$buffer = '';
		$handle = fopen($filename, 'rb');
		if ($handle === false) {
			return false;
		}
		while (!feof($handle)) {
			$buffer = fread($handle, $chunksize);
			print $buffer;
		}
		return fclose($handle);
	} 

	//todo: work on this:
	public static function isUrl($str)
	{
		if ('http://' == substr($str,0,7) || 'https://' == substr($str,0,8)) {
			return true;
		} else {
			return false;
		}
	}

	public static function unhtmlspecialchars( $string )
	{
		$string = str_replace ( '&#039;', '\'', $string );
		$string = str_replace ( '&quot;', '"', $string );
		$string = str_replace ( '&lt;', '<', $string );
		$string = str_replace ( '&gt;', '>', $string );
		//this needs to be last!!
		$string = str_replace ( '&amp;', '&', $string );
		return $string;
	}

	public static function stripInvalidXmlChars( $in ) {
		$out = "";
		$length = strlen($in);
		for ( $i = 0; $i < $length; $i++) {
			$current = ord($in{$i});
			if (($current == 0x9) ||
				($current == 0xA) || 
				($current == 0xD) || 
				($current >= 0x20 && $current <= 0xD7FF) || 
				($current >= 0xE000 && $current <= 0xFFFD) || 
				($current >= 0x10000 && $current <= 0x10FFFF)
			){
				$out .= chr($current);
			} else{
				$out .= " ";
			}
		}
		return $out;
	}

	public static function getTime()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}

	public static function camelize($str)
	{
		$str = trim($str,'_');
		if (false === strpos($str,'_')) {
			return ucfirst($str);
		} else {
			return str_replace(' ','',ucwords(str_replace('_',' ',$str)));
			//too clever:
			//$set = explode('_',$str);
			//array_walk($set, create_function('&$v,$k', '$v = ucfirst($v);'));
			//return join('',$set);
		}
	}

	public static function truncate($string,$max)
	{
		if (strlen($string) <= $max) {
			return $string;
		}
		return substr($string,0,$max);
	}

	public static function dirify($str)
	{
		$str = strtolower(preg_replace('/[^a-zA-Z0-9_-]/','_',trim($str)));
		return preg_replace('/__*/','_',$str);
	}

	public static function makeSerialNumber($str)
	{
		if ($str) {
			//get just the last segment if it includes directory path
			$str = array_pop(explode('/',$str));
			$str = preg_replace('/[^a-zA-Z0-9_-]/','_',trim($str));
			$str = trim(preg_replace('/__*/','_',$str),'_');
			return Dase_Util::truncate($str,50);
		} else {
			return null;
		}
	}

	public static function sortByTitle($a,$b)
	{
		$a_str = strtolower($a->title);
		$b_str = strtolower($b->title);
		if ($a_str == $b_str) {
			return 0;
		}
		return ($a_str < $b_str) ? -1 : 1;
	}
}


