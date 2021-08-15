<?php

include '../config.php';

if(isset($_POST['postlost']))
{
    if(isset($_SESSION['captcha'])){
        if($_SESSION['captcha']!==$_POST['captcha']){
            $_SESSION['msg']=['type'=>'error','msg'=>'Wrong Captcha'];
            header('location:../lost.php');
            return;
        }
    }
    $data=$_POST;
    
    if(!v_alpha([$data['name']])){
        $_SESSION['msg']=['type'=>'error','msg'=>'Name cant contain numbers'];
        header('location:../lost.php');
        return;
    }
    unset($data['captcha']);
    unset($data['postlost']);
    $data['type']='lost';
    
    $data['date']=date('Y-m-d');
    $data['time']=date('H:i:s');
    $id=0;
    // unset($_POST['report']);
    if($db->insert('lostnfound',$data)>0){
        $id=$db->lastInsertId(); 
    }
    else{
        $_SESSION['msg']=['type'=>'error','msg'=>'Invalid Request'];
        header('location:../lost.php');
        return;
    }
    $errors=[];
    $target_dir = getcwd()."/../uploads/lost/$id/";
    if(!is_dir($target_dir)){
        //Directory does not exist, so lets create it.
        mkdir($target_dir, 0755, true);
    }
    $target_file =  $_FILES["files"]["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_FILES["files"]) && $_FILES['files']['error']==0) {
        // print_r($_FILES["files"]);return;
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
        if ($_FILES["files"]["size"] > 500000) {
            array_push($errors,"Sorry, your file is too large.");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            array_push($errors,"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }

        // Check if image file is a actual image or fake image
        if(isset($_FILES["affidavit"]) && $_FILES['affidavit']['error']==0) {
            // print_r($_FILES["files"]);return;
            $check = getimagesize($_FILES["affidavit"]["tmp_name"]);
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
            if ($_FILES["affidavit"]["size"] > 500000) {
                array_push($errors,"Sorry, your file is too large.");
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                array_push($errors,"Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                $uploadOk = 0;
            }
        }


        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_dir. $_FILES["files"]["name"]) && move_uploaded_file($_FILES["affidavit"]["tmp_name"] ,  $target_dir. $_FILES["affidavit"]["name"])) {
                
            // $name=$_POST['name'];
            // $contact=$_POST['contact'];
            // $location=$_POST['location'];
            // $notes=$_POST['notes'];
            // echo file_get_contents($target_dir. $_FILES["affidavit"]["name"]);return;
            $db->insert('pictures',['ref_id'=>$id,'name'=>$_FILES["files"]["name"],'type'=>'lost']);
            $db->update('lostnfound',['affidavit'=>file_get_contents($target_dir. $_FILES["affidavit"]["name"])],['id'=>$id]);
            $_SESSION['msg']=['type'=>'success','msg'=>"Post for Lost Successful, waiting for approval"] ;
            header('location:../lost.php');
            return;
            } else {
            array_push($errors, "Sorry, there was an error uploading your file.");
            die();
            }
        }
        if (sizeof($errors)>0) $_SESSION['msg']=['type'=>'error','msg'=>$errors];
    }
    else if( $_FILES['files']['error']==4){
    $_SESSION['msg']=['type'=>'success','msg'=>"Post for Lost Successful, waiting for approval"] ;
    }
    header('location:../lost.php');
    return;

    // print_r($_SESSION['msg']);
   
}

function v_alpha($fields){
    foreach($fields as $field){
        if(preg_match('#[0-9]#',$field))
            return false;
    }
    return true;
}