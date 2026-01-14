<?php
include 'db.php';

if (isset($_POST['birth1'])) {

    $birth1 = $_POST['birth1'];
    $birth2 = $_POST['birth2'];

    // 1️⃣ HITUNG SELISIH HARI
    $date1 = new DateTime($birth1);
    $date2 = new DateTime($birth2);

    $diff = abs($date1->format('U') - $date2->format('U'));
    $days = floor($diff / (60 * 60 * 24));

    // 2️⃣ SKOR DASAR DARI TANGGAL
    $baseScore = 100 - min($days, 60);

    // 3️⃣ RANDOM KONSISTEN BERBASIS TANGGAL
    $seed = crc32($birth1 . $birth2);
    mt_srand($seed);
    $randomOffset = mt_rand(-10, 10);

    // 4️⃣ SKOR AKHIR
    $score = $baseScore + $randomOffset;
    $score = max(40, min(100, $score));

    $message = "Kecocokan berdasarkan tanggal lahir 💖";

    mysqli_query($conn, "
        INSERT INTO result 
        (name1, name2, score, message)
        VALUES 
        ('$birth1', '$birth2', '$score', '$message')
    ");

    $last_id = mysqli_insert_id($conn);
    header("Location: result.php?id=$last_id&from=birth");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Love by Birth Date</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="home-wrapper">
    <div class="container love-card">

        <div class="love-icon">♡</div>

        <h1>Love by Birth Date</h1>

        <p class="subtitle">
            Enter both birth dates to see your compatibility
        </p>

        <form method="POST" class="name-form">

            <input
                type="date"
                name="birth1"
                class="input-center"
                required
            >

            <input
                type="date"
                name="birth2"
                class="input-center"
                required
            >

            <button type="submit" class="btn-start">
                Check Compatibility
            </button>

            <a href="pick.php" class="btn-secondary btn-back">
                ← Back
            </a>

        </form>

    </div>
</div>

</body>
</html>