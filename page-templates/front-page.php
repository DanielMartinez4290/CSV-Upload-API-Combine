<?php
if(isset($_FILES["file"]) && $_FILES["file"]["type"] == "text/csv"){
	
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	ini_set('auto_detect_line_endings',true);

	$csvAsArray = array_map('str_getcsv', file($_FILES["file"]['tmp_name']));
	$csvHeaders = ['Account ID', 'First Name', 'Created On', 'Status', 'Status Set On'];
	$fp = fopen('php://output', 'w');
	fputcsv($fp, $csvHeaders);

	for($i=1; $i<count($csvAsArray);$i++){
		$accountId = $csvAsArray[$i][0];
		
		$response =wp_remote_get('http://interview.wpengine.io/v1/accounts/'.$accountId);
		$api_response = json_decode( wp_remote_retrieve_body( $response ), true );
		$accountInfo = [$accountId,$csvAsArray[$i][2],$csvAsArray[$i][3],$api_response['status'],$api_response['created_on']];
		fputcsv($fp, $accountInfo);
	}

	fclose($fp);
} else{
	get_header();

	echo '<div id="left"> 
		Please Upload the CSV you want combined with the API
		</br></br>
		<form action="" method="post"  enctype="multipart/form-data">
			<input type="file" name="file" id="file" />
		</br>
			<input type="submit" name="submit" value="Upload" class="submitButton btn btn-primary" />
		</form>
	</div>';

	get_footer();
}

?>