 <?php include "header.php";?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">WEBSITE-SETTINGS</h1>
</div>
<div class="col-md-offset-3 col-md-6">
    <!-- ?php
    include "config.php";
    $sql = "SELECT * FROM settings";
    $result = mysqli_query($conn, $sql) or die("query failed");
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?> -->
    <form action ="" method="POST" entype="multipart/form-data">
        <div class="form-group">
            <label for="website_name">Website Name </lable>
            <input type="text" name="website_name" class ="form-control" autocomplete="off" required> 
        </div>
        <div class="form-group">
            <label for="logo">Website Logo</label>
            <input type="file" name="logo">
            <img src="" >
            <input type="hidden" name="old_logo" value="<?php echo $row['logo']; ?>" >
        </div>
        <div class="form-group">
            <label for="footer_desc">footer Description</label>
            <textarea name="footer_desc" class="form-control" rows="5" required></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="save" required />
        </form>
        <!-- ?php 
        }
    }
        ?> -->
        </div>
</div>
</div>
</div>
<?php include "footer.php"; ?>