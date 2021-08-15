<?php

include '../config.php';

$id;
// Check if image file is a actual image or fake image
if(isset($_POST["report"])) {
  
  unset($_POST['report']);
  if($db->insert('reports',$_POST)>0){
    $id=$db->lastInsertId(); 
    
  }
  else{
    $_SESSION['msg']=['type'=>'error','msg'=>'Invalid Request'];
    header('location:../report.php');
    return;
  }
}

$errors=[];
$target_dir = getcwd()."/../uploads/reports/$id/";
if(!is_dir($target_dir)){
    //Directory does not exist, so lets create it.
    mkdir($target_dir, 0755, true);
}
$target_file = $target_dir . basename($_FILES["files"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_FILES["files"]) && $_FILES['files']['error']==0) {
  $check = getimagesize($_FILES["files"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    array_push($errors,"File is not an image.");
    $uploadOk = 0;
  }
  // Check if file already exists
  // if (file_exists($target_file)) {
  //   array_push($errors,"Sorry, file already exists.");
  //   $uploadOk = 0;
  // }

  // Check file size
  // if ($_FILES["files"]["size"] > 500000) {
  //   array_push($errors,"Sorry, your file is too large.");
  //   $uploadOk = 0;
  // }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    array_push($errors,"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
      // $name=$_POST['name'];
      // $contact=$_POST['contact'];
      // $location=$_POST['location'];
      // $notes=$_POST['notes'];
      $db->insert('proofs',['report_id'=>$id,'proof_name'=>basename($_FILES["files"]["name"]),'proof_loc'=>basename($_FILES["files"]["name"])]);
      $_SESSION['msg']=['type'=>'success','msg'=>"Incident was reported"] ;
      header('location:../report.php');
      return;
    } else {
      array_push($errors, "Sorry, there was an error uploading your file.");
    }
  }
  if (sizeof($errors)>0) $_SESSION['msg']=['type'=>'error','msg'=>$errors];
}
else if( $_FILES['files']['error']==4){
  $_SESSION['msg']=['type'=>'success','msg'=>"Incident was reported"] ;
}
  header('location:../report.php');
  return;

// print_r($_SESSION['msg']);
