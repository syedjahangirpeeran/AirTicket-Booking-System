<html>
    <head>
        <title>
            Passenger details
        </title>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            .submit {
                text-align: center;
                }
            #loader {
                text-align: center;
                display: none;
                }
            #dvDistance {
                text-align: center;
                }
            .card {
                text-align: center;
                }
        </style>
    </head>
    <body>
    <form class = "container" method = "POST" action = "confirmation.php">
    <div class="row">
      <div class="col s12 m6">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title"> Enter your Details<br>
            <?php
            $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = 'lishat98';
            $dbname = 'MINI_PROJECT';
            $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            if($conn->connect_error) {
            die('Could not connect: ' . $conn->connect_error);
            }
            echo "Airline Name: ".$_REQUEST['airline']."</br>";
            echo "<span style = 'float:left;'>Source: ". $_REQUEST['source']."</span>";
            echo "<span style = 'float:right;'>Destination: ".$_REQUEST['destination']."</span><br>";
            echo "<span style = 'float:left;'>No. of Tickets to be booked: ".$_REQUEST['tickets']."</span>";
            echo "<input type='hidden' id = 'srce' name = 'srce' value ='".$_REQUEST['source']."'/>
            <input type='hidden' id = 'dest' name = 'dest' value ='".$_REQUEST['destination']."'/>
            <input type='hidden' id = 'aline' name = 'aline' value = '".$_REQUEST['airline']."' />
            <input type='hidden' id = 'ntckts' name = 'ntckts' value = '".$_REQUEST['tickets']."' />";
            ?>
            </span>
            <input type="text" id="pName" name = "pName" placeholder="Please Enter Your Name" />
            <input type="number" id="pAge" name = "pAge" placeholder="18" />
            <input type="text" id="gender" name = "gender" placeholder="M" />
            <input type="text" id="date" name = "date" placeholder="dd-mm-yyyy" />
            <br />
            <p class="submit">
              <input class="waves-effect waves btn" type="submit" value="Book"/>
            </p>
          </div>
        </div>
      </div>
    </div>
    <br />
    </form>
    </body>
</html>