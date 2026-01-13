<?php
include 'db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

/* =========================
   TABEL KECOCOKAN ZODIAK
========================= */
$compatibility = [
    'Aries' => ['Leo'=>90, 'Sagittarius'=>88, 'Gemini'=>80, 'Libra'=>78],
    'Taurus' => ['Virgo'=>92, 'Capricorn'=>90, 'Cancer'=>85, 'Pisces'=>80],
    'Gemini' => ['Libra'=>90, 'Aquarius'=>88, 'Aries'=>80, 'Leo'=>75],
    'Cancer' => ['Scorpio'=>95, 'Pisces'=>92, 'Taurus'=>85, 'Virgo'=>80],
    'Leo' => ['Aries'=>90, 'Sagittarius'=>88, 'Gemini'=>75, 'Libra'=>80],
    'Virgo' => ['Taurus'=>92, 'Capricorn'=>90, 'Cancer'=>80, 'Scorpio'=>78],
    'Libra' => ['Gemini'=>90, 'Aquarius'=>88, 'Leo'=>80, 'Sagittarius'=>75],
    'Scorpio' => ['Pisces'=>95, 'Cancer'=>93, 'Virgo'=>78, 'Capricorn'=>85],
    'Sagittarius' => ['Aries'=>88, 'Leo'=>90, 'Libra'=>75, 'Aquarius'=>80],
    'Capricorn' => ['Taurus'=>90, 'Virgo'=>88, 'Scorpio'=>85, 'Pisces'=>82],
    'Aquarius' => ['Gemini'=>88, 'Libra'=>90, 'Sagittarius'=>80, 'Aries'=>75],
    'Pisces' => ['Scorpio'=>95, 'Cancer'=>92, 'Taurus'=>80, 'Capricorn'=>82]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $zodiac1 = $_POST['zodiac1'];
    $zodiac2 = $_POST['zodiac2'];

    // LOGIKA HITUNG SKOR
    if ($zodiac1 === $zodiac2) {
        $score = 90;
        $message = "Zodiak sama, chemistry kuat ✨";
    } elseif (isset($compatibility[$zodiac1][$zodiac2])) {
        $score = $compatibility[$zodiac1][$zodiac2];
        $message = "Kecocokan zodiak sangat tinggi 💖";
    } elseif (isset($compatibility[$zodiac2][$zodiac1])) {
        $score = $compatibility[$zodiac2][$zodiac1];
        $message = "Kecocokan zodiak sangat tinggi 💖";
    } else {
        $score = rand(60, 75);
        $message = "Masih bisa jalan, tapi perlu usaha 💕";
    }

    // SIMPAN KE DATABASE
    $sql = "INSERT INTO result (name1, name2, score, message)
            VALUES ('$zodiac1', '$zodiac2', $score, '$message')";

    if (!mysqli_query($conn, $sql)) {
        die("SQL ERROR: " . mysqli_error($conn));
    }

    $last_id = mysqli_insert_id($conn);
    header("Location: result.php?id=$last_id&from=zodiac");
    exit;
}
?>

<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="style.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Love by Zodiac</title>
</head>
<body>

<h2>Love by Zodiac</h2>

<form method="POST">
    <select name="zodiac1" required>
        <option value="">Your Zodiac</option>
        <option>Aries</option>
        <option>Taurus</option>
        <option>Gemini</option>
        <option>Cancer</option>
        <option>Leo</option>
        <option>Virgo</option>
        <option>Libra</option>
        <option>Scorpio</option>
        <option>Sagittarius</option>
        <option>Capricorn</option>
        <option>Aquarius</option>
        <option>Pisces</option>
    </select>

    <select name="zodiac2" required>
        <option value="">Partner Zodiac</option>
        <option>Aries</option>
        <option>Taurus</option>
        <option>Gemini</option>
        <option>Cancer</option>
        <option>Leo</option>
        <option>Virgo</option>
        <option>Libra</option>
        <option>Scorpio</option>
        <option>Sagittarius</option>
        <option>Capricorn</option>
        <option>Aquarius</option>
        <option>Pisces</option>
    </select>

    <br><br>
    <button type="submit">Check</button>
</form>

<br>
<a href="pick.php">⬅ Back</a>

</body>
</html>
