<?php
include 'connect.php';
session_start();
if (isset($_POST['confirmpayment'])) {
    $phone=$_POST['phone'];
    $amount= 350;

    $sql=mysqli_query($db,"SELECT * FROM customer_detail inner join product on product.id=customer_detail.product_id WHERE product_id='".$_SESSION['item']."'");
    $row=mysqli_fetch_assoc($sql);

    $insertpayment = mysqli_query($db,"INSERT INTO product_payment(product_id,amount) VALUES('".$_SESSION['item']."','".$amount."')");
    if ($insertpayment > 0) {
        $date=date("Y-m-d");
        $sql="INSERT INTO foundcontact(product_id,found_name,found_phone,email,date) VALUES('".$_SESSION['item']."','".$_SESSION['name']."','".$_SESSION['phone']."','".$_SESSION['email']."','".$date."')";
        $sqlresult=mysqli_query($db,$sql);
        if ($sqlresult > 0) {
             $update=mysqli_query($db,"UPDATE product set status='1' WHERE id='".$_SESSION['item']."'");
            if ($update) {
                if (!empty($row['email'])) {
                    $founderemail="email ye ni ".$row['email'];
                }
                $phonenumber=$_SESSION['phone'];
                $delivery=("Uwatoye ibintu byawe \n yitwa: ".$row['name']."  \n #Nimero ye ni: ".$row['phone']."\n ".$founderemail);
                $emailto=$_SESSION['email'];

                if (!empty($emailto)) {
                    $mailto = $emailto;
                    $mailSub = "Contact zivuye kuri rangisha.com";
                    $mailMsg = $delivery;
                    require '../email/email.php';
                    if($mail->Send()) {
                        $emailsuccess = TRUE;
                    }else{
                        $emailsuccess = TRUE;
                    }                 
                }
                else{
                    $emailsuccess = TRUE;
                }

                if ($emailsuccess) {
                    $_SESSION['success']= TRUE;
                    if (!empty($phonenumber)) {
                        require '../send_msgs/msg_file.php';
                        if ($httpcode == 200){
                            header("location: ../ibyatoraguwe.php");
                        }
                        else{
                            header("location: ../ibyatoraguwe.php");                        
                        }
                    }
                }
            }
        }
    }
}

?>