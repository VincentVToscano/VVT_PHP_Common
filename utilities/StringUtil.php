<?php

	/**
	 * Created by Vincent V. Toscano
	 * Date: 6/22/15
	 * Time: 11:11 AM
	 */
	class StringUtil {
		/**
		 * rmHTMLEntitiesFromStr --- Remove HTML entities. Use this instead of strip_tags if you want to replace with a space
		 * @param $stringToCheck
		 * @return mixed|string
		 */
		public static function rmHTMLEntitiesFromStr($stringToCheck) {
			// ----- remove HTML TAGs -----
			$stringToCheck = preg_replace('/<[^>]*>/', ' ', $stringToCheck);

			// ----- remove control characters -----
			$stringToCheck = str_replace("\r", '', $stringToCheck);    // --- replace with empty space
			$stringToCheck = str_replace("\n", ' ', $stringToCheck);   // --- replace with space
			$stringToCheck = str_replace("\t", ' ', $stringToCheck);   // --- replace with space

			// ----- remove multiple spaces -----
			$stringToCheck = trim(preg_replace('/ {2,}/', ' ', $stringToCheck));
			return $stringToCheck;
		}

		/**
		 * urlEncode -- Works just like encodeURI in JavaScript but also replaces %20 with hyphens and uses lowercase for all String characters except for encoding characters
		 * @param $uri
		 * @return mixed
		 */
		public static function urlEncode($uri) {
			return str_replace('%20', '-', preg_replace_callback("{[^0-9a-z_.!~*'();,/?:@&=+$#]}i", function ($m) {
				return sprintf('%%%02X', ord($m[0]));
			}, strtolower($uri)));
		}

		/**
		 * replaceContentBetweenDelimiters --- Replace all of the content between two delimiters
		 * @param String $start		Start String delimiter.
		 * @param String $end		End String delimiter.
		 * @param String $new		New content.
		 * @param String $original	Original or source content.
		 * @return mixed
		 */
		public static function replaceContentBetweenDelimiters($start, $end, $new, $original) {
			return preg_replace(';('.preg_quote($start).')(.*?)('.preg_quote($end).');si', '$1'.$new.'$3', $original);
		}
	}