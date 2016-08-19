<?php
require_once('../mysqli_connect.php');


$message = "";

if(empty($_GET['id'])){ /*si la variable id esta vacia no hace nada y regresa*/
    header('Location: tinymce_list.php');
}


$deleteArray=explode(",",$_GET['id']);

$k=0;
for ($i=0; $i < sizeof($deleteArray); $i++) {

	//$user=User::find_by_id($deleteArray[$i]);

	if (sizeof($deleteArray) >0) {
	    //$user->delete_user_and_photo();
      $sql= "DELETE FROM "."`tinymce`"." ";
      $sql.= "WHERE `id`=". $deleteArray[$i];
      $sql.= " LIMIT 1";

      $dbc->query($sql);

	    $k++;
	    if (sizeof($deleteArray)>0) {

        echo "paso: "."<br>";
        echo $sql."<br>";
        echo $deleteArray[$i]."<br>";


      //	$session->message("MESSAGE_SUCCESS_4"." [". $k." registers]");
	    }else{
	    	//$session->message("MESSAGE_SUCCESS_3"." "."< {$user->first_name} {$user->last_name} >");

        echo "No paso: "."<br>";
        echo $sql."<br>";
        echo $deleteArray[$i]."<br>";

	    }
	}else{
    echo "sizeof($deleteArray) <=0";
	}

}
//header('Location: tinymce_list.php');
?>
