<?php include('partials/menu.php'); ?>

<div class="main-content">
        <div class= "wrapper"> 
        <h1>Manage Food</h1> 
        <br><br>

        <a href="<?php echo SITE_HOME; ?>admin/add-food.php" class="btn btn-primary">Add Food </a>

        <br><br>

        <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete']))
        { 
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['upload']))
        { 
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['unauthorize']))
        { 
            echo $_SESSION['unauthorize'];
            unset($_SESSION['unauthorize']);
        }
        if(isset($_SESSION['remove-failed']))
        { 
            echo $_SESSION['remove-failed'];
            unset($_SESSION['remove-failed']);
        }
        if(isset($_SESSION['update']))
        { 
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        ?>


            <table class="table">
                  <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Active</th>
                   

                  </tr>

                  <?php 
                  $sql = "SELECT * FROM food";
                  $res = mysqli_query($conn ,$sql);
                  $count = mysqli_num_rows($res);

                  $sn=1;

                  if($count>0){

                        while($row = mysqli_fetch_assoc($res)){

                              $id =$row['food_id'];
                              $title =$row['food_title'];
                              $price =$row['food_price'];
                              $image_name =$row['food_image_name'];
                              $featured =$row['food_featured'];
                              $active =$row['food_active'];

                              ?>

                  <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>$<?php echo $price; ?></td>
                        <td><?php echo $image_name; ?></td>
                        <td>
                              <?php 
                              if($image_name==""){
                                    echo "<div class= 'error'>Image not added.</div>";
                              }
                              else{
                                    ?>
                                    <img src="<?php echo SITE_HOME; ?>images/food/<?php echo $image_name;?> " width= 100px>
                                    <?php
                              }
                              ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active ;?></td>
                    
                        <td>
                              <a href= "<?php echo SITE_HOME;?>admin/update-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn btn-secondary"> Update food </a>
                             <a href= "<?php echo SITE_HOME;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger"> Delete food </a>
                        </td>
                  </tr>

                              <?php



                        }


                  }

                  else{
                        echo "<tr><td colspan = '7' class= 'error'> Food is not added yet.</td> </tr>";


                  }


                  ?>

                  
                  
        </table>
</div>
</div>

<?php include('partials/footer.php'); ?> 