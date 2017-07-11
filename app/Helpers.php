<?php 

namespace App;

class Helpers {
		public static function ornull($element){
			if(isset($element)){return $element;}else{return null;}
		}
		public static function get_list($list){
			foreach($list as $item){
				$array[$item->id_docente] = $item->nombres." ".$item->apellidos;
			}
			return $array;
		}

		public static function get_ciclos($list){
			foreach($list as $item){
				$array[$item->id_ciclo] = $item->ciclo;
			}
			return $array;
		}
		public static function get_courses($list){
			foreach($list as $item){
				$array[$item->id_curso] = $item->nombre_curso;
			}
			return $array;
		}
		public static function get_types($list){
			foreach($list as $item){
				$array[$item->id_tipo] = $item->descripcion;
			}
			return $array;
		}
		public static function filerand() { 
		    $s = strtoupper(md5(uniqid(rand(),true))); 
		    $guidText = 
		        substr($s,0,8) . '-' . 
		        substr($s,8,4) . '-' . 
		        substr($s,12,4). '-' . 
		        substr($s,16,4). '-' . 
		        substr($s,20); 
		    return $guidText;
		}
}