<?php
if(isset($_FILES["file"]) && $_FILES["file"]["type"] == "text/csv"){
	include 'wp-content/themes/csvUploadCombineApi/generateCsv.php';
} else{
	get_header();
	
	if(isset($_FILES["file"]["type"])){
		?>
		<div class="alert alert-danger errorMessage">Please upload a CSV</div>
		<?php
	}
	?>
	<div id="left"> 
	Please Upload the CSV you want combined with the API
	</br></br>
	<form action="" method="post"  enctype="multipart/form-data">
		<input type="file" name="file" id="file" />
	</br>
		<input type="submit" name="submit" value="Upload" class="submitButton btn btn-primary" />
	</form>
</div>
<script>
$(document).ready(function () {
	$('.submitButton').click(function () {
	    $('.errorMessage').hide();
	});
});
</script>
<?php 
get_footer();
}
?>