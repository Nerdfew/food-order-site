<?php include("partials/menu.php"); ?>

      <div class="main-content">
        <div class= "wrapper"> 
            <h1>Manage Admin</h1>

            <?php 
            if(isset($_SESSION['add'])) {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
            }
            
            ?>
            <br>
            <br>
            <a href="/Untitled/food-order-site/web-design-course-restaurant-master/admin/add-admin.php" class="btn btn-primary">Add Admin</a>

            <table class="tbl">
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
                                          $full_name = $rows['admin_name'];
                                          $username = $rows['admin_username'];
                                          $password = $rows['admin_password'];


                                          ?>

                  <tr>
                        <td><?php echo $id;?>.</td>
                        <td><?php echo $full_name;?></td>
                        <td><?php echo $username;?></td> 
                        <td>
                              <a href="#" class="btn btn-secondary">  Update Admin </a>
                             <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-danger"> Delete Admin </a>
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
   <?php  include('partials/footer.php'); ?>