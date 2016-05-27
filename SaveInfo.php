

<?php

$servername = "127.0.0.1";
$username = "hanapuan";
$password = "warEhou!se";
$dbname = "hanapuan";


$conn = new mysqli($servername, $username, $password, $dbname);

 if($conn->connect_error){
        die("Connection to ShippingInfo Failed: ". $conn->connect_error);
}
else{
	echo "Yay!";
}

echo $_POST['shipFname'];
/*
$sql = "INSERT INTO ShippingInfo (FirstName, LastName, Street, Rm, City, State, Zipcode) VALUES ( $_POST['shipFname'], $_POST['shipLname'], $_POST['shipStreet'], $_POST['shipRm'], $_POST['shipCity'], $_POST['shipState'], $_POST['shipZipcode'])";
echo $sql;

  if($conn->query($sql) === TRUE){
  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();

$dbname = "BillingInfo";

$conn2 = new mysqli($servername, $username, $password, $dbname);

if($conn2->connect_error){
        die("Connection to BillingInfo Failed: ". $conn2->connect_error);
}

$sql2 = "INSERT INTO BillingInfo (FirstName, LastName, Street, Rm, City, State, Zipcode) VALUES ( $_POST['billFname'], $_POST['billLname'], $_POST['billStreet'], $_POST['billRm'], $_POST['billCity'], $_POST['billState'], $_POST['billZipcode'])";

  if($conn2->query($sql2) === TRUE){
  }else{
    echo "Error: " . $sql2 . "<br>" . $conn2->error;
  }

$conn2->close();
 */
?>
