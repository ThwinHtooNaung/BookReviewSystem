<?php
include_once __DIR__."/../vendor/db.php";
class Book{
    public function getBookList(){
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2. sql statementfa
        $sql="SELECT book.id, book.name,book.image,book.pdf_file, category.name as category_name, auther.name as auther_name
        FROM book 
        INNER JOIN category ON book.category_id = category.id
        INNER JOIN auther ON book.auther_id = auther.id ";
        $statement=$this->connection->prepare($sql);
        //3. execute
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function createNewBook($name,$category,$auther,$image,$pdf,$date){
        //1.DB connection
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="INSERT INTO book( name, category_id, auther_id, date, image, pdf_file) VALUES
        (:name,:category_id,:auther_id,:date,:image,:pdf_file)";
        $statement=$this->connection->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":category_id",$category);
        $statement->bindParam(":auther_id",$auther);
        $statement->bindParam(":date",$date);
        $statement->bindParam(":image",$image);
        $statement->bindParam(":pdf_file",$pdf);
        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function getBookInfo($id){
        $this->connection=Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT book.id, book.name, category.name as category_name, auther.name as auther_name,book.image,book.pdf_file
        FROM book 
        INNER JOIN category ON book.category_id = category.id
        INNER JOIN auther ON book.auther_id = auther.id where book.id=:id";
        $statement = $this->connection->prepare($sql);

        $statement->bindParam(":id",$id);

        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    // public function updateCustomerInfo($cid,$name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$postal,$report,$credit){
    //     $this->connection=Database::connect();
    //     $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //     $sql="UPDATE customers SET  customerName = :name, contactFirstName = :firstname, contactLastName=:lastname,
    //     phone = :phone, addressLine1 = :address1, addressLine2 = :address2, city = :city, state = :state,
    //     postalCode = :postalCode, country = :country, salesRepEmployeeNumber = :report, creditLimit =:credit  WHERE customerNumber=:id;
    //     ";
    //     $statement=$this->connection->prepare($sql);
    //     $statement->bindParam(":name",$name);
    //     $statement->bindParam(":firstname",$firstname);
    //     $statement->bindParam(":lastname",$lastname);
    //     $statement->bindParam(":phone",$phone);
    //     $statement->bindParam(":address1",$address1);
    //     $statement->bindParam(":address2",$address2);
    //     $statement->bindParam(":city",$city);
    //     $statement->bindParam(":state",$state);
    //     $statement->bindParam(":postalCode",$postal);
    //     $statement->bindParam(":country",$country);
    //     $statement->bindParam(":report",$report);
    //     $statement->bindParam(":credit",$credit);
    //     $statement->bindParam(":id",$cid);
    //     if($statement->execute()){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
    public function deleteBookInfo($id){
        
            $this->connection = Database::connect();
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "delete from book where id=:id";

            $statement = $this->connection->prepare($sql);
            $statement->bindParam(":id", $id);

            if($statement->execute())
        return "success";
        else
        return "fail";
        
    }

}
?>