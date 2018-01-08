<?php
$arr = [99,23,-11,55,321,-111,66];

//rearrange an array in ascending order
function bubblesort(array &$arr){
	$len = count($arr);
	for($i = 0; $i < $len; $i++){
		for($j = 0; $j < $len-$i-1; $j++){
			if($arr[$j] > $arr[$j+1]){
				$tmp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $tmp;
			}
		}
	}
}

bubblesort($arr);
var_dump($arr);

function selectionsort(array &$arr){
	$len = count($arr);
	for($i = 0; $i < $len-1; $i++){
		//initializing the reference index as original minimum point
		$min = $i;
		for($j = $i+1; $j < $len; $j++){
			while($arr[$j] < $arr[$min]){
				//if following array value is less than originally assigned min value, swap index
				$min = $j;
			}
		}
		//if final min index is not original one, swap array value
		if($min !== $i){
			$tmp = $arr[$min];
			$arr[$min] = $arr[$i];
			$arr[$i] = $tmp;
		}
	}
}

selectionsort($arr);
var_dump($arr);

function insertionsort(array &$arr){
	$len = count($arr);
	for($i = 1; $i < $len; $i++){
		//initializing the array value to be inserted 
		$key = $arr[$i];
		for($j = $i-1; $j >= 0; $j--){
			//compare the array values before the inserted array, if smaller,remain, if larger, insert the smaller key in front
			while($arr[$j] > $key){
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $key;
			}
		}
	}
}

insertionsort($arr);
var_dump($arr);

function quicksort(array &$arr, int $low, int $high){
	if($low < $high){
		$q = partition($arr, $low, $high);
		//recursively partition the left of pivot and right of pivot until every array has only one element
		quicksort($arr, $low, $q);
		quicksort($arr, $q+1, $high);
	}
}

function partition(array &$arr,int $low, int $high){
	//setting the lower index as pivot
	$pivot = $arr[$low];
	$x = $low-1;
	$y = $high+1;
	while(1){
		do{//if the left of pivot is smaller,ignore and move on
			$x++;
		}while($arr[$x] < $pivot && $arr[$x] !== $pivot);
		do{//if the right of pivot is larger,ignore and move on
			$y--;
		}while($arr[$y] > $pivot && $arr[$y] !== $pivot);
		//if after swapping left of pivot is equal to right, $x and $y would be same, else swap the two
		if($x < $y){
			$tmp = $arr[$x];
			$arr[$x] = $arr[$y];
			$arr[$y] = $tmp;
		}else{
			return $x;
		}
	}
}

quicksort($arr, 0, count($arr)-1);
var_dump($arr);
