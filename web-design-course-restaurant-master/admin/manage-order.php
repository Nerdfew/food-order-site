<?php include('partials/menu.php') ?>

        <div class="main-content">
        <div class= "wrapper"> 
        <h1>Manage Order</h1>
        <br><br>
        <?php 
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
?>

        <br><br>


            <table class="tbl">
                  <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                  </tr>

                  <?php 
                  $sql ="SELECT * FROM orders ORDER BY orders_id DESC";

                  $res =mysqli_query($conn, $sql);

                  $count= mysqli_num_rows($res);
                  $sn = 1;



                  if($count> 0){
                        while($row = mysqli_fetch_assoc($res)){
                              $id = $row['orders_id'];
                              $food = $row['orders_food'];
                              $price = $row['orders_price'];
                              $quantity = $row['orders_quantity'];
                              $total = $row['orders_total'];
                              $order_date = $row['orders_date'];
                              $status = $row['orders_status'];
                              $customer_name = $row['orders_customer_name'];
                              $customer_contact = $row['orders_customer_contact'];
                              $customer_email = $row['orders_customer_email'];
                              $customer_address = $row['orders_customer_address'];


                              ?>

                  <tr>
                        <td><?php echo $sn++ ;?></td>
                        <td><?php echo $food ;?></td>
                        <td><?php echo $price ;?></td>
                        <td><?php echo $quantity ;?></td>
                        <td><?php echo $total ;?></td>
                        <td><?php echo $order_date ;?></td>
                        <td><?php
                        if($status=="ordered")
                        { 
                              echo "<label style=' color: orange;' >$status</label> ";
                        }
                        else if($status== "On Delivery")
                        { 
                              echo "<label style=' color: red;'>$status</label> ";
                        }
                        else if($status== "Delivered")
                        { 
                              echo "<label style=' color: blue;'>$status</label> ";
                        }
                        else if($status== "Canceled")
                              { 
                                    echo "<label style=' color: green;'>$status</label> ";
                              }
                        
                        ?></td>
                        <td><?php echo $customer_name ;?></td>
                        <td><?php echo $customer_contact ;?></td>
                        <td><?php echo $customer_email ;?></td>
                        <td><?php echo $customer_address ;?></td>
                        

                        <td>
                            <a href="<?php echo SITE_HOME; ?>admin/update-order.php?id=<?php echo $id;?>" class="btn btn-secondary">  Update Order </a>
                            
                        </td>
                  </tr>
                              <?php


                        }
                  }
                  
                  else{
                        echo "<tr><td colspan= '12' class='error'>Order not Available</td></tr>";

                  }

            
      
                  ?>

          
        </table>
         </div>
         </div>
   <?php  include('partials/footer.php'); ?>