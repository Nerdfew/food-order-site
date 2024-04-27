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


        ?>


            <table class="tbl">
                  <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>

                  </tr>

                  <?php 
                  $sql = "SELECT * FROM food";
                  $res = mysqli_query($conn ,$sql);
                  $count = mysqli_num_rows($res);

                  $sn=1;

                  if($count>0){

                        while($row = mysqli_fetch_assoc($res)){

                              $id =$row['id'];
                              $title =$row['title'];
                              $price =$row['price'];
                              $image_name =$row['image_name'];
                              $featured =$row['featured'];
                              $active =$row['active'];

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
                            <a href="#" class="btn btn-secondary">  Update food </a>
                             <a href="#" class="btn btn-danger"> Delete food </a>
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

<?php include('partials/footer.php'); ?> 