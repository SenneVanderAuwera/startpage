<?php
require('connect.inc.php');

$container_name_var = $_GET['container'];		
$containers_query = "SELECT * FROM containers";
$items_query = "SELECT * FROM items WHERE container_link='$container_id_var'";

$container_result = mysql_query($containers_query);
$items_result = mysql_query($items_query);

if (mysql_num_rows($container_result) > 0) {
	while($row = mysql_fetch_assoc($result)) {				
		if($row['container_name'] == $container_name_var) {
			$container_name_var = $row['container_name'];
			$container_id_var = $row['container_id'];
			$container_header_var = $row['container_header'];

			break;
		}
	}
	if($container_id_var == "") {
		die("ERROR: No entries found, please specify valid container. Current container: <b><i>$container_name_var</i></b>");
	}
}


?>
<form action="Processing/editLinkProcess.php" method="get">
	<header>Edit link from "<?php echo $container_header_var; ?>"</header>
	<select name="link" id="itemselect" onChange="checkSelected()">
		<option value="" selected hidden><em>Select item</em></option>
		<?php
			while($row = mysql_fetch_assoc($items_result)) {
				$item_name = $row['item_name'];
				$item_id = $row['item_id'];
				
				echo '<option value="'.$item_id.'">'.$item_name.'</option>';
			}
		?>
	</select>
	<div id="inputfields">
		<input placeholder="Name" class="text" name="name" type="text">
		<input placeholder="URL" class="text" name="url" type="url">
	</div>
	<div id="submit">
		<a href="../" id="cancel" class="button">Cancel</a>
		<input class="button" value="Edit" type="submit">
	</div>
</form>

<script>
	function checkSelected() {
		var option = document.getElementById("itemselect").value;
		document.getElementById("inputfields").style.display = "block";
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			
		}
	}
</script>