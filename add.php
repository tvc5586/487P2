<!DOCTYPE html>
<html>
    <head>
        <title>Add</title>
    </head>
    <body>
	    <?php echo 
		'<form method="post"> 
		 Name: <input type="text" name="name" maxlength="255" size="50"><br>
         Description: <input type="text" name="description" maxlength="511" size="50"><br>
		 Image link: <input type="text" name="image_link" maxlength="255" size="50"><br>
		 <input type="submit" name="submit" value="Add item"/> 		 
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
			
				if(isset($_POST['submit'])) {
					$name = $_POST['name'];
					$description = $_POST['description'];
					$image_link = $_POST['image_link'];
					
					$sql = "INSERT INTO item (name, description, image_link) VALUES ('$name', '$description', '$image_link')";

					if ($conn->query($sql) === TRUE) {
					  echo "New record created successfully";
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				
			}
			$conn->close();
		?> 

		<?php echo '<form method="POST" action="list.php"> <input type="submit" value="Back to previous page"/> </form>'; ?>
    </body>
</html>