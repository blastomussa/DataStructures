<?php
/* PHP Double Linked List */
/* Blastomussa */

  class node {
    /* Node object for double linked list */
    public $data;
    public $next;
    public $prev;

    function __construct($data=NULL,$next=NULL,$prev=NULL) {
      $this->data = $data;
      $this->next = $next;
      $this->prev = $prev;
    }
  }

  class doubleLL {
    /*List object for double linked list*/
    public $head;

    // construct linked list
    function __construct($head=NULL) {
      $this->head = $head;
    }

    // checks for NULL list
    function isEmpty() {
      return $this->head == NULL;
    }

    // Adds Node to front of list
    function addToFront($data){
      if ($this->head == NULL) {
        $this->head = new node($data,$this->head,NULL);
      } else {
        $next = $this->head;
        $this->head = new node($data,$next,NULL);
        $next->prev = $this->head;
      }
    }

    // adds node to back of list
    function addToBack($data){
      // add to head if empty
      if ($this->head == NULL) {
        $this->head = new node($data);
      // add object to end of list
      } else {
        $curr = $this->head;
        while ($curr->next != NULL) {
          $curr = $curr->next;
          if ($curr->next == NULL) {
            $curr->next = new node($data, NULL,$curr);
            $curr = $curr->next;
          }
        }
      }
    }

    // pop node off of the front of list
    function popNode(){
      $pop = $this->head;
      $this->head = $this->head->next;
      $this->head->prev = NULL;
      return $pop;

    }

    // delete node with the nodes data as the key
    function deleteNode($key) {
      $node = $this->head;
      // check head
      if ($node != NULL){
        if ($node->data == $key) {
            $this->head = $node->next;
            $node = NULL;
            return;
        }
      }
      // check rest of list
      while ($node != NULL) {
        if ($node->data == $key) {
          break;
        }
        $prev = $node;
        $node = $node->next;
      }
      if ($node == NULL) {
        return;
      }
      $prev->next = $node->next;
      if ($prev->next->prev != NULL) {
        $prev->next->prev = $prev;
      }
      $node = NULL;
    }

    // get last object in list without removing it
    function getLast(){
      if ($this->head->next == NULL) {
        return $this->head;
      } else {
        $curr = $this->head;
        while ($curr->next != NULL) {
          $curr = $curr->next;
          if ($curr->next == NULL) {
            return $curr;
          }
        }
      }
    }

    // print linked list
    function printList(){
      while ($this->head != NULL) {
        echo $this->head->data . "<br>";
        $this->head = $this->head->next;
      }
    }

  }

  $comment1 = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
  $comment2 = "2222222222Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

  $list = new doubleLL();

?>
