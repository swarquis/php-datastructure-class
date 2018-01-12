<?php
function binarysearch(array $arr, int $needle){
	$low = 0;
	$high = count($arr)-1;
	
	while($low <= $high){
		$mid = (int)(($low+$high)/2);
		if($arr[$mid] > $needle){
			$high = $mid-1;
		}else if($arr[$mid] < $needle){
			$low = $mid+1;
		}else{
			return true;
		}
	}
	return false;
	
}

function binarysearch_re(array $arr, int $needle, int $low, int $high){
	$mid = (int)(($low+$high)/2);
	while($low <= $high){
		if($arr[$mid] > $needle){
		return binarysearch_re($arr, $needle, $low, $mid-1);
	}else if($arr[$mid] < $needle){
		return binarysearch_re($arr, $needle, $mid+1, $high);
	}else{
		return true;
	}
	}
	return false;
}

$arr = range(1,100,20);
var_dump($arr);
var_dump(binarysearch($arr, 21));
var_dump(binarysearch_re($arr, 22, 0, count($arr)-1));