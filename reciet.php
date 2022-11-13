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
<body style="background-color: #9dd2fa;">
<h1>Two Owls Cafe</h1>
<em>Cafe Hours 7pm to 2pm Daily</em>
<br /><br/>
<div class="box">
    <h2> Order Details </h2>
    <p> Name: <?php echo $_GET['first']; ?> <?php echo $_GET["last"]; ?></p>
    <p> Special Instructions: <?php echo $_GET["instructs"];?></p>
    <p> Your order will be ready in 15min. </p>
    <p> Pickup Time: <?php echo $_GET["pickup"];?> </p>
</div>
<div class="box">
    <h2> Receipt </h2>
    <p>You spent $<?php echo $_GET["cost1"];?>  on <?php echo $_GET["amount1"];?> Coffee ($5.50 per serving).</p>
    <p>You spent $<?php echo $_GET["cost2"];?>  on <?php echo $_GET["amount2"];?> Iced Latte ($7.25 per serving).</p>
    <p>You spent $<?php echo $_GET["cost3"];?>  on <?php echo $_GET["amount3"];?> Espresso ($6.80 per serving).</p>
    <p>You spent $<?php echo $_GET["cost4"];?>  on <?php echo $_GET["amount4"];?> Grilled Cheese ($9.50 per serving).</p>
    <p>You spent $<?php echo $_GET["cost5"];?>  on <?php echo $_GET["amount5"];?> Biscuit ($3.25 per serving).</p>
    <p>Subtotal: $<?php echo $_GET["total"];?> subtotal</p>
    <p>Mass tax 6.25%: $<?php echo $_GET["tax"];?> tax</p>
    <p>Total: $<?php echo $_GET["price"];?> total</p>
</div>
</body>
</html>