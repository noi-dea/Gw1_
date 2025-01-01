<?php
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


// include the validation after setting $firstpage and $lastpage to avoid buggs
?>