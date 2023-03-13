<?php 
  
$db= new mysqli("localhost","root","","try");
if (isset($_POST['submit'])) {
    $stmt= $db->prepare("INSERT INTO try(post) VALUES(?)");
    $stmt->execute([$_POST['value']]);
}

?> 
<!DOCTYPE html>
<html>
<head>
    <title></title>
<script>
    function validate() {
        var x = document.forms["myForm"]["value"].value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
    }
</script>
</head>
<body>
    <div style='max-width: 400px; margin: auto; border: 2px solid #696969;border-radius: 5px;padding: px;'>
        <div style='text-align: center; padding-bottom: 1px; margin-top: -20px; background-color: #FFE4B5'><h2><b>Rangisha.com</b></h2></div>
        <h5 style='padding: 0px 5px'>kksfglsdfgasdf</h5>
    </div><br>
    <form method="POST" action="" onsubmit="return validate()" name="myForm">
        <input type="text" name="value"><br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>