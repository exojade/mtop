<?php
// dump($_REQUEST);

use mikehaertl\pdftk\Pdf;

    if($_SERVER["REQUEST_METHOD"] === "POST") {
		

        if($_POST["action"] == "awardMTOP"):

            $cashreceipt = query_etracs("SELECT * FROM cashreceipt WHERE receiptno = ?", $_POST["or_number"]);
            if(empty($cashreceipt)):

                $res_arr = [
                    "message" => "OR Number not found in the system. Cannot proceed!",
                    "status" => "failed",
                    "link" => "Failed",
                    ];
                    echo json_encode($res_arr); exit();

            endif;



            // dump($_POST);
            $mp_date = date("Y") . "-12-31";

            query("update operator set 
                        lastname = ?,
                        firstname = ?,
                        middlename = ?,
                        suffix = ?,
                        address = ?,
                        Gender = ?
                        where MTOP_NO = ?
                        ",
                    strtoupper($_POST["lastname"]),
                    strtoupper($_POST["firstname"]),
                    strtoupper($_POST["middlename"]),
                    strtoupper($_POST["suffix"]),
                    strtoupper($_POST["address"]),
                    strtoupper($_POST["gender"]),
                    $_POST["mtop_no"]
                    );


            query("update vehicle set 
                    plate_no = ?,
                    make = ?,
                    chassis_no = ?,
                    motor_no = ?,
                    reg_no = ?,
                    route = ?,
                    status = ?,
                    care_of = ?,
                    mp_expiration_date = ?,
                    released_date = ?,
                    expiration_date = ?
                    where MTOP_NO = ?
                    ",
                $_POST["plate_no"],
                $_POST["make"],
                $_POST["chassis"],
                $_POST["motor_no"],
                $_POST["certification"],
                $_POST["route"],
                "For Release",
                $_POST["note"],
                $mp_date,
                date("Y-m-d"),
                $_POST["expiration_date"],
                $_POST["mtop_no"]
                );


                $ddate = $cashreceipt[0]["receiptdate"];
                $receiptdate = date("Y-m-d", strtotime($ddate));


                if (query("insert INTO fees (or_no,date_paid,MTOP_NO) 
				VALUES(?,?,?)", 
				$_POST["or_number"],$receiptdate,$_POST["mtop_no"]) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}
                

                if (query("insert INTO transaction_logs (MTOP_NO,firstname,lastname,make,plate_num,chassis_no,motor_no,ddate,type,action) 
				VALUES(?,?,?,?,?,?,?,?,?,?)", 
				$_POST["mtop_no"],strtoupper($_POST["firstname"]),strtoupper($_POST["lastname"]),$_POST["make"],$_POST["plate_no"],
                $_POST["chassis"],$_POST["motor_no"],$receiptdate,"Awarding","Award of MTOP"
                ) === false)
				{
					apologize("Sorry, that username has already been taken!");
				}

                $res_arr = [
                    "message" => "Successfully awarded",
                    "result" => "success",
                    "link" => "refresh",
                    ];
                    echo json_encode($res_arr); exit();


            


        endif;



    }
	else {
		if(isset($_GET["action"])){
			if($_GET["action"] == "mayors_permit"){

                $bill = query("select * from billing_type_fee tf
                                    left join billing_fees f
                                    on f.fee_id = tf.fee_id
                                    where tf.type_id = 'MAYORS PERMIT'");
                $total_standard_fee = 0;
                foreach($bill as $row):
                    if($row["isurcharge"] == 1):
                        $surcharge = $row["amount"];
                    else:
                        $total_standard_fee = $total_standard_fee + $row["amount"];
                    endif;
                endforeach;
                // dump($billing);

                $mtop = query("select * from operator o
                left join vehicle v
                on v.MTOP_NO = o.MTOP_NO
                where o.MTOP_NO = ?", $_GET["mtop"]);

                $settings = query("select * from settings");

                $currentDate = date_create(date("Y-m-d"));
                $expirationDate = date_create($mtop[0]["mp_expiration_date"]);
                $standardFee = $total_standard_fee;
                $surchargePerYear = $surcharge;

                $surchargeLimitDate = date_create($settings[0]["deadline_boss"]); 
                $yearsBehind = date_diff($expirationDate, $currentDate)->y;
                $totalFee = 0;
                if ($currentDate > $surchargeLimitDate) {
                    $totalFee = (($yearsBehind + 1) * ($standardFee + $surchargePerYear));
                } else {
                    $totalFee = $standardFee + (($yearsBehind) * ($standardFee + $surchargePerYear));
                }
// dump($yearsBehind);

$totalFee = $totalFee - $total_standard_fee;
// dump("Total fee: $totalFee");





				render("public/transaction_system/renew_mayors_permit.php",[
                    "mtop" => $mtop,
                    "totalFee" => $totalFee,
                    "bill" => $bill,
				]);
			}
			
		}
	}
?>
