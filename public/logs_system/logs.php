<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {	
		
    }
    else
    {

        if(isset($_GET["action"])):

            if($_GET["action"] == "activity"):
                render("public/logs_system/activity_list.php");
            elseif($_GET["action"] == "fees"):
                render("public/logs_system/fees_list.php");
            endif;

        endif;

        // dump($user);
        
    }
?>