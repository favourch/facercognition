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

		$response   = $Facerecognition->verify($argumentArray);


		$character = json_decode($response);
		
		$dats  = $character->images;
		$id = "";
		$confidence = 0;
		
		foreach($dats as $key => $innerArray) {
			foreach($innerArray as $innerRow => $value){
							$id =$value->subject_id ;
							$confidence =  $value->confidence;
					 }
		}
		
		echo json_encode([$confidence,$id]);




?>