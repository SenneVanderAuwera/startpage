<?php
require('connect.inc.php');

$containers_query = "SELECT * FROM containers ORDER BY container_id"; //DEFINE QUERY

if ($containers_query_run = mysql_query($containers_query)) { //RUN QUERY
	
	while($container_row = mysql_fetch_assoc($containers_query_run)) {
            $items_query = "SELECT * FROM items WHERE container_link=".$container_row['container_id'].";";
	        	
			$name = $container_row['container_name'];
			$header = $container_row['container_header'];
		    echo '<ul class="container" id="',$name,'"><header>',$header,'<a href="php/editContainer.php?container=',$name,'"class="addLinkElement"><img id="containerPencil" src="img/pencilbutton.png"></a></header>';

			if ($items_query_run = mysql_query($items_query)) {
				while($items_row = mysql_fetch_assoc($items_query_run)) {		
						echo '<li><a href=',$items_row['item_href'],'>',$items_row['item_name'],'</a></li>';
				}
			}
		    echo '</ul>';
		}
} else {
	echo mysql_error();
}

?>
