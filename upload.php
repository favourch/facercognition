

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>FACE RECOGNITION</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://pixlcore.com/demos/webcamjs/webcam.min.js"></script>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Face Recognition</a>
    </div>
  </nav>
   <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Upload  Image</h1>
      <div class="row center">
    <form enctype="multipart/form-data" id="recognize">


    <div class="form-group">
        <label for="studentId">ID</label>
        <input type="text" class="form-control" name="studentId" id="studentId1" placeholder="Enter unique identifier for the image uploaded.It can be use later on facerecognition. It can be STUDENT ID/EMPLOYEE ID/ OR THE NAME OF THE PERSON IN THE PICTURE" required="required">

      <input type="hidden" id="imgVal" name="imgVal">
      </div>
      <center><div id="my_camera"></div></center>
    <form>
    <button type="button" class="btn btn-primary" onClick="take_snapshot()" id="btn">Take A picture</button>
  </form>
   
   <img id="blah2" src="http://placehold.it/180" alt="your image"  width="300" />
      </div>
      <div class="row center">
        
           </form> 
    </div>
      <br><br>
    
    </div>
  </div>
  <!--  Scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script language="JavaScript">
    Webcam.set({
      width: 320,
      height: 240,
      image_format: 'jpeg',
      jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
  </script>
  <script language="JavaScript">
    function take_snapshot() {
      // take snapshot and get image data

      $('#btn').html('<span>Porcessing . .</span>')
      Webcam.snap( function(data_uri) {
      
        
        $('#blah2').attr('src',data_uri); 

        $('#imgVal').val(data_uri);   //image pass to imgVal input witn base64 image value



      $.ajax({
           url: "enroll.php" ,
           type: 'POST',
       dataType : "json",
           data: { 'studentId1':$('#studentId1').val(),'imgVal':$('#imgVal').val() },
           error: function(error) {
              alert('Something is wrong');
              console.log(error);
           },
           success: function(data) {
         console.log(data);
                alert("Record added successfully");  

        $('#btn').html('<span>Check</span>')
           }
        }); 
      
      } );
    }
  </script>
  <script type="text/javascript">
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

      function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>


 

  </body>
</html>
