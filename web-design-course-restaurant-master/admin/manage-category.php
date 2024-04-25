<?php include('partials/menu.php'); ?>

<div class="main-content">
        <div class= "wrapper"> 
        <h1>Manage Category</h1>
</div> </div>
<?php 

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
         
            ?>
            <br>  <br>
            
            <a href="<?php echo SITE_HOME; ?> admin/add-category.php" class="btn btn-primary">Add Category</a>

            <table class="tbl-full">
                  <tr>
                        <th>S.N.</th>
                        <th>First Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                  </tr>

                  <?php
                        //query for all admins 
                        $sql ="SELECT * FROM tbl_admin";

                        //execute query

                        $res = mysqli_query($conn, $sql);

                        //check if query executed 

                        if($res==TRUE) {
                              // COUNT ROWS to check whether we have data in database or not

                              $rows = mysqli_num_rows($res); //get number of rows in database

                              if($rows > 0) {
                                    while($rows=mysqli_fetch_assoc($res)) {
                                          $id = $rows['admin_id'];
                                          $full_name = $rows['name'];
                                          $username = $rows['admin_username'];
                                          $password = $rows['admin_password'];


                                          ?>

                  <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $full_name;?></td>
                        <td><?php echo $username;?></td> 
                        <td>
                        <a href="<?php echo SITE_HOME; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Admin</a>
                              <a href="<?php echo SITE_HOME; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete Admin</a>
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