<html>
<head>
<title>
Booking ticket
</title>
<style>
body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background-image: url("https://wallpapercave.com/wp/UyNOzwq.jpg");
  background-repeat:no-repeat;
  background-size:cover;
}
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;
  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 14px 0 7px;
    display: block;
  }
  .row.header {
    padding: 0;
    height: 6px;
  }
  .row.header .cell {
    display: none;
  }
  .row .cell {
    margin-bottom: 10px;
  }
  .row .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}

</style>
</head>
<body>
<div class = "wrapper">
<div class = "table">
<div class="row header blue">
      <div class="cell">
        Airline
      </div>
      <div class="cell">
        Source
      </div>
      <div class="cell">
        Destination
      </div>
      <div class="cell">
        Tickets
      </div>
      <div class="cell">
        Book
      </div>
</div>
<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'lishat98';
$dbname = 'MINI_PROJECT';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($conn->connect_error) {
die('Could not connect: ' . $conn->connect_error);
}
if($_REQUEST['srce'] && $_REQUEST['dest'] && $_REQUEST['tckts'])
{
  $src = $_REQUEST['srce'];
  $dest = $_REQUEST['dest'];
  $tckts = $_REQUEST['tckts'];
  $query = $conn->query("SELECT AIRLINES.Airline_name, ROUTES.TICKETS FROM AIRLINES INNER JOIN ROUTES ON AIRLINES.Airline_ID = ROUTES.Airline_ID WHERE ROUTES.Source_ID IN (SELECT AIRPORTS.Airport_ID FROM AIRPORTS WHERE AIRPORTS.Airport_city = '$src') AND ROUTES.Dest_ID IN (SELECT AIRPORTS.Airport_ID FROM AIRPORTS WHERE AIRPORTS.Airport_city = '$dest') AND TICKETS >= '$tckts';");
  if ($query->num_rows > 0) 
  {
      while($row = $query->fetch_assoc()) {
          echo "<form class='row' method = 'POST' action = 'book.php' >
          <input type = 'hidden' name = 'airline' value = '".$row['Airline_name']."'>
          <input type = 'hidden' name = 'source' value = '".$src."'>
          <input type = 'hidden' name = 'destination' value = '".$dest."'>
          <input type = 'hidden' name = 'tickets' value = '".$tckts."'>
          <div class='cell' data-title='Airline'>".$row['Airline_name'].
          "</div>
          <div class='cell' data-title='Source'>".$src."
          </div>
          <div class='cell' data-title='Destination'>".$dest."
          </div>
          <div class='cell' data-title='Tickets'>".$row['TICKETS']."
          </div>
          <div class='cell' data-title='Book'><input type=submit value='Book' / >
          </div>
        </form>";
      }
  }
  else
  {
    echo "Sorry, no flights available<br/>";
  }
  exit();
}
$conn->close();
?>
</div>
</div>
</body>
</html>
