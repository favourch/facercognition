<?php

include('Facerecognition.php');


$Facerecognition = new Facerecognition();


	    $subject_id = $_POST['studentId1'];
		$gallery_name = 'students';
		$img = $_POST['imgVal'];

		$argumentArray =  array(
								"image" => $img,
								"subject_id" => $subject_id,
								"gallery_name" => $gallery_name
							);

		$response   = $Facerecognition->enroll($argumentArray);


		
		echo json_encode([$response]);




?>