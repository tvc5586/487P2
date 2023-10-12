<!DOCTYPE html>
<html>
    <head>
        <title>Browse</title>
    </head>
    <body>
	    <?php echo 
		'<form method="post"> 
         <input type="submit" name="sortID" value="Sort by ID"/> 
         <input type="submit" name="sortName" value="Sort by Name"/> 
		 </form>';
		?>
		
		<?php echo 
		'<form method="post"> 
		 <input type="submit" name="searchID" value="Search by ID"/> 
         <input type="submit" name="searchKeyword" value="Search by Keyword"/>
		 : <input type="text" name="word"><br>		 
		 </form>';
		?>
		
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "p2";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} else {
			
				if(isset($_POST['sortID'])) {
					$sql = "SELECT id, name, description, image_link FROM item ORDER BY id";
				} 
				if(isset($_POST['sortName'])) {
					$sql = "SELECT id, name, description, image_link FROM item ORDER BY name";
				}
				if(isset($_POST['searchID'])) {
					$word = $_POST['word'];
					$sql = "SELECT id, name, description, image_link FROM item WHERE id = '$word'";
				}
				if(isset($_POST['searchKeyword'])) {
					$word = $_POST['word'];
					$sql = "SELECT id, name, description, image_link FROM item WHERE LIKE '%$word%' OR description LIKE '%$word%'";
				} else {
					$sql = "SELECT id, name, description, image_link FROM item";
				}
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo $row["id"]. " " . $row["name"]. '<br>';
						echo "Description: " . $row["description"]. "<br>";
					
						$image = $row["image_link"];
						$imageData = base64_encode(file_get_contents($image));
						echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
						
						echo "\r\n". "<br>";
					}
				} else {
					echo "0 results";
				}
			}
			$conn->close();
		?> 

		<?php echo '<form method="POST" action="index.php"> <input type="submit" value="Back to index page"/> </form>'; ?>
    </body>
</html>