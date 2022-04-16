<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php
// define variables and set to empty values

$nameErr = $emailErr = "";
$name =$phone = $email = "";

$insert = false;

if(isset($_POST['submit'])){
$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server,$username,$password);

if(!$con){
    die("connecting to this database failed due to ".mysqli_connect_error());
}
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $nameErr = "Name is required";
        // echo '<script>alert("Name is required")</script>';
        // exit();
      } 
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
          // echo '<script>alert("Only letters and white space allowed in the name")</script>';
          // exit();
        }
        else{
          $name1=$name;
        }
      if(empty($_POST["email"])) {
        $emailErr = "Email is required";
        // echo '<script>alert("Email is required")</script>';
        // exit();
      } 
      $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          // echo '<script>alert("Invalid email format")</script>';
          // exit();
        }
        else{
          $email1=$email;
        }
        if(isset($name1) && isset($email1) && isset($phone)){
            $sql="INSERT INTO `landing_page`.`landing_page` (`name`, `email`, `phone`) VALUES ('$name1', '$email1', '$phone');";
            if($con->query($sql) == true){
              echo "<p class='output' style='color: green;' > Thank you for Registering with us your Registration has been successfull </p>";
              $insert = true;
              exit();
            }
            $con->close();
        }
}}
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <img class="bg" src="background.avif" alt="" style="height:55%;">
    <!-- <i class="fa fa-phone" style="font-size:24px"></i> -->
    <br>
    <div class="contain">
    <h1 class="heading">51 balewadi Residences,pune</h1>
    <h3 class="heading">2 BHK Homes | Starting &#8377;69 lakhs</h3>
    <h2 class="heading">Avail Pre-Launch Offers</h2>
    <div class="formdata">
    <form action=intern.php method="post" style="display:flex; flex-direction:column;">
    Name: <input type="text" name="name" placeholder="Enter your name" style="margin-bottom:1vh;">
    <span class="error">* <?php echo $nameErr;?></span>
    E-mail:<input type="text" name="email" placeholder="Enter your email" style="margin-bottom:1vh;">
    <span class="error">* <?php echo $emailErr; ?></span>
    phone:<input type="tel" name="phone" id="" placeholder="Enter your phone no." style="margin-bottom:1vh;">
    <!-- <button class="btn" type="submit" name="submit" style="margin-top: 2vh;">Book now</button> -->
    <input class="btn" type="submit" name="submit" value="Book now" style="margin-top: 2vh;">
    </form>
    </div>
    </div>
    <div class="contain2">
        <img src="prop_type.jpg" alt="" style="width: 8vw;">
        <img src="config.png" alt="" style="width: 8vw;">
        <img src="pricing.png" alt="" style="width: 8vw;">
    </div>
    <div class="contain3">
        <h4 style="width: 9vw;">property type Residential apts</h4>
        <h4 style="width: 9vw;">configuration 2 BHK</h4>
        <h4 style="width: 9vw;">pricing <br> &#8377;69lakhs(all incl) </h4>
    </div>
    <div class="contain4">
        <img class="bg_3" src="bg_3.jpg" alt="">
        <h2 class="second" >Tornado</h2>
        <p class="second">By Shapoorji Pallanji</p>
        <p class="second">Tornado
            By Shapoorji Pallonji
            P51 Balewadi Residences is a landmark residential project offering luxurious apartments. Developed by the leading developer, Utsav Homes Group, the stunning structure is situated in Pune’s most enviable location, Balewadi.
        </p>
        <br>
    </div>
    <div class="contain5">
        <img class="bg_3" src="bg_4.jpg" alt="">
        <h2 class="third">Key Project Highlights</h2>
        <h3 class="third">Only 9 Towers in 10.5 Acres | 75% Open Space</h3>
    </div>
    <div class="contain6">
        <img class="bg_3" src="bg_5.jpg" alt="">
        <h2>About Shapoorji</h2>
        <p class="second">P51 Balewadi Residences is a landmark residential project offering luxurious apartments. Developed by the leading developer, Utsav Homes Group, the stunning structure is situated in Pune’s most enviable location, Balewadi.</p>
    </div>
</body>
</html>