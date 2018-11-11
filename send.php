<html>
<body>
<?php

$formdata = (string)$_POST["name"];

error_reporting(E_ALL ^ E_WARNING); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalrecord";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT patientID, fullName, gender, telephoneNum, race, family, illness FROM patient WHERE fullName='$formdata'";
$result = $conn->query($sql);

$name = '';
$tel = '';
$message = '';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["patientID"]. " - Name: " . $row["fullName"]. " - Gender: " . $row["gender"]. "<br>";
		$name = $row["fullName"];
		$tel = $row["telephoneNum"];
		$message = "Emergency relating to: ".$row["illness"];
    }
} else {
    echo "0 results";
}

$conn->close();


$url = "https://jjohn502.lib.id/message@dev/?message=".$message."&tel=".$tel."&name=".$name."";


?>

<script>
    window.open('<?php echo $url?>', '_blank');
</script>

<h1>Message Successfully Sent</h1>
</body>
</html>