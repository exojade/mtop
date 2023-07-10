<?php
// $sql = query_etracs("SELECT * FROM cashreceipt WHERE receiptno = '0724986G'");
// dump($sql);



// $transaction_logs = query("select * from transaction_logs where ddate between '2023-01-01' and '2023-12-31'");
// $fees = query("select * from fees");
// $Fees = [];
// foreach($fees as $f):
// 	$Fees[$f["MTOP_NO"]][$f["date_paid"]] = $f;
// endforeach;
// // dump($Fees);
// foreach($transaction_logs as $t):

// 	if(isset($Fees[$t["MTOP_NO"]][$t["ddate"]])):
// 	$or_number = $Fees[$t["MTOP_NO"]][$t["ddate"]]["or_no"];
// 	else:
// 	$or_number = "";
	
// 	endif;
// 	query("update transaction_logs set or_number = ? where MTOP_NO = ? and ddate = ?", $or_number, $t["MTOP_NO"], $t["ddate"]);
// endforeach;


    if($_SERVER["REQUEST_METHOD"] === "POST") {
	
		
		
    }
	else {
		$role = $_SESSION["mtop"]["role"];
		// dump($role);
		if($role == "ADMINISTRATOR"){
			render("public/dashboard_system/dashboard_admin.php",[]);
		}
	}
?>
