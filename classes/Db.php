<?php

namespace classes;

class Db extends Database
{

	public function getAll(){
		$conn = $this->connect();
		$sql = "SELECT * FROM guest_info";
		$result = mysqli_query($conn, $sql);
		$var = array();
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$var[] = $row;
				//echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Date of birth: " . $row["dateOfBirth"]. "<br>";
			}
		} else {
			echo "0 results";
		}

		mysqli_close($conn);
	}


}