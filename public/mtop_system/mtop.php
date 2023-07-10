<?php
// dump($_REQUEST);
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
		

		
	}
?>
