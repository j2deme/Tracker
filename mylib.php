<?php
function spanish_months($num){
    switch($num){
        case 1: $month = "Enero"; break;
        case 2: $month = "Febrero"; break;
        case 3: $month = "Marzo"; break;
        case 4: $month = "Abril"; break;
        case 5: $month = "Mayo"; break;
        case 6: $month = "Junio"; break;
        case 7: $month = "Julio"; break;
        case 8: $month = "Agosto"; break;
        case 9: $month = "Septiembre"; break;
        case 10: $month = "Octubre"; break;
        case 11: $month = "Noviembre"; break;
        case 12: $month = "Diciembre"; break;
    }
    return $month;
}

function array2object($array) {
    if(!is_array($array)) {
        return $array;
    }   
    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            $object->$name = arrayToObject($value);
         }
      }
      return $object; 
    }
    else {
      return FALSE;
    }
}

function makeObjects($data) {
    $object = (object) $data;
	foreach ($object as $property) {
        if(is_array($property))
        	$this->makeObjects($property);
    }
	return $object;
}
?>
