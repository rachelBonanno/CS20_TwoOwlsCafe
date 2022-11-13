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
        table {
            margin-right: auto;
            margin-left: auto;
        }
    </style>
    <script>
        // function getOrder() {
        //     if (document.querySelector('input[value=pickup]').checked) {
        //         document.getElementById("street").style.visibility = "hidden";
        //         document.getElementById("city").style.visibility = "hidden";
        //     } else {
        //         document.getElementById("street").style.visibility = "visible";
        //         document.getElementById("city").style.visibility = "visible";
        //     }
        // }

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


    </script>
</head>

<body style="background-color: #9dd2fa;">
<h1>Two Owls Cafe</h1>
<em>Cafe Hours 7pm to 2pm Daily</em>
<br /><br/>
<form name="formster">

    <script>
        setInterval(makeSelect, 10)
        setInterval(MyJavaScript, 10);
        setInterval(amount, 10);


        function makeSelect(name, minRange, maxRange) {
            //var name = "value" + num;
            var t = "";
            t = "<select id ='"+ name + "' name='" + name + "' size='1' onchange='MyJavaScript(this, name)'>";
            for (j = minRange; j<=maxRange; j++)
                t += "<option value=" + j + ">" + j + "</option>";
            t += "</select>";
            return t;
        }

        function MyJavaScript(dropdown, appletree) {
            const price = ["0", "5.5", "7.25", "6.8", "9.5", "3.25"];
            var option_value = dropdown.options[dropdown.selectedIndex].value;
            var cost = option_value * price[appletree];
            //alert('The option value is "' + option_value + '"\nand the cost is "' + cost + '"');
            var smiles = "smiles" + appletree;
            localStorage[appletree] = option_value;
            localStorage[smiles] = cost;
        }

        function userInput() {
            let z = document.forms["formster"]["fname"].value;
            let x = document.forms["formster"]["lname"].value;
            let y = document.forms["formster"]["instruct"].value;

            var t = 0;
            for(var i=0;i<=5;i++) {
                j = "smiles" + i;
                if(localStorage[j]) {
                    t += (localStorage[j] * 1000);
                }
            }
            t = t/1000;

            var tax = t * .0625;
            var totalprice = t + tax;

            // the total is always 0 doesn't change
            //alert('The total is ' + t);

            var date = new Date();
            var current15 = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate() + " " + date.getHours() + ":" + (date.getMinutes() + 15) + ":" + date.getSeconds();
            //var current_15 = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate() + " " + date.getHours() + ":" + (date.getMinutes()-15) + ":" + date.getSeconds();

            if (z == "" || x == "" || t == 0 || ((date.getHours() <= 18 && date.getMinutes() <= 45) && (date.getHours() >= 14 && date.getMinutes() >= 15))) {
                if (z == "") {
                    alert("First name must be filled out.");
                }
                if (x == "") {
                    alert("Last name must be filled out.");
                }
                if (t == 0) {
                    alert("Please order something.");
                }
                if ((date.getHours() <= 18 && date.getMinutes() <= 45) && (date.getHours() >= 14 && date.getMinutes() >= 15)) {
                    alert("Cafe currently not-open for orders.");
                }
                return false;
            } else {
                alert("Thank you for ordering! :)");
                window.location.href="reciet.php?first=" + z + "&&last=" + x + "&&instructs=" + y + "&&pickup=" + current15  +
                    "&&cost1=" + localStorage["smiles1"] + "&&cost2=" + localStorage["smiles2"] + "&&cost3=" + localStorage["smiles3"] +
                    "&&cost4=" + localStorage["smiles4"] + "&&cost5=" + localStorage["smiles5"] +
                    "&&amount1=" + localStorage["1"] + "&&amount2=" + localStorage["2"] + "&&amount3=" + localStorage["3"] +
                    "&&amount4=" + localStorage["4"] + "&&amount5=" + localStorage["5"] +
                    "&&total=" + t + "&&tax=" + tax + "&&price=" + totalprice;
            }

            localStorage.clear();

        }
    </script>
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
    echo "<th>Item Name</th>";
    echo "<th>Cost Each</th>";
    echo "<th>Select Item</th>";
    //echo "<th>Total Cost</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc())
    {
        echo '<tr class = "box">';
        echo "<td id = 'name".$row["itemID"]."'> ".$row["name"].'<br><img src="images/'.$row["itemID"].'-unsplash.jpg" height="100">'."</td>";
        echo "<td id = 'price".$row["itemID"]."'>$" . $row["price"]. "</td>";
        echo '<td id = "amount'.$row["itemID"].'" name = "amount"><script>document.writeln(makeSelect("'.$row["itemID"].'", 0, 10))</script></td>';
        //echo set'<td id = "total'.$row["itemID"].'">$<script>document.writeln(amount('.$row["itemID"].'))</script></td>';

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
    <p class="userInfo"><label>First Name*:</label> <input type="text" name='fname'/></p>
    <p class="userInfo"><label>Last Name*:</label>  <input type="text"  name='lname' /></p>
    <p class="userInfo"><label>Instructions:</label> <input type="text"  name='instruct' /></p>

    <input type="button" value="Submit Order" onclick="userInput()"/>
</form>
</body>
</html>
