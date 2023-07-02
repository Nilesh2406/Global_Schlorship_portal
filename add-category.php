<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->

                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
                  <?php
                  if(isset($_POST['save'])){
                      include 'config.php';
                      $category = mysqli_real_escape_string($conn, $_POST['cat']);
                      $sql ="SELECT category_name FROM category WHERE category_name='{$category}'";
                      $result = mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result)>0){
                          echo "<p style ='color:red;text-align:center;margin:10px 0';> category already exists.</P>";
                      }
                      else{
                          $sql="INSERT INTO category (category_name) VALUES ('{$category}')";
                          if(mysqli_query($conn, $sql)){
                              header("location: http://localhost/project/admin/category.php");
                          }
                          else{
                              echo "<p style ='color:red;text-align:center;margin:10px 0';>query failed.</p>";
                          }
                      }
                  }
                  mysqli_close($conn);
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
