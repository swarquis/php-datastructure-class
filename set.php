<?php

interface iSet{
	public function isEmpty();
	public function hasKey($data);
	public function add($data);
	public function remove($data);
}
class Set implements iSet{
	private $set = [];
	private $count = 0;

	public function __construct(){
		$this->set = array();
	}

	public function isEmpty(){
		return $this->count === 0;
	}

	public function hasKey($data){
		if(!$this->isEmpty()){
			return array_key_exists($data, $this->set);
		}else{
			return false;
		}
	}

	public function add($data){
		if(!$this->hasKey($data)){
			$this->set[$data] = $data;
			$this->count++;
		}else{
			return false;
		}
	}
	
	public function remove($data){
		if($this->hasKey($data)){
			unset($this->set[$data]);
			$this->count--;
			return true;
		}else{
			return false;
		}
	}

	public function traverse(){
		if(!$this->isEmpty()){
			//array_values($this->set);
			foreach($this->set as $k=>$v){
				echo $k." : ".$v."\n";
			}
			return true;
		}else{
			return false;
		}
	}

	public function union(Set $set){
		if($set->isEmpty()){
			return $this->set;
		}else{
			$tmp = $this->set;
			foreach($set->set as $k=>$v){
				if($this->hasKey($k)){
					continue;
				}else{
					$tmp[$k] = $k;
					//$tmp->count++; 
				}
			}
			return $tmp;
		}
	}

	public function intersect(Set $set){
		if($set->isEmpty()){
			return $this->set;
		}else{
			$tmp = array();
			//array_uintersect() 
			foreach($set->set as $k=>$v){
				if(!$this->hasKey($k)){
					continue;
				}else{
					$tmp[$k] = $k;
				}
			}
			return $tmp;
		}
	}

	/**
	 * 在this中而不在set中的元素
	 * 注释说明
	 * @param  Set    $set [description]
	 * @return [type]      [description]
	 */
	public function diff(Set $set){
		if($set->isEmpty()){
			return $this->set;
		}else{
			$tmp = $this;
			foreach($set as $k=>$v){
				if($this->hasKey($k)){
					$tmp->remove($k);
				}
			}
			return $tmp->set;
		}
	}

	public function isSubset(Set $set){
		if($set->isEmpty()){
			return false;
		}else{
			$flag = false;
			foreach($this->set as $k=>$v){
				if($set->hasKey($k)){
					$flag = true;
					continue;
				}
				$flag = false;
				break;
			}
			return $flag;
		}
	}

}

$set = new Set;
$set->add(11);
$set->add('aaa');
$set->add('da123');
/*$set->traverse();
$set->remove('aaa');
$set->traverse();
var_dump($set->hasKey(11));*/
$set2 = new Set;
$set2->add(22);
$set2->add('aaaa');
$set3 = new Set;
$set3->add(22);
$set3->add('aaaa');
$set3->add('aaaa1');
var_dump($set->union($set2));
var_dump($set->intersect($set2));
var_dump($set2->diff($set));
var_dump($set2->isSubset($set3));
