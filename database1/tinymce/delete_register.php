<?php

$message = "";

if(empty($_GET['id'])){ /*si la variable id esta vacia no hace nada y regresa*/
    header('Location: tinymce_list.php');
}

$deleteArray=explode(",",$_GET['id']);

$k=0;
for ($i=0; $i < sizeof($deleteArray); $i++) {

	//$user=User::find_by_id($deleteArray[$i]);

	if ($user) {
	    //$user->delete_user_and_photo();
	    $k++;
	    if (sizeof($deleteArray)>1) {
	    //	$session->message("MESSAGE_SUCCESS_4"." [". $k." registers]");
	    }else{
	    	//$session->message("MESSAGE_SUCCESS_3"." "."< {$user->first_name} {$user->last_name} >");
	    }
	}else{
	}
}
header('Location: tinymce_list.php');
?>
