<?php
	function areEmptyVariables(...$vrbles){
		$flag = false;
		foreach($vrbles as $ap){
			if(empty($ap)){
				$flag = true;
				break;
			}
		}
		return $flag;
	}

	function hasEmptyValues($array){
		$flag = false;
		foreach($array as $ap){
			if(empty($ap)){
				$flag = true;
			}
		}
		return $flag;
	}

	function areNumericVariables(...$vrbles){
		$flag = true;
		foreach($vrbles as $ap){
			if(!is_numeric($ap)){
				$flag = false;
			}
		}
		return $flag;
	}
?>