<?php if(isset($_POST["username"]))  
{
	// Read the form values
	$success = false;
	$userName = isset( $_POST['username'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username'] ) : "";
	$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$senderNum = isset( $_POST['mobile'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['mobile'] ) : "";
	$message = isset( $_POST['contact_message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|mobile-Type:)/", "", $_POST['contact_message'] ) : "";
	
		/* FILE UPLOAD */
		if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
 
    // check if file has one of the following extensions
    $allowedfileExtensions = array('doc', 'docx', 'pdf' );
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $cmessage = 'https://plentyofthings.com/en/uploaded_files/' . $newFileName;
      }
      else
      {
        $cmessage = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $cmessage = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $cmessage = 'There is some error in the file upload. Please check the following error.<br>';
    $cmessage .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
				/* end FILE UPLOAD */

	//Headers
	$to = "hr@plentyofthings.com"; // Your email address goes here
    $subject = 'Plenty Website - Careers Form';
    $headers = "From: Career Form <noreply@plentyofthings.com>";
    $headers .= "\nMIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	//body message
	$message = "Name: ". $userName . "<br>
	Email: ". $senderEmail . "<br>
	Phone Number: ". $senderNum . "<br>
	
	Message: " . $message . "" .
	"<br><br>CV: ". $cmessage . "<br>";
	
	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);

    echo ($send_email) ? '<div class="success">Email has been sent successfully.</div>' : 'Error sending. Please try again later.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}
else
{
	echo '<div class="failed">Error: Faild to send. Please try again later.</div>';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>   