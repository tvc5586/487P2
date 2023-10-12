<!DOCTYPE html>
<html>
    <head>
        <title>Remove</title>
    </head>
    <body>
	    <?php echo 
		'<form method="post"> 
		 ID: <input type="text" name="id" maxlength="255" size="50"><br>
         <input type="submit" name="submit" value="Remove item"/> 		 
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
					$id = $_POST['id'];
					
					$sql = "DELETE FROM item WHERE id='$id'";

					if ($conn->query($sql) === TRUE) {
					  echo "Record deleted successfully";
					} else {
					  echo "Error deleting record: " . $conn->error;
					}
				}
				
			}
			$conn->close();
		?> 

		<?php echo '<form method="POST" action="list.php"> <input type="submit" value="Back to previous page"/> </form>'; ?>
    </body>
</html>