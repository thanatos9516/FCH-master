<?php
	include('session.php');
    function array (array $fileInfo = PATHINFO($_FILES["image"]["name"])){
        $result = array();
    }
    $id=$_POST['id'];

    while (array =! empty($_FILES["image"]["name"])){
        
        if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
     
        	mysqli_query($conn,"insert into carousel (productid,photo) values ('$id','$location')");
	?>
		<script>
			window.alert('Product added successfully!');
			window.history.back();
		</script>
	<?php
?>
        
    }

 