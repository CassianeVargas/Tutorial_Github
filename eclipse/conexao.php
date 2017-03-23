<?php 
function executar($query){
	$mysqli=new mysqli(HOST_BD,USER_BD,PASS_BD,DATABASE);
	return $mysqli->query($query);	
}
?>