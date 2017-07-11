<?php 

namespace App;

class Helpers {
		public static function get_list($list){
			foreach($list as $item){
				$array[$item->id] = $item->name;
			}
			return $array;
		}

}