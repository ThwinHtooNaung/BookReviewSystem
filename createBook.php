<?php

include_once "layouts/sidebar.php";
include_once "controllers/Controller.php";
include_once "controllers/customerController.php";
$employee_controller=new EmployeeController();
$employee_list=$employee_controller->getAllEmployees();

if(isset($_POST['submit'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $book_name_error="You need to Fill Book Name";
        $error=true;
    }
    $category=$_POST['category'];
    $auther=$_POST['auther'];
    $image=$_POST['image'];
    $pdf=$_POST['pdf'];
    $postal=$_POST['postalCode'];
    $report=$_POST['report'];
    $credit=$_POST['creditLimit'];
    $customer_controller=new CustomerController();
    if($error==false){
        $status=$customer_controller->addNewCustomer($name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$postal,$report,$credit);
        if($status){
            echo "<script> location.href='customer.php?status=".$status."';</script>";
        }
    }
    
}
?>



<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
		<div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="form-label">Book Name</label>
                            <input type="text" name="name" id="" class="form-control" >
                            <span class='text-danger'>
                                <?php
                                    if(isset($customer_name_error)){
                                        echo $customer_name_error;
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="" class="form-select">
                                <?php
                                foreach ($category_list as $cate) {
                                    echo "<option value='".$cate['id']."'>".$emp['name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Auther</label>
                            <select name="auther" id="" class="form-select">
                                <?php
                                foreach ($auther_list as $auther) {
                                    echo "<option value='".$auther['id']."'>".$auther['name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <label for="" class="form-label">Date</label>
                            <input type="date" name="date" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-2">
                            <button name="submit" class="btn btn-success">Add</button>
                        </div>
                        <div class="col-md-2">
                            <a href="book.php" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</main>

<?php

include_once "layouts/footer.php"

?>