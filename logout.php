<?php


	if(!isset($_SESSION["mtop"])) {
		redirect("role");
	}
	
	// log out current user, if any
	logout();
	
	// redirect user
	redirect("role");

?>
