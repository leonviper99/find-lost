<?php 
if(isset($_POST['submit'])){
    $to = "muhayejules@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    
    $sent = mail($to,$subject2,$message2,$headers2); // sends a copy of the message to the sender
      
      if ($sent == true) {
         mail($from,$subject,$message,$headers);
          echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
       }
       else{
         echo "wap";
       }
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
   <div class="container mt-5 p-5">
      <form action="" method="post">
         First Name: <input type="text" name="first_name" class="form-control"><br>
         Last Name: <input type="text" name="last_name" class="form-control"><br>
         Email: <input type="text" name="email" class="form-control"><br>
         Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
         <input type="submit" name="submit" value="Submit">
      </form>
   </div>



</body>
</html> 