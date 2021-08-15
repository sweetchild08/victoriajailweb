
<?php
    if(isset($_SESSION['msg'])){
        $ms=$_SESSION['msg']['msg'];
        if(is_array($_SESSION['msg']['msg'])){
            foreach($_SESSION['msg']['msg'] as $msg){
                echo 'toastr.'.$_SESSION['msg']['type']."('$msg');";
            }
        }
        else
        echo 'toastr.'.$_SESSION['msg']['type']."('$ms');";
         unset($_SESSION['msg']);
    }
?>

