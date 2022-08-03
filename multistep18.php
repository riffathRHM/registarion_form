<?php
if ( isset( $_POST["step"]) ) {
	if($_POST["step"] == 1) {
		processStep1();
	} else if(move_uploaded_file($_FILES["fileSelectedField"]["tmp_name"],"C:\\Users\\cscuser.L01-HP16\\Pictures\\Saved Pictures\\".$_FILES["fileSelectedField"]["name"])){
		 echo "Your file was succesfully uploaded";
	 } else
	 {
		 echo "There was a problem your uploading file-Plaease try again";
	 }{
		processStep2();
	}
} else {
	displayStep1();
}

	function processStep1() {
			displayStep2();
		}
	
	function processStep2() {
			if ( isset( $_POST["submitButton"] ) and $_POST["submitButton"] == "< Back" ) {
				displayStep1();
			} else {
				displayThanks();
			}
		}
	function setValue( $fieldName ) {
			if ( isset( $_POST[$fieldName] ) ) {
				echo $_POST[$fieldName];
			}
		}
		
function displayStep1() {
			?>
			<h1>Member Signup: Step 1</h1>
			<form action="multistep18.php" method="post">
				<div style="width: 30em;">
					<input type="hidden" name="step" value="1" />
					<input type="hidden" name="lastName" value="<?php setValue( "lastName" ) ?>" />
					<label for="firstName">First name</label>
					<input type="text" name="firstName" value="<?php setValue( "firstName" ) ?>" />
					<br><br>
					
					<div style="clear: both;">
						<input type="submit" name="submitButton" value="Next &gt;" />
					</div>
				</div>
			</form>
			<?php
			}
			function displayStep2() {
			?>
				<h1>Member Signup: Step 2</h1>
				<form action="multistep18.php" method="post" enctype ="multipart/form-data">
					
						<label for = "fileSelectedField"> A file selected field: </label>
		                <input type="file" name ="fileSelectedField"  id="fileSelectedField" value=""/>
						<br><br>
						<div style="clear: both;">
							<input type="submit" name="submitButton" value="Next &gt;" />
							<input type="submit" name="submitButton" value="&lt; Back" style="margin-right: 20px;" />
						</div>
					</div>
				</form>
				<?php
				}
				function displayThanks() {
?>
 <h1>Thank You</h1>
	First Name: <?php echo $_POST["firstName"]; ?> <br><br>
	

 <p>Thank you, your details has been received.</p>
<?php
}
?>
 </body>
</html>