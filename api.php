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
    $res=$db->run("select id,type,name,contact,subject,location,status,notes,date,time,email,isopened from lostnfound where 1=1".$filter,$params);
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

if(isset($_GET['read']))
{
    try{
        $id=$_GET['read'];
        $res=$db->run("update clearance set isopened=1 where id=:id",[':id'=>$id]);
        echo json_encode(['status'=>'success']);
    }
    catch(Exception $ex){
        echo json_encode(['status'=>'error']);
    }
}

if(isset($_GET['readall']))
{
    try{
        $res=$db->run("update clearance set isopened=1 ");
        echo json_encode(['status'=>'success']);
    }
    catch(Exception $ex){
        echo json_encode(['status'=>'error']);
    }
}

if(isset($_GET['readlnf']))
{
    try{
        $id=$_GET['readlnf'];
        $res=$db->run("update lostnfound set isopened=1 where id=:id",[':id'=>$id]);
        echo json_encode(['status'=>'success']);
    }
    catch(Exception $ex){
        echo json_encode(['status'=>'error']);
    }
}

if(isset($_GET['readalllnf']))
{
    try{
        $res=$db->run("update lostnfound set isopened=1 ");
        echo json_encode(['status'=>'success']);
    }
    catch(Exception $ex){
        echo json_encode(['status'=>'error']);
    }
}

if(isset($_GET['stats']))
{
    try{
        $res=$db->run("select (select count(*) from clearance where isopened=0) as clr,(select count(*) from lostnfound where isopened=0) as lnf from clearance limit 1");
        
        echo json_encode($res->fetch(PDO::FETCH_ASSOC));
    }
    catch(Exception $ex){
        echo json_encode(['status'=>'error']);
    }
}