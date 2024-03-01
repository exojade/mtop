<?php
// dump($_REQUEST);

use mikehaertl\pdftk\Pdf;

    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "mtop_datatable"){
			
            // print_r($_REQUEST);
            $draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = 10;
            $search = $_POST["search"]["value"];
            $sql = query("select * from operator");
            $vehicle = query("select * from vehicle");
            $Vehicle = [];
            foreach($vehicle as $row):
                $Vehicle[$row["MTOP_NO"]] = $row;
            endforeach;
            $all_data = $sql;
            if($search == ""){
                $query_string = "select * from operator
                                order by MTOP_NO ASC
                                    limit ".$limit." offset ".$offset." ";
                $data = query($query_string);
            }
            else{
                $query_string = "
                    select * from operator
                    where 
                    concat(lastname, ', ', firstname) like '%".$search."%' or
                    concat(firstname, ' ', lastname) like '%".$search."%' or
                    MTOP_NO like '%".$search."%'
                    order by MTOP_NO ASC
                    limit ".$limit." offset ".$offset."
                ";
                $data = query($query_string);
                $query_string = "
                        select * from operator
                        where 
                        concat(lastname, ', ', firstname) like '%".$search."%' or
						concat(firstname, ' ', lastname) like '%".$search."%' or
						MTOP_NO like '%".$search."%'
						order by MTOP_NO ASC
                ";
                $all_data = query($query_string);
            }
            $i=0;
            foreach($data as $row):
				$data[$i]["fullname"] = $row["lastname"] . ", " . $row["firstname"];
				$data[$i]["gender"] = $row["Gender"];
				$data[$i]["mtop"] = "<a href='mtop_profile?action=profile&mtop=".$row["MTOP_NO"]."'>".$row["MTOP_NO"] ."</a>";
				$data[$i]["mp_expiration_date"] = $Vehicle[$row["MTOP_NO"]]["mp_expiration_date"];
				$data[$i]["expiration_date"] = $Vehicle[$row["MTOP_NO"]]["expiration_date"];
                $i++;
            endforeach;
   
            $json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);
        }

		if($_POST["action"] == "update_mtop"){
			// dump($_POST);
			query("update operator set lastname = ?, firstname = ?, address = ?, Gender = ?
					where MTOP_NO = ?", $_POST["lastname"], $_POST["firstname"], $_POST["address"], $_POST["Gender"], $_POST["mtop"]);

			query("update vehicle set plate_no = ?, make = ?, motor_no = ?, chassis_no = ?, reg_no = ?, route = ?,
					expiration_date = ?, mp_expiration_date = ?, care_of = ?
					where MTOP_NO = ?", 
					$_POST["plate_no"], $_POST["make"], $_POST["motor_no"], $_POST["chassis_no"], $_POST["reg_no"], $_POST["route"],
					$_POST["expiration_date"], $_POST["mp_expiration_date"], $_POST["care_of"], $_POST["mtop"]
				);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Done Updating Data",
				"link" => "mtop_profile?action=profile&mtop=".$_POST["mtop"],
				];
				echo json_encode($res_arr); exit();



		}

        if($_POST["action"] == "print_renew"):
            $mtop = query("SELECT vehicle.MTOP_NO, CONCAT(firstname,' ',lastname) as  fullname , 
            address, plate_no, make, chassis_no, motor_no, reg_no, route, status, released_date, 
            expiration_date FROM vehicle JOIN operator ON vehicle.MTOP_NO = operator.MTOP_NO AND vehicle.MTOP_NO = ?", $_POST["mtop_no"]);
            //  $P{mtop_no}
            // dump($mtop);
            $mtop = $mtop[0];
            $pdf = new Pdf('printable_forms/renew1.pdf');
            $result = $pdf->fillForm([
				"mtop_no"    => $mtop["MTOP_NO"],
				"date_entry"    => date("F d, Y"),
				"operator_full"    => $mtop["fullname"],
				"address_home"    => $mtop["address"],
				"route"    => $mtop["route"],
				"make"    => $mtop["make"],
				"motor_no"    => $mtop["motor_no"],
				"chassis_no"    => $mtop["chassis_no"],
				"plate_no"    => $mtop["plate_no"],
				"reg_no"    => $mtop["reg_no"],
			
				])
                ->flatten()
				->saveAs("output_forms/".$_POST["mtop_no"]."_renew_1.pdf");
                $path = "output_forms/".$_POST["mtop_no"]."_renew_1.pdf";
                $filename=$_POST["mtop_no"]."_renew_1.pdf";
                $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
                        $json = array('info' => $load);
                        echo json_encode($json);
                        exit();
        endif;


        if($_POST["action"] == "print_renew_back"):

            // SELECT vehicle.MTOP_NO, (SELECT city_admin from settings LIMIT 1 ) as city_ad,(SELECT city_admin_pos from settings LIMIT 1 ) as city_ad_pos, (SELECT mayor from settings LIMIT 1 ) as city_mayor, CONCAT(firstname,' ',lastname) as  fullname , address, plate_no, make, chassis_no, motor_no, reg_no, status, released_date, IFNULL(DATE_FORMAT(expiration_date,'%b %d %Y'),'') as exp, or_no, DATE_FORMAT(date_paid,'%b %d %Y') as paid, (filling_fee + franchise_fee) as total, (SELECT head from settings LIMIT 1 ) as head1, (SELECT head_pos from settings LIMIT 1 ) as head_pos, (SELECT head_office from settings LIMIT 1 ) as head_office FROM vehicle, operator, fees WHERE vehicle.MTOP_NO = operator.MTOP_NO AND vehicle.MTOP_NO = fees.MTOP_NO AND vehicle.MTOP_NO = $P{mtop_no} ORDER BY fees.ID DESC LIMIT 1
            $mtop = query("SELECT vehicle.MTOP_NO, CONCAT(firstname,' ',lastname) as  fullname , 
            address, plate_no, make, chassis_no, motor_no, reg_no, route, status, released_date, 
            expiration_date FROM vehicle JOIN operator ON vehicle.MTOP_NO = operator.MTOP_NO AND vehicle.MTOP_NO = ?", $_POST["mtop_no"]);
            //  $P{mtop_no}
            // dump($mtop);
            $mtop = $mtop[0];
            $pdf = new Pdf('printable_forms/renew1.pdf');
            $result = $pdf->fillForm([
				"mtop_no"    => $mtop["MTOP_NO"],
				"date_entry"    => date("F d, Y"),
				"operator_full"    => $mtop["fullname"],
				"address_home"    => $mtop["address"],
				"route"    => $mtop["route"],
				"make"    => $mtop["make"],
				"motor_no"    => $mtop["motor_no"],
				"chassis_no"    => $mtop["chassis_no"],
				"plate_no"    => $mtop["plate_no"],
				"reg_no"    => $mtop["reg_no"],
			
				])
                ->flatten()
				->saveAs("output_forms/".$_POST["mtop_no"]."_renew_1.pdf");
                $path = "output_forms/".$_POST["mtop_no"]."_renew_1.pdf";
                $filename=$_POST["mtop_no"]."_renew_1.pdf";
                $load[] = array('path'=>$path, 'filename' => $filename, 'result' => 'success');
                        $json = array('info' => $load);
                        echo json_encode($json);
                        exit();
        endif;

        if($_POST["action"] == "or_details"){
           $html = "";
            if($_POST["options"] == "etracs"):
                $cashreceipt = query_etracs("SELECT * FROM cashreceipt WHERE objid = ?", $_POST["id"]);
                $cashitems =  query_etracs("SELECT * FROM cashreceiptitem WHERE receiptid = ?", $_POST["id"]);
                // dump($cashitems);

                $html = $html . '
                <dl>
                <div class="row">
                    <div class="col-md-3">
                        <dt>OR Number</dt>
                        <dd>'.$cashreceipt[0]["receiptno"].'</dd>
                    </div>
                    <div class="col-md-3">
                    <dt>Total Amount</dt>
                    <dd>'.$cashreceipt[0]["amount"].'</dd>
                    </div>
                    <div class="col-md-6">
                    <dt>Paid By</dt>
                    <dd>'.$cashreceipt[0]["paidby"].' on '.$cashreceipt[0]["receiptdate"].'</dd>
                    </div>
                </div>
                </dl>
                ';

                $html = $html . '<table class="table table-bordered">';
                    $html = $html . '<thead>';
                        $html = $html . '<th>Item Title</th>';
                        $html = $html . '<th>Item Amount</th>';
                    $html = $html . '</thead>';
                    $html = $html . '<tbody>';
                        foreach($cashitems as $item):
                            $html = $html . '<tr>';
                                $html = $html . '<td>'.$item["item_title"].'</td>';
                                $html = $html . '<td>'.$item["amount"].'</td>';
                            $html = $html . '</tr>';
                        endforeach;
                    $html = $html . '</tbody>';
                $html = $html . '</table>';
            endif;

            echo($html);

        }



    }
	else {
		if(isset($_GET["action"])){
			if($_GET["action"] == "list"){
				render("public/mtop_system/mtop_form.php",[
				]);
			}


			if($_GET["action"] == "profile"){

				$mtop = query("select * from operator o
								left join vehicle v
								on v.MTOP_NO = o.MTOP_NO
								where o.MTOP_NO = ?", $_GET["mtop"]);
				// dump($mtop);

				render("public/mtop_system/mtop_profile.php",[
					"mtop" => $mtop[0],
				]);
			}
		}

        else{

            $mtop = query("SELECT *
            FROM vehicle
            WHERE expiration_date <= CURDATE()");
            // dump($mtop);
            

            render("public/award_system/award_form.php",[
                "mtop" => $mtop,
            ]);
        }
		

		
	}
?>
