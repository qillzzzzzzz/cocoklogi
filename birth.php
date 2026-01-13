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
    $baseScore = 100 - min($days, 60); // makin dekat makin tinggi

    // 3️⃣ RANDOM KONSISTEN BERBASIS TANGGAL
    $seed = crc32($birth1 . $birth2);
    mt_srand($seed);
    $randomOffset = mt_rand(-10, 10);

    // 4️⃣ SKOR AKHIR
    $score = $baseScore + $randomOffset;
    $score = max(40, min(100, $score)); // jepit 40–100

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

<?php include 'navbar.php'; ?>


<link rel="stylesheet" href="style.css">


<form method="POST">
    <h2>Love by Birth Date</h2>

    <input type="date" name="birth1" required>
    <input type="date" name="birth2" required>

    <button type="submit">Check</button>
</form>

<a href="pick.php">⬅ Back</a>
