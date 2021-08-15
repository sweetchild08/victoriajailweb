<?php
include 'config.php';
if(isset($_GET['id'])){
    $id=$_GET['id']; 
    $type=$_GET['type'];
    
    $res=$db->run("select $type from clearance where id=:id",[':id'=>$id]);
    if($row=$res->fetch()){
        header('Content-type:image/png');
        echo file_get_contents("http://localhost/eservweb/uploads/clearance/$id/".$row[$type]);
        return;
    }
    // readfile($fullpath);

}