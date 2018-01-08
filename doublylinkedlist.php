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
	public $prev = null;
	public $next = null;

	public function __construct(string $data){
		$this->data = $data;
		$this->prev = null;
		$this->next = null;
	}
}

class DoublyLinkedList implements iList{
	private $head = null;
	private $tail = null;
	private $num = 0;

	public function isEmpty(){
		return ($this->num === 0);
	}

	//add data in front of current head element
	public function addBeforeHead(string $data){
		$newnode = new Node($data);
		if($this->isEmpty()){
			$this->head = &$newnode;
			$this->tail = $newnode;
		}else{
			$tmpNode = $this->head;
			$this->head = &$newnode;
			$newnode->next = $tmpNode;
			$tmpNode->prev = $this->head;
		}
		$this->num++;
	}

	//add data after current end element
	public function addAfterEnd(string $data){
		$newnode = new Node($data);
		if($this->isEmpty()){
			$this->head = &$newnode;
			$this->tail = $newnode;
		}else{
			$tmpnode = $this->tail;
			$this->tail = $newnode;
			$tmpnode->next = $newnode;
			$newnode->prev = $tmpnode;
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
			$tmpnode->next->prev = null;
			$this->num--;
			return $tmpnode->data;
		}
	}

	public function delEnd(){
		if($this->isEmpty()){
			throw new Exception('no element to be deleted!');
		}else{
			$tmpnode = $this->tail;
			$prev = $this->tail->prev;
			$this->tail = $prev;
			$prev->next = null;
			$this->num--;
			return $tmpnode->data;
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
			$this->tail = $newnode;
			$this->num++;
		}else{
			$tmpnode = $this->head;
			while($tmpnode !== null){
				$count++;
				$prev =$tmpnode->prev;
				if($count == ($index)){
					$tmpnode->prev = $newnode;
					$newnode->next = $tmpnode;
					$prev->next = $newnode;
					$newnode->prev = $prev;
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
			$this->tail = $newnode;
			$this->num++;
		}else{
			$tmpnode = $this->head;
			while($tmpnode !== null){
				$count++;
				
				if($count == $index){
					$tmp = $tmpnode->next;
					$tmpnode->next = $newnode;
					$newnode->prev = $tmpnode;
					$newnode->next = $tmp;
					$tmp->prev = $newnode;
					break;
				}
				$tmpnode = $tmpnode->next;
			}
			$this->num++;
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
				$tmpnode = $tmpnode->next;
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

		}else{
			return false;
		}
	}

	public function reverseTraverse(){
		if(!$this->isEmpty()){
			$tmpNode = $this->tail;
			while($tmpNode !== null){
				echo $tmpNode->data."\n";
				$tmpNode = $tmpNode->prev;
			}

		}else{
			return false;
		}
	}

}

$dll = new DoublyLinkedList;
$dll->addBeforeHead('111');
$dll->addBeforeHead('222');
$dll->addBeforeHead('333');
$dll->addAfterEnd('a');
$dll->addAfterEnd('b');
//$dll->traverse();
//$dll->reverseTraverse();
//var_dump($dll->delHead());
//var_dump($dll->delHead());
//var_dump($dll->delEnd());
$dll->insertBefore('i1', 1);
$dll->insertAfter('i2', 3);
$dll->traverse();
$dll->reverseTraverse();
$dll->query('aa');
try{
	$dll->locate(3);
}catch(Exception $e){
	echo $e->getMessage();
}