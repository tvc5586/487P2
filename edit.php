<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
	    <?php echo 
		'<form method="post"> 
		 ID: <input type="text" name="id" maxlength="255" size="50"><br>
		 Name: <input type="text" name="name" maxlength="255" size="50"><br>
         Description: <input type="text" name="description" maxlength="511" size="50"><br>
		 Image link: <input type="text" name="image_link" maxlength="255" size="50"><br>
		 <input type="submit" name="updateName" value="Update item name"/>
		 <input type="submit" name="updateDescription" value="Update item description"/>
		 <input type="submit" name="updateImageLink" value="Update item imgae link"/>
		 <input type="submit" name="updateAll" value="Update all"/> 		 
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
			
				if(isset($_POST['updateName'])) {
					$id = $_POST['id'];
					$name = $_POST['name'];
					
					$sql = "UPDATE item SET name='$name' WHERE id='$id'";

					if ($conn->query($sql) === TRUE) {
					  echo "Record updated successfully";
					} else {
					  echo "Error updating record: " . $conn->error;
					}
				}
				if(isset($_POST['updateDescription'])) {
					$id = $_POST['id'];
					$description = $_POST['description'];
					
					$sql = "UPDATE item SET description='$description' WHERE id='$id'";

					if ($conn->query($sql) === TRUE) {
					  echo "Record updated successfully";
					} else {
					  echo "Error updating record: " . $conn->error;
					}
				}
				if(isset($_POST['updateImageLink'])) {
					$id = $_POST['id'];
					$image_link = $_POST['image_link'];
					
					$sql = "UPDATE item SET image_link='$image_link' WHERE id='$id'";

					if ($conn->query($sql) === TRUE) {
					  echo "Record updated successfully";
					} else {
					  echo "Error updating record: " . $conn->error;
					}
				}
				if(isset($_POST['updateAll'])) {
					$id = $_POST['id'];
					$name = $_POST['name'];
					$description = $_POST['description'];
					$image_link = $_POST['image_link'];
					
					$sql = "UPDATE item SET name='$name', description='$description', image_link='$image_link' WHERE id='$id'";

					if ($conn->query($sql) === TRUE) {
					  echo "Record updated successfully";
					} else {
					  echo "Error updating record: " . $conn->error;
					}
				}
				
			}
			$conn->close();
		?> 

		<?php echo '<form method="POST" action="list.php"> <input type="submit" value="Back to previous page"/> </form>'; ?>
    </body>
</html>