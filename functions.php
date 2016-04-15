<?php
/*
class Node{

	function __construct($element)
    {
        $this->element = $element;
        $this->next = NULL;
    }

}

class LList{

	function __construct()
    {
        $this->head = new Node("head");
    }

    public function find($item){
		$currNode = $this->head;
		while($currNode->element!=$item){
			$currNode = $currNode->next;
		}
		return $currNode;
	}

	public function insert($newElement,$item){
		$newNode = new Node($newElement);
		$current = $this->find($item);
		$newNode->next = $current->next;
		$current->next = $newNode;
	}

	public function display(){
		$currNode = $this->head;

		while(!($currNode->next==null)){
			print($currNode->next->element);
			$currNode = $currNode->next;
		}
	}
	
}
*/