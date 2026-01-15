<?php
include 'db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan. Akses lewat form.");
}

$from = $_GET['from'] ?? 'pick';

if ($from == 'zodiac') {
    $backPage = 'zodiac.php';
} elseif ($from == 'name') {
    $backPage = 'name.php';
} elseif ($from == 'birth') {
    $backPage = 'birth.php';
} else {
    $backPage = 'pick.php';
}

$id = intval($_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM result WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Love Score</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="home-wrapper">
    <div class="container love-card">

        <div class="love-icon">♡</div>

        <h1>Your Love Score</h1>

        <!-- PERCENT CIRCLE -->
        <div class="circle-wrapper">
            <div 
                class="percent-circle"
                style="--percent: <?php echo $data['score']; ?>;"
            >
                <span><?php echo $data['score']; ?>%</span>
            </div>
        </div>

        <p class="subtitle">
            <?php echo $data['message']; ?>
        </p>

        <div class="btn-group">
            <a href="<?php echo $backPage; ?>" class="btn-start">
                Try Again
            </a>

            <a href="pick.php" class="btn-secondary btn-back">
                ⬅ Back to Pick Method
            </a>
        </div>

    </div>
</div>

</body>
</html>