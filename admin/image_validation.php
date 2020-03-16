<?php
//echo "dfgdsgds";exit();
/*echo "ftrutrutrur<pre>";print_r($_FILES); */
$response['type']="success";
foreach($_FILES as $key =>$values){
  // echo "<pre>";print_r($values);
        //Video Validation
    //echo $key.$values['name'];
    if($values["name"]!=''){
   if ( $key=="video") {
             $allowed_video_extension = array(
                "mp4",
            );
            $file_extension1 = pathinfo($values["name"], PATHINFO_EXTENSION);
              
               /* if (! file_exists($values['tmp_name'])) {
                    $response[$key] = array(
                        "type" => "error",
                        "message" => "Choose video file to upload."
                    ); $response['type']="error";
                 
                } else*/ if (! in_array($file_extension1, $allowed_video_extension)) {
                        $response[$key] = array(
                            "type" => "error",
                            "message" => "Upload valid format. Only mp4 allowed."
                        );
                        $response['type']="error";
                }  else if (($values["size"] > 90485760))  {  //90MB  90485760
                       $response[$key] = array(
                            "type" => "error",
                            "message" => "Video size exceeds 90MB"
                        );
                       $response['type']="error";
                }
              
    } else {
       // / echo $key;
         // Get Image Dimension
                $fileinfo = @getimagesize($values['tmp_name']);
                 $width = $fileinfo[0];
                 $height = $fileinfo[1];
               
                $allowed_image_extension = array(
                    "png",
                    "jpg",
                    "jpeg",
                );
                 $target = "../images/" . basename($values["name"]);
                // Get image file extension
                $file_extension = pathinfo($values["name"], PATHINFO_EXTENSION);
                
                // Validate file input to check if is not empty
               /* if (! file_exists($values['tmp_name'])) {
                    $response[$key] = array(
                        "type" => "error",
                        "message" => "Choose image file to upload."
                    ); $response['type']="error";
                }    else  */
                // Validate file input to check if is with valid extension
               if (! in_array($file_extension, $allowed_image_extension)) {
                   $response[$key]  = array(
                        "type" => "error",
                        "message" => "Upload valiid images. Only PNG and JPEG are allowed."
                    ); $response['type']="error";
                }    
                // Validasste image file size
                else if (($values["size"] > 10485760)) //10MB
                {    
                    $response[$key]  = array(
                        "type" => "error",
                        "message" => "Image size exceeds 10MB"
                    ); $response['type']="error";
                }    
                // Validate image file dimension
                /*else if (file_exists($target)) {
                        $response = array(
                        "type" => "error",
                        "message" => "Sorry, file already exists."
                    ); $response['type']="error";
                }*/
                // check file already exists.
                else if ($_SESSION['img_val']!='customer' && $width < 2000 && $height < 2000) {
                    $response[$key]  = array(
                        "type" => "error",
                        "message" => "Image dimension  greater than or equal to 2000X2000 pixels"
                    ); $response['type']="error";
                } else if ($_SESSION['img_val']=='customer' && ($width > 500 && $width < 700 )  && ( $height > 550 && $height < 750)) {
                    $response[$key]  = array(
                        "type" => "error",
                        "message" => "Image dimension  greater than or equal to 500X550 pixels"
                    ); $response['type']="error";
                } 
                    // ........video validation.....
               
               }
   }

}  //echo "<pre>";print_r($response);
?>