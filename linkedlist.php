<?php

interface iList{
	public function isEmpty();
	public function addBeforeHead(string $data);
	public function addAfterEnd(string $data);
	public function delHead();
	public function delEnd();
	public function insertBefore(string $data, int $index);
	public function insertAfter(string $data, int $index);
	public function query(string $data);
	public function locate(int $index);
	public function traverse();
}
class Node{
	public $data = '';
	public $next = null;//points to next node

	//initialize a node
	public function __construct(string $data = ''){
		$this->data = $data;
		$this->next = $next;
	}
}

class LinkedList implements iList{
	//list with 0 elements and no data;
	private $head = null;
	private $num = 0;

	public function isEmpty(){
		return $this->head === null;
	}

	//add data in front of current head element
	public function addBeforeHead(string $data){
		$newnode = new Node($data);
		if($this->isEmpty()){
			$this->head = &$newnode;
		}else{
			$tmpNode = $this->head;
			$this->head = &$newnode;
			$newnode->next = $tmpNode;
		}
		$this->num++;
	}

	//add data after current end element
	public function addAfterEnd(string $data){
		$newnode = new Node($data);
		if($this->isEmpty()){
			$this->head = &$newnode;
		}else{
			$tmpnode = $this->head;
			//locate end node
			while($tmpnode->next !== null){
				$tmpnode = $tmpnode->next;
			}
			$tmpnode->next = $newnode;
			$newnode->next = null;
		}
		$this->num++;
	}

	public function delHead(){
		if($this->isEmpty()){
			throw new Exception('no element to be deleted!');
		}else{
			$tmpnode = $this->head;
			$this->head = $tmpnode->next;
			$this->num--;
			return $tmpnode->data;
		}
	}

	public function delEnd(){
		if($this->isEmpty()){
			throw new Exception('no element to be deleted!');
		}else{
			$tmpnode = $this->head;
			while($tmpnode->next->next !== null){
				$tmpnode = $tmpnode->next;
			}
			$end = $tmpnode->next;
			$tmpnode->next = null;
			$this->num--;
			return $end->data;
		}
	}

	public function insertBefore(string $data, int $index){
		$newnode = new Node($data);
		$count = 0;
		if($index <= 1){
			$this->addBeforeHead($data);
		}else if($index > $this->num){
			$this->addAfterEnd($data);
		}else if($this->isEmpty()){
			$this->head = &$newnode;
			$this->num++;
		}else{
			$tmpnode = $this->head;
			while($tmpnode !== null){
				$count++;
				$next = $tmpnode->next;
				if($count == ($index-1)){
					$tmpnode->next = $newnode;
					$newnode->next = $next;
					break;
				}
				$tmpnode = $tmpnode->next;
				$this->num++;
			}
		}
	}

	public function insertAfter(string $data, int $index){
		$newnode = new Node($data);
		$count = 0;
		if($index <= 1){
			$this->addBeforeHead($data);
		}else if($index > $this->num){
			$this->addAfterEnd($data);
		}else if($this->isEmpty()){
			$this->head = &$newnode;
			$this->num++;
		}else{
			$tmpnode = $this->head;
			while($tmpnode !== null){
				$count++;
				$next = $tmpnode->next;
				if($count == ($index)){
					$tmpnode->next = $newnode;
					$newnode->next = $next;
					break;
				}
				$tmpnode = $tmpnode->next;
				$this->num++;
			}
		}
	}

	public function query(string $data){
		if($this->isEmpty()){
			throw new Exception("empty list cannot be searched!");
		}else{
			$tmpnode = $this->head;
			while($tmpnode !== null){
				if($tmpnode->data === $data){
					echo "Found";
					return;
				}
				$tmpnode = $tmpnode->next;
			}
			echo "Data Unavailable!";
		}

	}

	public function locate(int $index){
		if($this->isEmpty() || $index < 1 || $index > $this->num){
			throw new Exception("invalid range of  list!");
		}else{
			$count = 0;
			$tmpnode = $this->head;
			while($tmpnode !== null){
				$count++;
				if($count == $index){
					echo $tmpnode->data;
					return;
				}
			}

		}
	}

	public function traverse(){
		if(!$this->isEmpty()){
			$tmpNode = $this->head;
			while($tmpNode !== null){
				echo $tmpNode->data."\n";
				$tmpNode = $tmpNode->next;
			}

		}
	}
}

$linkedlist = new LinkedList;
$linkedlist->addBeforeHead('aaa');
$linkedlist->addBeforeHead('bbb');
$linkedlist->addBeforeHead('ccc');
$linkedlist->addBeforeHead('111');
$linkedlist->addBeforeHead('222');
$linkedlist->traverse();//222 111 ccc bbb aaa
$linkedlist->addAfterEnd('333');
$linkedlist->insertBefore('i1',2);
$linkedlist->insertAfter('i2',3);
$linkedlist->traverse();//222 i1 111 ccc bbb aaa 333
/*var_dump($linkedlist->delHead());//222
var_dump($linkedlist->delHead());//111
var_dump($linkedlist->delEnd());//333
var_dump($linkedlist->delEnd());//aaa*/
$linkedlist->query("aa");
try{
	$linkedlist->locate(21);
}catch(Exception $e){
	echo $e->getMessage();
}