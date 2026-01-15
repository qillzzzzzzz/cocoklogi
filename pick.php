<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick Love Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="home-wrapper">
    <div class="pick-wrapper">

        <div class="pick-card">
            <div class="pick-icon">❤️</div>
            <h2>Love by Name</h2>
            <p>Check compatibility based on names</p>
            <a href="name.php" class="btn-primary">Choose</a>
        </div>

        <div class="pick-card">
            <div class="pick-icon">♈</div>
            <h2>Love by Zodiac</h2>
            <p>Match compatibility based on your zodiac signs</p>
            <a href="zodiac.php" class="btn-primary">Choose</a>
        </div>

        <div class="pick-card">
            <div class="pick-icon">🎂</div>
            <h2>Love by Birth Date</h2>
            <p>Calculate compatibility using birth dates</p>
            <a href="birth.php" class="btn-primary">Choose</a>
        </div>

        <!-- BACK BUTTON -->
        <div class="pick-back">
            <a href="index.php" class="btn-secondary btn-back">
                ⬅ Back to Home
            </a>
        </div>

    </div>
</div>

<footer class="footer">
    <p>
        Made with <span>♡</span> for every love story
    </p>
    <small>
        © <?php echo date("Y"); ?> Love Calculator
    </small>
</footer>

</body>
</html>