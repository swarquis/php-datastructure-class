<<<<<<< HEAD
<?php
interface Stack{
	public function isEmpty();
	public function push(string $data);
	public function pop();
	public function top();
}
class DsArrayStack implements Stack{
	private $arr = null;
	private $countElem = 0;
	private $limit = 0;
	public function __construct(array $arr, int $limit){
		$this->$arr = $arr;
	}

	public function isEmpty(){
		return $this->countElem === 0;
	}

	public function push(string $data){
		if($this->limit > $this->countElem){
			array_push($this->arr, $data);
			$this->countElem++;
		}else{
			throw new Exception("stack is full,cannot push!");
		}
		
	}

	public function pop(){
		if(!$this->isEmpty()){
			array_pop($this->arr);
			$this->countElem--;	
		}else{
			throw new Exception("stack is empty, cannot pop!");
		}
	}

	public function top(){
		if(!$this->isEmpty()){
			return end($this->arr);
		}else{
			throw new Exception("stack is empty, no elements to display!");
		}
	}
}

interface Queue{
	public function isEmpty();
	public function enqueue(string $data);
	public function dequeue();
	public function peek();
}


class DsArrayQueue implements Queue{
	private $arr = [];
	private $countElem = 0;

	public function isEmpty(){
		return $this->countElem === 0;
	}

	public function enqueue(string $data){
		array_push($this->arr, $data);
		$this->countElem++;
	}

	public function dequeue(){
		if(!$this->isEmpty()){
			array_shift($this->arr);
			$this->countElem--;
		}else{
			throw new Exception("empty queue, cannot get element!");
		}
	}

	public function peek(){
		return reset($this->arr);
	}
}


$queue = new DsArrayQueue();
try{
	$queue->dequeue();
	var_dump($queue->peek());//33
}catch(Exception $e){
	echo $e->getMessage();
}

=======
<?php
interface Stack{
	public function isEmpty();
	public function push(string $data);
	public function pop();
	public function top();
}
class DsArrayStack implements Stack{
	private $arr = null;
	private $countElem = 0;
	private $limit = 0;
	public function __construct(array $arr, int $limit){
		$this->$arr = $arr;
	}

	public function isEmpty(){
		return $this->countElem === 0;
	}

	public function push(string $data){
		if($this->limit > $this->countElem){
			array_push($this->arr, $data);
			$this->countElem++;
		}else{
			throw new Exception("stack is full,cannot push!");
		}
		
	}

	public function pop(){
		if(!$this->isEmpty()){
			array_pop($this->arr);
			$this->countElem--;	
		}else{
			throw new Exception("stack is empty, cannot pop!");
		}
	}

	public function top(){
		if(!$this->isEmpty()){
			return end($this->arr);
		}else{
			throw new Exception("stack is empty, no elements to display!");
		}
	}
}

interface Queue{
	public function isEmpty();
	public function enqueue(string $data);
	public function dequeue();
	public function peek();
}


class DsArrayQueue implements Queue{
	private $arr = [];
	private $countElem = 0;

	public function isEmpty(){
		return $this->countElem === 0;
	}

	public function enqueue(string $data){
		array_push($this->arr, $data);
		$this->countElem++;
	}

	public function dequeue(){
		if(!$this->isEmpty()){
			array_shift($this->arr);
			$this->countElem--;
		}else{
			throw new Exception("empty queue, cannot get element!");
		}
	}

	public function peek(){
		return reset($this->arr);
	}
}


$queue = new DsArrayQueue();
try{
	$queue->dequeue();
	var_dump($queue->peek());//33
}catch(Exception $e){
	echo $e->getMessage();
}

>>>>>>> 1eb83830081b1a658b84d50fd96ebc1ff1e0b466
