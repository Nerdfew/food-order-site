<?php include('partials/menu.php'); ?>

<div class="main-content">
        <div class= "wrapper"> 
        <h1>Manage Category</h1>

<?php 

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];

                unset($_SESSION['remove']);


            }

            if(isset($_SESSOIN['delete'])) {
                
                
                 echo $_SESSION['delete'];

                unset($_SESSION['delete']);
            }
         
            ?>
            <br>  <br>
            
            <a href="<?php echo SITE_HOME; ?>/admin/add-category.php" class="btn btn-primary">Add Category</a>

            <table class="table">
                  <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Category Title</th>
                        <th scope="col">Image Name</th>
                        <th scope="col">Featured</th>
                        <th scope="col">Active</th>
                  </tr>

                  <?php
                        //query for all admins 
                        $sql ="SELECT * FROM category";

                        //execute query

                        $res = mysqli_query($conn, $sql);

                        //check if query executed 

                        if($res==TRUE) {
                              // COUNT ROWS to check whether we have data in database or not

                              $rows = mysqli_num_rows($res); //get number of rows in database

                              if($rows > 0) {
                                    while($rows=mysqli_fetch_assoc($res)) {
                                          $id = $rows['category_id'];
                                          $title = $rows['category_title'];
                                          $image_name = $rows['category_image'];
                                          $featured = $rows['category_featured'];
                                          $active = $rows['category_active'];


                                          ?>

                  <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $title;?></td> 
                        <td><?php
                        if($image_name!="") {
                                ?> <img src="<?php echo SITE_HOME;?>images/category/<?php echo $image_name; ?>" width="100px">
                                <?php
                        }
                        else {
                                echo "<div class='error'>Image not Added.</div>";
                        }
                        
                        ?>
                </td>
                        <td><?php echo $featured;?></td> 
                        <td><?php echo $active;?></td> 
                        <td>
                        <a href="<?php echo SITE_HOME; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Category</a>
                              <a href="<?php echo SITE_HOME; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn btn-danger">Delete Category</a>
                        </td>
                  </tr>




                                          <?php
                                    }



                              }
                              else
                               {

                              }
                        }
                  
                  
                  ?>
        </table>

         </div>
         </div>
        
<?php include('partials/footer.php'); ?> 