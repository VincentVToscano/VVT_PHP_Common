<?php

	/**
	 * Created by Vincent V. Toscano
	 * Date: 6/22/15
	 * Time: 11:12 AM
	 */
	class ArrayUtil {
		/**
		 * locateObjByPropertyValue --- Find the object in the array by property and value.
		 * @param $array    Array to search.
		 * @param $prop Property to check.
		 * @param $val  Value to look for.
		 * @return bool Return false if object is not found.
		 */
		public static function locateObjByPropertyValue($array, $prop, $val) {
			$item = false;
			foreach ($array as $obj) {
				if ($obj->{$prop} == $val){
					return $obj;
				}
			}
			return $item;
		}
	}