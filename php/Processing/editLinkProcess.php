<?php
require(__DIR__.'/../../includes/connect.inc.php');

$item_id = $_GET['link'];
$item_name = $_GET['name'];
$item_href = $_GET['url'];

$emptyError = "One or multiple entries not filled in or selected, update failed.";
$updateError = "Update failed.";

$editquery = "UPDATE `items` SET item_name='$item_name', item_href='$item_href' WHERE item_id='$item_id'";

if(!empty($item_id) && !empty($item_name) && !empty($item_href)){
	if(mysql_query($editquery)) {
		echo "Record updated.";
		header('Location: ../../');
	} else {
		header('Location: ../../index.php?errordisplay=1&errormsg='.$updateError);
	}
} else {
	header('Location: ../../index.php?errordisplay=1&errormsg='.$emptyError);
}
?>