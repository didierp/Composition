<?php
class Composition {
	protected $_carbon_count;
	protected $_oxygen_count;
	protected $_hydrogen_count;
	public function setCarbonCount($value) {
		$this->_carbon_count = $value;
		return $this;
	}
	public function setOxygenCount($value) {
		$this->_oxygen_count = $value;
		return $this;
	}
	public function setHydrogenCount($value) {
		$this->_hydrogen_count = $value;
		return $this;
	}
	public function compute(){
		$compositions = [];
		$insaturation = $this->insaturationCount();	
		return ['compositions' => $compositions, 'insaturation' => $insaturation];
	}
	public function insaturationCount(){
		$insaturation = 0;
		//CxH2x+2
		$hydrogen_count_max = ($this->_carbon_count * 2) + 2;
		$hydrogen_count_missing = $hydrogen_count_max - $this->_hydrogen_count;
		$insaturation = intval($hydrogen_count_missing / 2);
		file_put_contents('resolve.log', "\n" . print_r([$hydrogen_count_max, $hydrogen_count_missing, $insaturation], true) , FILE_APPEND);		
		if ($hydrogen_count_missing == $insaturation * 2) {
			return $insaturation;
		} else {
			return null;
		}
	}
}
$timestamp_debut = microtime(true);
$composition = new Composition();
$compositions = $composition
			->setCarbonCount($_REQUEST['carbon_count'])
			->setOxygenCount($_REQUEST['oxygen_count'])
			->setHydrogenCount($_REQUEST['hydrogen_count'])
			->compute();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
header('Content-Type: application/json');
echo json_encode([
'ms' => $difference_ms, 
'count' => count($compositions['compositions']), 
'compositions' => $compositions['compositions'], 
'insaturation' => $compositions['insaturation']]);
