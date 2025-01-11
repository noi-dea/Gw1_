<?php
// must-declare variables before including this file: $firstpage & $lastpage 
if(!isset($_GET['page'])){
    $pagenr=$firstpage;
} else {
    $pagenr = $_GET['page'];
    if($pagenr<$firstpage){
        $pagenr=$firstpage;
    }
    if($pagenr>$lastpage){
        $pagenr=$lastpage;
    }
    if(preg_match('/[^\d]/', $pagenr)){
        $pagenr=$firstpage;
    }
}

?>