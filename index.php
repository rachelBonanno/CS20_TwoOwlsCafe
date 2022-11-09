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
            font-size:2vw;
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
        table {
            margin-right: auto;
            margin-left: auto;
        }
    </style>
    <script>
        setInterval(getOrder, 10);
        setInterval(amount, 10);
        setInterval(totals, 10);

        function getOrder() {
            if (document.querySelector('input[value=pickup]').checked) {
                document.getElementById("street").style.visibility = "hidden";
                document.getElementById("city").style.visibility = "hidden";
            } else {
                document.getElementById("street").style.visibility = "visible";
                document.getElementById("city").style.visibility = "visible";
            }
        }

        function amount(id){
            var chicken = document.getElementById("quan0").value;
            var pork = document.getElementById("quan1").value;
            var shrimp = document.getElementById("quan2").value;
            var mooSui = document.getElementById("quan3").value;
            var rice = document.getElementById("quan4").value;

            document.getElementById("cost0").value = (chicken *
                menuItems[0].cost.toFixed(2)).toFixed(2);
            document.getElementById("cost1").value = (pork *
                menuItems[1].cost.toFixed(2)).toFixed(2);
            document.getElementById("cost2").value = (shrimp *
                menuItems[2].cost.toFixed(2)).toFixed(2);
            document.getElementById("cost3").value = (mooSui *
                menuItems[3].cost.toFixed(2)).toFixed(2);
            document.getElementById("cost4").value = (rice *
                menuItems[4].cost.toFixed(2)).toFixed(2);
        }

        function totals() {
            var arr = document.getElementsByName('cost');
            var tot = 0;
            for(var i=0;i<=4;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value * 1000);
            }
            tot = tot/1000;
            document.getElementById('subtotal').value = tot.toFixed(2);
            var tax = tot * .0625;
            document.getElementById('tax').value = tax.toFixed(2);
            var totals = tot + tax;
            document.getElementById('total').value = totals.toFixed(2);

            localStorage["subtotal"] = tot.toFixed(2);
            localStorage["tax"] = tax.toFixed(2);
            localStorage["total"] = totals.toFixed(2);
        }

        function userInput() {
            let x = document.forms["formster"]["lname"].value;
            let y = document.forms["formster"]["phone"].value;
            var subtotal = localStorage["subtotal"];
            var date = new Date();
            var current20 = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate() + " " + date.getHours() + ":" + (date.getMinutes()+20) + ":" + date.getSeconds();
            var current40 = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate() + " " + date.getHours() + ":" + (date.getMinutes()+40) + ":" + date.getSeconds();


            if (x == "" || (y.length != 7 && y.length != 10) || subtotal == 0) {
                if (x == "") {
                    alert("Last name must be filled out.");
                }
                if (y.length != 7 && y.length != 10) {
                    alert("Invalid phone number entered.");
                }
                if (subtotal == 0) {
                    alert("Please order something.");
                }
                return false;
            } else {
                alert("Thank you for ordering! :)");
                new_window = window.open('receipt.html', '_blank');
                new_window.document.write("<h2> Order Details </h2>");
                if (document.querySelector('input[value=pickup]').checked) {
                    new_window.document.write("<p> Order Type: Pickup </p>");
                    new_window.document.write("<p> Your order will be ready in 20min. </p>");
                    new_window.document.write("Pickup Time: " + current20);
                } else {
                    new_window.document.write("<p> Order Type: Delivery </p>");
                    new_window.document.write("<p> Your order will be ready in 40min. </p>");
                    new_window.document.write("Pickup Time: " + current40);
                }
                new_window.document.write("<h2> Receipt </h2>");
            }
    </script>
</head>

<body style="background-color: #9dd2fa;">
<script>
    function makeSelect(name, minRange, maxRange) {
        var t = "";
        t = "<select id='"+ name + "' name='" + name + "' size='1'>";
        for (j = minRange; j<=maxRange; j++)
            t += "<option>" + j + "</option>";
        t += "</select>";
        return t;
    }
</script>
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
    echo '<tr class = "box">';
    echo "<th>Select Item</th>";
    echo "<th>Item Name</th>";
    echo "<th>Cost Each</th>";
    echo "<th>Total Cost</th>";
    echo "</tr>";

    while($row = $result->fetch_assoc())
    {
        echo '<tr class = "box">';
        echo '<th id = "amount'.$row["itemID"].'"><script>document.writeln(makeSelect('.$row["itemID"].', 0, 10))</script></th>';
        echo "<th id = 'name".$row["itemID"]."'> ".$row["name"].'<br><img src="images/'.$row["itemID"].'-unsplash.jpg" height="100">'."</th>";
        echo "<th id = 'price".$row["itemID"]."'>$" . $row["price"]. "</th>";
        echo '<th><script>document.writeln(amount('.$row["itemID"].'))</script></th>';
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
    <p class="subtotal totalSection"><label>Subtotal</label>:
        $ <input type="text" name='subtotal' id="subtotal" />
    </p>
    <p class="tax totalSection"><label>Mass tax 6.25%:</label>
        $ <input type="text" name='tax' id="tax" />
    </p>
    <p class="total totalSection"><label>Total:</label> $ <input type="text" name='total' id="total" />
    </p>

    <input type="button" value="Submit Order" onclick="userInput()"/>
</form>
</body>
</html>
