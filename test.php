<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/****** 1st table ******/
$sql = "SELECT news, news_date, news_year, media_id, created_on, modified_on FROM ila_news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$sql = "INSERT INTO ila_news (news, news_date, news_year, media_id, created_on, modified_on) VALUES ('".mysql_real_escape_string(stripslashes($row["news"]))."', '".$row["news_date"]."', '".$row["news_year"]."', '".$row["media_id"]."', '".$row["created_on"]."', '".$row["modified_on"]."')";

		if ($conn->query($sql) === TRUE) {
			//$id =	mysqli_insert_id($conn);
			echo "Success for 1st";			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
} else {
    echo "0 results for 1st";
}

/****** 2nd table ******/
$sql1 = "SELECT news_id, title, short_desc, content FROM ila_news_lang";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
	// output data of each row
	while($row1 = $result1->fetch_assoc()) {
		$sql1 = "INSERT INTO ila_news_lang (news_id, title, short_desc, content, language_id) VALUES ('".$row1["news_id"]."', '".mysql_real_escape_string(stripslashes($row1["title"]))."', '".mysql_real_escape_string(stripslashes($row1["short_desc"]))."', '".mysql_real_escape_string(stripslashes($row1["content"]))."', 2)";

		if ($conn->query($sql1) === TRUE) {
			echo "Success for 2nd";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
} else {
	echo "0 results for 2nd";
}
/****** 2nd table ******/
?>