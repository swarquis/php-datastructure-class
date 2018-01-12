<?php

class BinaryNode{
	public $data = '';
	public $left = null;
	public $right = null;
	public function __construct(string $data){
		$this->data = $data;
		$this->left = null;
		$this->right = null;
	}

	public function addChildren(BinaryNode $left, BinaryNode $right){
		$this->left = $left;
		$this->right = $right;
	}
}

class BinaryTree{
	public $root = null;
	public function __construct(BinaryNode $root){
		$this->root = $root;
	}

	public function isEmpty(){
		return ($this->root === null);
	}
	public function traverse(BinaryNode $node, int $level = 0){
		if(!$this->isEmpty()){
			if($node){
				echo str_repeat('-',$level).$node->data." ";
			}
			if($node->left){
				$this->traverse($node->left, $level+1);
			}
			if($node->right){
				$this->traverse($node->right, $level+1);
			}
		}
	}
}

$final = new BinaryNode("Final");
$tree = new BinaryTree($final);
$semiFinal1 = new BinaryNode("Semi Final 1");
$semiFinal2 = new BinaryNode("Semi Final 2");
$quarterFinal1 = new BinaryNode("Quarter Final 1");
$quarterFinal2 = new BinaryNode("Quarter Final 2");
$quarterFinal3 = new BinaryNode("Quarter Final 3");
$quarterFinal4 = new BinaryNode("Quarter Final 4");
$semiFinal1->addChildren($quarterFinal1, $quarterFinal2);
$semiFinal2->addChildren($quarterFinal3, $quarterFinal4);
$final->addChildren($semiFinal1, $semiFinal2);
$tree->traverse($tree->root);