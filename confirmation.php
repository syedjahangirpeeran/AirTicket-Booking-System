<html>
    <head>
        <title>
                Booking confirmation
        </title>
        <style>
    body {
            background-image: url("https://www.planwallpaper.com/static/images/1916561.jpg");
            background-size: cover;
            font-family: sans-serif;
            font-size:24px;
     
    }
    .button {
    background-color: #1E90FF; /* Green */
    border: none;
    color: white;
    padding: 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
}

.button3 {border-radius: 12px;}

    </style>
    </head>
    <body>
    <br><br><br><br><br><br><br>
        <table align=center>
        <tr>
        <td>
        <?php
        $dbhost = 'localhost:3306';
        $dbuser = 'root';
        $dbpass = 'lishat98';
        $dbname = 'MINI_PROJECT';
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if($conn->connect_error) {
        die('Could not connect: ' . $conn->connect_error);
        }
        $tickets = $conn->query("SELECT TICKETS FROM ROUTES WHERE Airline_ID = (SELECT Airline_ID FROM AIRLINES WHERE Airline_name = '".$_REQUEST['aline']."') AND Source_ID = (SELECT Airport_ID FROM AIRPORTS WHERE Airport_city = '".$_REQUEST['srce']."') AND Dest_ID = (SELECT Airport_ID FROM AIRPORTS WHERE Airport_city = '".$_REQUEST['dest']."');");
        $number = $tickets->fetch_assoc();
        $query = $conn->query("UPDATE ROUTES SET TICKETS = ".($number['TICKETS']-$_REQUEST['ntckts'])." WHERE Airline_ID = (SELECT Airline_ID FROM AIRLINES WHERE Airline_name = '".$_REQUEST['aline']."') AND Source_ID = (SELECT Airport_ID FROM AIRPORTS WHERE Airport_city = '".$_REQUEST['srce']."') AND Dest_ID = (SELECT Airport_ID FROM AIRPORTS WHERE Airport_city = '".$_REQUEST['dest']."');");
        $history = $conn->query("INSERT INTO Book_History (Name, Age, Gender, Date, Booking_Date) VALUES('".$_REQUEST['pName']."',".$_REQUEST['pAge'].", '".$_REQUEST['gender']."','".$_REQUEST['date']."', NOW());");
        echo "Congratulations ".$_REQUEST['pName'].", your ".$_REQUEST['ntckts']." tickets on ".$_REQUEST['aline']." from ".$_REQUEST['srce']." to ".$_REQUEST['dest']." have been booked.<br>";
        ?>
        </td>
        </tr>
        <tr><td><center><button class="button button1" onclick="location.href='http://localhost/search.html'">Book Again
            </button></center></td></tr>
        </table>
    </body>
</html>