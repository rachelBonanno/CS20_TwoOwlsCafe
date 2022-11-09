<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Two Owls Cafe</title>
    <style type='text/css'>
        html,body,select {font-size: 25px; text-align: center;}
        h1 {
            font-size:10vw;
            color:#FFFFFF;
            margin:10px;
        }
        em {
            color:#FFFFFF;
        }
        p {
            font-size:1vw;
        }
        h2 {
            color: #732761;
        }
        .box {
            margin: 20px;
            padding: 20px;
            background: #fa9de4;
        }
        .box:hover {
            background-color: #fa57d4;
            color: #000000;
        }
        form {
            text-align: center;
        }
        .userInfo label {
            display: inline-block;
            clear: left;
            width: 100px;
            text-align: right;
        }
        .userInfo input {
            display: inline-block;
        }
    </style>
</head>

<body style="background-color: #9dd2fa;">
<h1>Two Owls Cafe</h1>
<em>Cafe Hours 7pm to 2pm Daily</em>
<br /><br/>
<form name="formster">

    <p class="userInfo"><label>First Name:</label> <input type="text" name='fname'/></p>
    <p class="userInfo"><label>Last Name*:</label>  <input type="text"  name='lname' /></p>
    <p id="street" class="userInfo address"><label>Street*:</label> <input type="text" name='street' /></p>
    <p id="city" class="userInfo address"><label>City*:</label> <input type="text" name='city' /></p>
    <p class="userInfo"><label>Phone*:</label> <input type="text"  name='phone' /></p>
    <p>
        <input type="radio"  name="p_or_d" value = "pickup" checked="checked"/>Pickup
        <input type="radio"  name='p_or_d' value = 'delivery'/>
        Delivery
    </p>
<?php
//establish connection info
$server = "localhost";
$userid = "ubwvun44su0gj";
$pw = "v7jvgvfyymkp";
$db= "dbeg7rcwnalz1l";

// Create connection
$conn = new mysqli($server, $userid, $pw );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//select the database
$conn->select_db($db);

//run a query
$sql = "SELECT * FROM menu_items";
//echo "<br />The query is: " . $sql ."<br />";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table>";
    while($row = $result->fetch_assoc())
    {
        echo '<tr class = "box">';
        echo "<th>".$row["name"].'<br><img src="images/'.$row["itemID"].'-unsplash.jpg" height="100">'."</th>";
        echo "<th>$" . $row["price"]. "</th>";
        echo '<th>select</th>';
        echo '</tr>';
    }
    echo "</table>";
}
else
{
    echo "no results";
}

//close the connection
$conn->close();

?>
</form>

<script language="javascript">
    document.write (petTypes);

</script>
</body>
</html>
