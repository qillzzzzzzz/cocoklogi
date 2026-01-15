<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Love Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="home-wrapper">
    <div class="love-card container">
        
        <!-- ornament kecil -->
        <div class="love-icon">𓆩ꨄ𓆪</div>

        <h1>Love Compatibility</h1>

        <p class="subtitle">
            Because every love story deserves to be written
        </p>

        <div class="btn-group">
            <a href="pick.php" class="btn-primary btn-start">
                <span class="btn-glow"></span>
                Start Test
            </a>
        </div>

        <!-- teks kecil bawah -->
        <p class="footer-text">
            made with love
        </p>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="footer">
    <p>
        Made with <span>♡</span> for every love story
    </p>
    <small>
        © <?php echo date("Y"); ?> Love Calculator
    </small>
</footer>
<!-- ================== -->

</body>
</html>