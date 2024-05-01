<?php include ('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
<h1>Update Order</h1>
<br><br>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM orders WHERE orders_id = $id";
        $res =mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);

        if($count==1){
            $row=mysqli_fetch_assoc($res);

            $food = $row['orders_food'];
            $price = $row['orders_price'];
            $quantity = $row['orders_quantity'];
            $status = $row['orders_status'];
            $customer_name = $row['orders_customer_name'];
            $customer_contact = $row['orders_customer_contact'];
            $customer_email = $row['orders_customer_email'];
            $customer_address = $row['orders_customer_address'];

        }

        else{
            header('location:'.SITE_HOME.'admin/manage-order.php');

        }

    }
    else{

        header('location:'.SITE_HOME.'admin/manage-order.php');
    }


?>

<br>
<form action="" method ="POST">
<table class= "tbl-30">
    <tr>
        <td>Food Name</td>
        <td><b><?php echo $food ;?></b></td>
    </tr>

    <tr>
        <td>Price </td>
        <td><b>$<?php echo $price ;?></b></td>
    </tr>
<tr>
    <td>Qty</td>
    <td>
        <input type="number" name="qty" value="<b><?php echo $quantity ;?></b>">
    </td>
</tr>
<tr>
    <td>Status</td>
    <td>
        <select name="status" >
            <option <?php if($status== "ordered"){echo "selected";} ?> value="ordered">Ordered</option>
            <option <?php if($status== "On delivery"){echo "selected";} ?> value="On delivery">On Delivery</option>
            <option <?php if($status== "Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
            <option <?php if($status== "Canceled"){echo "selected";} ?> value="Canceled">Canceleded</option>
        </select>
    </td>
</tr>

<tr>
    <td>Customer Name:</td>
    <td>
        <input type="text" name="cutomer_name" value="<?php echo $customer_name ;?>">
    </td>
    
</tr>

<tr>
<td>Customer Contact:</td>
    <td>
        <input type="text" name="cutomer_contact" value="<?php echo $customer_contact ;?>">
    </td>
    
</tr>

<tr>
<td>Customer Email:</td>
    <td>
        <input type="text" name="cutomer_email" value="<?php echo $customer_email ;?>">
    </td>
    
</tr>

<tr>
<td>Customer Address: </td>
    <td>
       <textarea name="customer_address" id="" cols="30" rows="5"><?php echo $customer_address ;?></textarea>
    </td>
    
</tr>

<tr>
    <td colspan="2">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <input type="hidden" name="price" value="<?php echo $price;?>">
         <input type="submit" name="submit" value= "Update order" class= "btn-secondary">
    </td>
</tr>

</table>

</form>

        <?php 
        if(isset($_POST['submit'])){
        // echo"Button Clicked";
        $id = $_POST['id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $total = $price * $quantity;
        $status = $_POST['status'];
        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        $sql2= "UPDATE orders SET
        orders_quantity = $quantity,
        orders_total = $total;
        status = '$status',
        orders_customer_name ='$customer_name',
        orders_customer_contact ='$customer_contact',
        orders_customer_email ='$customer_email',
        orders_customer_address ='$customer_address'
        WHERE orders_id = '$id'
        ";

        $res2 = mysqli_query($conn, $sql2);

        if($res2 ==true) {
        // echo "Successfully Submitted!";
            $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
        
            //Redirect to manage admin page
            header("location:".SITE_HOME.'/admin/manage-order.php');
        
        }
        else {
            $_SESSION['update'] = "<div class='error'>Failed to update .</div>";
        
            //Redirect to manage admin page
            header("location:".SITE_HOME.'/admin/manage-order.php');
        }
        }
        ?>
<br><br><br>
<?php include ('partials/footer.php');?>