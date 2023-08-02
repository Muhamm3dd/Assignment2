<?php

// Include database file
include 'database.php';
$n = $_POST['name'];
echo $n;
$customerObj = new database();

// Insert Record in customer table
if(isset($_POST['submit'])) {
  $customerObj->insertData($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coop Services</title>
  <meta name="description" content="form">
  <meta name="robots" content="noindex, nofollow">
  <!--  Add our Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  <!--  Add our Bootstrap  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--  Add our custom CSS  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <script>
function toggleAboutInfo() {
  var aboutInfo = document.getElementById("about-info");
  aboutInfo.classList.toggle("show");
}
</script>

  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}
header{
  width: 100%;
  height: 200px;
  background: #152733;
  display: flex;
  align-items: center;
  justify-content: center;
}


html, body {
    height: 100%;
    background-color: #152733;
    overflow: scroll;
}


.form-holder {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    padding: 60px;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #fff;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #fff;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}


.form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
    color: #fff;
}

.form-content input[type=text], .form-content input[type=email],.form-content input[type=text], .form-content input[type=text], .form-content input[type=number], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}


.btn-primary{
    background-color: #6C757D;
    outline: none;
    border: 0px;
     box-shadow: none;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active{
    background-color: #495056;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}

.form-content textarea {
    position: static !important;
    width: 100%;
    padding: 8px 20px;
    border-radius: 6px;
    text-align: left;
    background-color: #fff;
    border: 0;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    outline: none;
    resize: none;
    height: 120px;
    -webkit-transition: none;
    transition: none;
    margin-bottom: 14px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #ebeff8;
    color: #8D8D8D;
}

.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}

.invalid-feedback{
    color: #ff606e;
}

.valid-feedback{
   color: #2acc80;
}

</style>
</head>
<body>
<?php include 'navbar.php'; ?> <!-- Include the navigation bar file -->

  <header>
    <h1>Student Services | Coop Department</h1>
  </header>
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <h2>Fill the data below</h2>
          </div>
          <div class="card-body bg-light">
            <form action="index.php" method="POST">
              <div class="form-group">
                <label for="Name">Student Name:</label>
                <input type="text" class="form-control" name="Name" placeholder="Enter name" required="">
              </div>
              <div class="form-group">
                <label for="Email">College Email</label>
                <input type="email" class="form-control" name="Email" placeholder="Enter college email" required="">
              </div>
              <div class="form-group">
                <label for="Program">Program Name</label>
                <input type="text" class="form-control" name="Program" placeholder="Enter your Program name" required="">
              </div>
              <div class="form-group">
                <label for="Course">Favourite Course</label>
                <input type="text" class="form-control" name="Course" placeholder="Enter your favourite course" required="">
              </div>
              <div class="form-group">
                <label for="GPA">Previous Result</label>
                <input type="number" class="form-control" name="GPA" placeholder="(in GPA)" required="">
              </div>
              <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
              <input class="btn btn-dark reset" type="reset" value="Clear">

            </form>
          </div>
        </div> 
      </div>
    </div>
  </section>
  <footer>
  <p style="position: relative; bottom:100; padding: 10px;"><?php include 'navbar.php'; ?> </p>
  <p ><a href= "https://www.linkedin.com/in/muhamm3dd"> @muhammad</a> </p>
</footer>
</body>
</html>
