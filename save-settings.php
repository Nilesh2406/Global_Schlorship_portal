<?php
// include "config.php";
// if(empty($_FILES['logo']['name'])){
//  $file_name = $_POST['old_logo'];
// }
// else{
//     $errors = array();
//   echo  $file_name = $_FILES['logo']['name'];
//     die();
//     $file_size = $_FILES['logo']['size'];
//     $file_tmp = $_FILES['logo']['tmp_name'];
//     $file_type = $_FILES['logo']['type'];
//     $exp = end(explode('.',$file_name));
//     $file_ext = end($exp);
//     $extensions = array("jpeg","jpg","png");
//     if(in_array($file_ext,$extensions) === false){
//         $errors[] = "this extension file not allowed, pleas choose a JPG OR PNG file.";
//         }
// if($file_size > 2097152){
//     $errors[] ="File size must be 2mb or lower.";
// }
// if(empty($errors) == true){
//     move_uploaded_file($file_tmp,"images/".$file_name);
// }
// else{
//     print_r($errors);
//     die();
// }
//     }
//     $sql ="UPDATE settings SET websitename='{$_POST["website_name"]}', logo='{$file_name}',foterdesc='{$_POST["footer_desc"]}'";
//   $result = mysqli_query($conn, $sql);
   
//     if($result){
//         header("location:http://localhost/project/admin/settings.php");
//     }
//     else{
//         echo "randi vaibhav";
//     }

// ?>