<?php
include_once __DIR__."/../models/book.php";
class BookController extends Book{
    public function getAllBooks(){
        return $this->getBookList();
    }
    public function addNewBook($name,$category,$auther,$image,$pdf,$date){
        return $this->createNewBook($name,$category,$auther,$image,$pdf,$date);
    }
    public function getBook($id){
        return $this->getBookInfo($id);
    }
    // public function updateCustomer($cid,$name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$postal,$report,$credit){
    //     return $this->updateCustomerInfo($cid,$name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$postal,$report,$credit);
    // }
    public function deleteBook($id){
        return $this->deleteBookInfo($id);
    }
}

?>