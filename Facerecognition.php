<?php

//------------------------------------
// Facerecogniton.php
// sends curl requests to Kairos ID API  
//------------------------------------


class Facerecognition {

 protected $hostname ='http://api.kairos.com/';
 protected $app_id = "a3b3e403";
 protected $app_key ="7aeddabf47f779ce448514a56f5a24f3";



  private function authenticationProvided()
  {
    if(count($this->app_key) > 0 && count($this->app_id) > 0)
    {
      return true;
    }

    return false;
  }

 

  public function enroll($args = array())
  {

    // to get base64
    // $image_data = base64_encode(file_get_contents($args["image_path"]));

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }


      $request_params = array(
                  "image"        => $args["image"],   
                  "gallery_name" => $args["gallery_name"], 
                  "subject_id"   => $args["subject_id"] );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "enroll" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;
  }


  public function detect($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array(
        "image"  =>  $args["image"]
      );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "detect" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;

  }

  public function verify($args = array())
  {

    if($this->authenticationProvided() == false)
    {
      return 'set your app_id and app_key before calling this method';
    }

      $request_params = array(
        "image"  =>  $args["image"],
        "subject_id"  =>  $args["subject_id"],
        "gallery_name"  =>  $args["gallery_name"]
      );

      // build request string
      $request = json_encode($request_params);

      try
      {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $this->hostname . "verify" );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, 
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request),
                'app_id: ' . $this->app_id,
                'app_key: '. $this->app_key)
            );

        $response = curl_exec($ch);

        curl_close($ch);

      }
      catch(Exception $ex)
      {
          return 'there was a problem';
      }

      return $response;

  }

  



}

?>