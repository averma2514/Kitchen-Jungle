<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Book Your Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="datepicker.css">
    <link rel="stylesheet" href="style.css">
  </head>

    <body>
      <div class="inner-layer">
          <div class="container">
            <div class="row no-margin">
                <div class="col-sm-7">
                    <div class="content">
                        <h1>Book Your Table Now and Eat Your favorite Food</h1>

                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-data">
                        <div class="form-head">
                            <h2>Book Your Table</h2>
                        </div>
                        <div class="form-body">
                            <div class="row form-row">
                              <input type="text" placeholder="Enter Full name" class="form-control">
                            </div>
                            <div class="row form-row">
                              <input type="text" placeholder="Enter Mobile Number" class="form-control">
                            </div>
                             <div class="row form-row">
                              <input type="text" placeholder="Enter Email Adreess" class="form-control">
                            </div>
                           <div class="row form-row">
                              <input id="dat" type="text" placeholder="Booking Date" class="form-control">
                            </div>
                            
                             <div class="row form-row">
                               <button class="btn btn-success btn-appointment">
                                 Book Your Table
                               </button>
                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
      
    </body>

    <script src="jquery-3.3.1.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootstrap-datepicker.js"></script>

    <script>
      $(document).ready(function(){
          $("#dat").datepicker();
      })
    </script>
    
  </body>
</html>