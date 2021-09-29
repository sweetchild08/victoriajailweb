<?php

include '../config.php';

if(isset($_POST['clearance']))
{
    $data=$_POST;
    // print_r($_FILES);return;
    // print_r(v_alpha([$data['last_name']]));return;
    if(!v_alpha([$data['last_name'],$data['first_name'],$data['middle_name']])){
        $_SESSION['msg']=['type'=>'error','msg'=>'Name cant contain numbers'];
        header('location:../police-clearance.php');
        return;
    }
    unset($data['clearance']);
    
    // $data['date']=date('Y-m-d');
    // $data['time']=date('H:i:s');
    // // unset($_POST['report']);
    if($db->insert('clearance',$data)>0){
        $id=$db->lastInsertId();
    }
    else{
        $_SESSION['msg']=['type'=>'error','msg'=>'Invalid Request'];
        header('location:../police-clearance.php');
        return;
    }
    $errors=[];
    $target_dir = getcwd()."/../uploads/clearance/$id/";
    if(!is_dir($target_dir)){
         //Directory does not exist, so lets create it.
        mkdir($target_dir, 0755, true);
    }
    //$target_file = $target_dir . $_FILES["files"]["name"];
    $uploadOk = 1;
    foreach($_FILES as $name=>$file){
        if($file['error']==0){
            $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
            $td= $name.".".$imageFileType;
            if (move_uploaded_file($file["tmp_name"], $target_dir . $td)) {
            $db->update('clearance',[$name=>$td],['id'=>$id]);
            } else {
            array_push($errors, "Sorry, there was an error uploading your file.");
            }
        }
    }
    $_SESSION['msg']=['type'=>'success','msg'=>'Application was submitted, check email if it was ready'];
    header('location:../police-clearance.php');
    return;

}
function v_alpha($fields){
    foreach($fields as $field){
        if(preg_match('#[0-9]#',$field))
            return false;
    }
    return true;
}