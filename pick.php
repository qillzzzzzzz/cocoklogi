<link rel="stylesheet" href="style.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pick Love Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffe6f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            width: 300px;
        }
        h1 {
            margin-bottom: 20px;
        }
        a {
            display: block;
            margin: 10px 0;
            padding: 12px;
            background: hotpink;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
        a:hover {
            background: deeppink;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="box">
    <h1>💖 Pick Method</h1>

    <a href="name.php">Love by Name</a>
    <a href="zodiac.php">Love by Zodiac</a>
    <a href="birth.php">Love by Birth Date</a>
</div>

</body>
</html>
