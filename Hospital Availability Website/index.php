<?php

$conn = mysqli_connect('localhost','root','','hs') or die('connection failed');



if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   
   $Hospital_Name = mysqli_real_escape_string($conn, $_POST['Hospital_Name']);
   $number = $_POST['number'];
   $date = $_POST['date'];
   
   $insert = mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, date,Hospital_Name) VALUES('$name','$email','$number','$date','$Hospital_Name')") or die('query failed');
   if($insert){
      $message[] = 'appointment made successfully!';
      
        
      
   }else{
      $message[] = 'appointment failed';
   }
   

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Website</title>
       

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> <strong>Care </strong>connect </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#services">Dashboard</a>
        <a href="#doctors">doctors</a>
        <a href="#appointment">appointment    </a>
        <button onclick="warn()" style="font-size:15px;padding:13px;border-radius:18px;margin-left: 15px;width:85px"><b>SOS</b></button> 
        
        
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="image">
        <img src="image/Hospital.gif" alt="">
    </div>

    <div class="content">
        <h3>Choose the healthcare that you trust</h3>
        <p> A person who has good physical health is likely to have bodily functions and processes working at their peak.</p>
        <a href="#appointment" class="btn"> Get appointment <span class="fas fa-chevron-right"></span> </a>
    </div>

</section>

<!-- home section ends -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons anim">
        <i class="fas fa-user-md"></i>
        <h3>150+</h3>
        
        <p>doctors at work</p>
    </div>

    <div class="icons anim">
        <i class="fas fa-users"></i>
        <h3>1030+</h3>
        <p>satisfied patients</p>
    </div>

    <div class="icons anim">
        <i class="fas fa-procedures"></i>
        <h3>490+</h3>
        <p>bed facility</p>
    </div>

    <div class="icons anim">
        <i class="fas fa-hospital"></i>
        <h3>50+</h3>
        <p>available hospitals</p>
    </div>

</section>

<!-- icons section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="image/Doctor's office.gif" alt="">
        </div>

        <div class="content">
            <h3>We make sure that you get the treatement that you deserve</h3>
            <p>Welcome to Our care, a state-of-the-art healthcare facility dedicated to providing excellent medical services to our patients. We are committed to delivering the highest quality care to ensure the best possible outcomes for our patients.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading">  <span>Dashboard</span> </h1>
    <div class="drop">
    
        <p >
         <span style="font-size:30px">Hospital:</span>
        </p>
        <div class="card-body">

            
                <form action="" method="POST">     
                <div class="hello1">
                    <select name="id" style="font-size:20px">
                        <option value="">Select any one</option>
                        <option value="Apollo Hospital" selected>Apollo Hospital</option>
                        <option value="P. KMC Hospital">P. KMC Hospital</option>
                        <option value="Wenlock">Wenlock</option>
                    </select>
                </div>
                <div id="sub">
                <input type="submit" name="search" value="Search Data">
                </div>
            </form>
                      
        </div>
    </div>      
    <!--retrieve no of beds-->  
 <?php
 $con = mysqli_connect('localhost','root','','beds') or die ('connection failed');
 if(isset($_GET['Hospital'])){
    $categoryname=$_GET['Hospital'];
    $sql="SELECT * FROM beds WHERE Hospital=$categoryname";
        if($result = mysqli_query($con,$sql)){
            if($mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    $dbselected=$row['Hospital'];

        }
        mysqli_free_result($result);
    }
    else
    {
        echo "Something went wrong";
    }
  }
  else
  {
    echo "Couldnt execute";
  }
  }
  if(isset($_POST['search']))
  {
    $Hospital=$_POST['id'];
    $query="SELECT * FROM beds where Hospital='$Hospital'";
    $query_run=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($query_run))
    {
        ?>
            <form action="" method="POST">
                
                <input type="hidden" name="Hospital" value="<?php echo $row['Hospital']?>"/>
                <input type="hidden" name="Total beds" value="<?php echo $row['Total beds']?>"/>
                <input type="hidden" name="ICU beds" value="<?php echo $row['ICU beds']?>"/>
                <input type="hidden" name="Ventilator" value="<?php echo $row['Ventilator']?>"/>
                <input type="hidden" name="Non icu beds with oxy" value="<?php echo $row['Non icu beds with oxy']?>"/>
                <input type="hidden" name="Locate Hospital" value="<?php echo $row['Locate Hospital']?>"/>
            </form>
        <?php    
    }
 }
 ?>        
    <div class="box-container">
    
        <div class="box anim">
            <i class="fa fa-bed"></i>
            <h3>Total beds</h3>
           <div class="a1" style="font-size:40px">
                <?php
                $Hospital=$_POST['id'];
                $query="SELECT * FROM beds where Hospital='$Hospital'";
                $query_run=mysqli_query($con,$query);
                $row=mysqli_fetch_array($query_run); 
                echo $row['Total beds']?>
           </div>     
            
        </div>

        <div class="box anim">
            <i class="fa fa-bed"></i>
            <h3>ICU Beds</h3>
            <div class="a1" style="font-size:40px">
             <?php echo $row['ICU beds']?>
            </div> 
            
            
        </div>

        <div class="box anim">
            <i class="fa fa-heartbeat"></i>
            <h3>Ventilator</h3>
            <div class="a1" style="font-size:40px">
                <?php echo $row['Ventilator']?>
            </div>    
            
            
        </div>

        <div class="box anim">
            <i class="fa fa-plus-square"></i>
            <h3>Non ICU beds</h3>
            <div class="a1" style="font-size:40px">
                <?php echo $row['Non icu beds with oxy']?>
            </div>
            
        </div>

        <div class="box anim"  >
            <i class="fa fa-map-marker"></i>
            <h3>Locate Hospital</h3>
            <div class="a1">
            
             <?php echo $row['Locate Hospital'];
                ob_start();

                // Echo a string
                echo $row['Location url'];
                
                // Store the output in a variable
                $output = ob_get_clean();
                
                // Output the variable
                 
                
                

                
                    $link_text = "<br />Check in google maps";
                
                
                echo "<a href=\"$output\" target='_blank'>$link_text</a>";
                
                ?>
            
            </div>
             <script>
                    
                    
                    function warn()
                    {
                        window.open("https://www.google.com/maps/search/hospitals+near+me/@15.4148273,75.6324465,15z/data=!3m1!4b1", "_blank");
 
            
        }
     
                    
                
             </script>
                
            
            
        
            
        </div>

        

    </div>

</section>

<!-- services section ends -->



<!-- doctors section starts  -->

<section class="doctors" id="doctors">

    <h1 class="heading"> our <span>doctors</span> </h1>
    

    <div class="box-container">

        <div class="box">
            <div class="box1">
                <img src="image/dr-1.jpg" alt="">
                <h3>Dr. Naresh Trihanth</h3>
                <span>expert doctor</span>
                <div class="share">
                    
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
</div>
            </div>
            
        </div>

        <div class="box">
            <div class="c1">
            <img src="image/dr-2.jpg" alt="">
            <h3>Dr. Sudanshu Bhatta</h3>
            <span>expert doctor</span>
            </div>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <div class="hover">
            <h3>This is doctor Sudarshan Bhatt.please cope up with me</h3>
            </div>

        </div>   
            

        <div class="box">
            <img src="image/dr-3.jpg" alt="">
            <h3>Dr. Ashish Sabarwal</h3>
            <span>expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>

        <div class="box">
            <img src="image/dr-4.jpg" alt="">
            <h3>Dr. Aditya Gupta</h3>
            <span>expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>

        <div class="box">
            <img src="image/dr-5.jpg" alt="">
            <h3>Dr. HS Chabra</h3>
            <span>expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>

        <div class="box">
            <img src="image/dr-6.jpg" alt="">
            <h3>Dr. Gaurava kariya</h3>
            <span>expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>
        <div class="box">
            <img src="image/dr-7.jpg" alt="">
            <h3>Dr. Mohammed rela</h3>
            <span>intern doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>
        <div class="box">
            <img src="image/dr-8.jpg" alt="">
            <h3>Dr. Sanjav Sachdev</h3>
            <span>expert doctor</span>
            <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
        </div>
        

    </div>

</section>

<!-- doctors section ends -->

<!-- appointmenting section starts   -->

<section class="appointment" id="appointment">

    <h1 class="heading"> <span>appointment</span> now </h1>    

    <div class="row">

        <div class="image">
            <img src="image/PrescribeWellness - Beginnings.gif" alt="">
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <?php
             if(isset($message)) {
                    foreach($message as $message) {
                    echo'<p class ="message">'.$message.'</p>';
                }
                }
            ?>
      
            <h3>Appointment form</h3>
            <input type="text"name="name" placeholder="your name" class="box">
            <input type="number"name="number" placeholder="your number" class="box">
            <input type="email"name="email" placeholder="your email" class="box">
            <input type="date"name="date" class="box">
            <input type="text"name="Hospital_Name" placeholder="enter hospital" class="box">
            
            
                
            <input type="submit" name="submit" value="Confirm" class="btn">
        </form>

    </div>

</section>

<!-- appointmenting section ends -->

<!-- review section starts  -->



<!-- review section ends -->

<!-- blogs section starts  -->



<!-- footer section ends -->


<!-- js file link  -->
<script src="js/script.js"></script>

</body>
</html>