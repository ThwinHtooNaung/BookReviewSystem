<?php
include_once "layouts/sidebar.php";
include_once "controllers/BookController.php";


$cid=$_GET['id'];
$book_controller=new BookController();
$book=$book_controller->getBook($cid);
if(isset($_POST['submit'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }else{
        $customer_name_error="You need to Fill Customer Name";
        $error=true;
    }
    if(!empty($_POST['firstName'])){
        $firstname=$_POST['firstName'];
    }else{
        $firstName_error="You need to Fill First Name";
        $error=true;
    }
    if(!empty($_POST['lastName'])){
        $lastname=$_POST['lastName'];
    }else{
        $lastName_error="You need to Fill Last Name";
        $error=true;
    }
    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }else{
        $phone_error="You need to Fill Phone Number";
        $error=true;
    }
    if(!empty($_POST['address1'])){
        $address1=$_POST['address1'];
    }else{
        $address1_error="You need to Fill address1";
        $error=true;
    }
    if(!empty($_POST['creditLimit'])){
        $creditLimit=$_POST['creditLimit'];
    }else{
        $creditLimit_error="You need to Fill creditLimit";
        $error=true;
    }
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $postal=$_POST['postalCode'];
    $report=$_POST['report'];
    $credit=$_POST['creditLimit'];
    $customer_controller=new CustomerController();
    if($error==false){
        $status=$customer_controller->updateCustomer($cid,$name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$postal,$report,$credit);
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
                            <label for="" class="form-label">Customer Name</label>
                            <input type="text" name="name" id="" class="form-control" value="<?php echo $customer['customerName'] ?>">
                            <span class='text-danger'>
                                <?php
                                    if(isset($customer_name_error)){
                                        echo $customer_name_error;
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Contact Person (First Name)</label>
                            <input type="text" name="firstName" id="" class="form-control" value="<?php echo $customer['contactFirstName'] ?>">
                            <span class='text-danger'>
                                <?php
                                    if(isset($firstName_error)){
                                        echo $firstName_error;
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Contact Person (Last Name)</label>
                            <input type="text" name="lastName" id="" class="form-control" value="<?php echo $customer['contactLastName'] ?>">
                            <span class='text-danger'>
                                <?php
                                    if(isset($lastName_error)){
                                        echo $lastName_error;
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Mobile Phone</label>
                            <input type="text" name="phone" id="" class="form-control" value="<?php echo $customer['phone'] ?>">
                            <span class='text-danger'>
                                <?php
                                    if(isset($phone_error)){
                                        echo $phone_error;
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="form-label">Address Line 1</label>
                            <input type="text" name="address1" id="" class="form-control" value="<?php echo $customer['addressLine1'] ?>">
                            <span class='text-danger'>
                                <?php
                                    if(isset($address1_error)){
                                        echo $address1_error;
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Address Line 2</label>
                            <input type="text" name="address2" id="" class="form-control" value="<?php echo $customer['addressLine2'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">City</label>
                            <select name="city" id="" class="form-select">
                                <option value="Yangon">Yangon</option>
                                <option value="Mandalay">Mandalay</option>
                                <option value="Taunggyi">Taunggyi</option>
                                <option value="Magway">Magway</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">State</label>
                            <select name="state" id="" class="form-select">
                                <option value="Yangon">Yangon</option>
                                <option value="Mandalay">Mandalay</option>
                                <option value="Shan">Sahan</option>
                                <option value="Kachin">Kachin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="form-label">Postal Code</label>
                            <input type="text" name="postalCode" id="" class="form-control" value="<?php echo $customer['postalCode'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Country</label>
                            <select name="country" id="" class="form-select">
                                <option value="singapore">Singapore</option>
                                <option value="usa">USA</option>
                                <option value="france">France</option>
                                <option value="norway">Norway</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Report To</label>
                            <select name="report" id="" class="form-select">
                                <?php
                                foreach ($employee_list as $emp) {
                                    if($emp['employeeNumber']==$customer['salesRepEmployeeNumber'])
                                    echo "<option value='".$emp['employeeNumber']."' selected>".$emp['firstName']." ".$emp['lastName']."</option>";
                                    else
                                    echo "<option value='".$emp['employeeNumber']."'>".$emp['firstName']." ".$emp['lastName']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Credit Limit*</label>
                            <input type="text" name="creditLimit" id="" class="form-control" value="<?php echo $customer['creditLimit'] ?>">
                            <span class='text-danger'>
                                <?php
                                    if(isset($creditLimit_error)){
                                        echo $creditLimit_error;
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-2">
                            <button name="submit" class="btn btn-success">Update</button>
                        </div>
                        <div class="col-md-2">
                            <a href="customer.php" class="btn btn-warning">Back</a>
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