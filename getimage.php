<?php
include 'config.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];    
    
    $res=$db->run('select affidavit from lostnfound where id=:id',[':id'=>$id]);
    if($row=$res->fetch()){
        header('Content-type:image/png');
        echo $row['affidavit'];
        return;
    }
    // readfile($fullpath);

}