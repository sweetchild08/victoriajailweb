<?php

include 'config.php';
if(isset($_GET['lostnfound']))
{
    $filter="";
    $params=[];
    if(isset($_GET['type'])){
        $filter.=" and type=:type";
        $params[':type']=$_GET['type'];
    }
    if(isset($_GET['status'])){
        $filter.=" and status=:status";
        $params[':status']=$_GET['status'];
    }
    $res=$db->run("select id,type,name,contact,subject,location,status,notes,date,time,email from lostnfound where 1=1".$filter,$params);
    $r=[];
    while($row=$res->fetch(PDO::FETCH_ASSOC))
    {
        array_push($r,$row);
    }
    echo json_encode(['data'=>$r]);
}

if(isset($_POST['lostnfound']))
{
    $id=$_POST['lostnfound'];
    $val=$_POST['value'];
    $res=["msg"=>"Not updated, error occured","status"=>"error"];
    if($db->update("lostnfound",["status"=>$val],["id"=>$id])>0){
        $res=["status"=>"success","msg"=>"Success"];
    }
    echo json_encode($res);
}

if(isset($_GET['clearance']))
{
    $search="";
    $params=[];
    if(isset($_GET['search'])){
        $search.=" and (first_name like :search or last_name like :search or middle_name like :search or sitio like :search or barangay like :search or purpose like :search or occupation like :search)";
        $params[':search']='%'.$_GET['search'].'%';
    }
    $res=$db->run("select * from clearance where 1=1".$search,$params);
    $r=[];
    while($row=$res->fetch(PDO::FETCH_ASSOC))
    {
        array_push($r,$row);
    }
    echo json_encode(['data'=>$r]);
}