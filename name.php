<?php
include 'db.php'; 

if (isset($_POST['name1'])) {

    // 1️⃣ AMBIL INPUT
    $name1 = trim($_POST['name1']);
    $name2 = trim($_POST['name2']);

    // 2️⃣ SAMAKAN URUTAN NAMA (BIAR A+B = B+A)
    $names = [$name1, $name2];
    sort($names);

    // 3️⃣ BUAT SEED DARI NAMA
    $seed = crc32(strtolower($names[0] . $names[1]));
    mt_srand($seed);

    // 4️⃣ RANDOM TAPI KONSISTEN
    $score = mt_rand(60, 100);

    // 5️⃣ PESAN
    $message = "Kecocokan berdasarkan nama 💖";

    // 6️⃣ SIMPAN KE DB
    mysqli_query($conn, "
        INSERT INTO result
        (methode, name1, name2, score, message)
        VALUES 
        ('name', '$name1', '$name2', '$score', '$message')
    ");

    // 7️⃣ REDIRECT
    $last_id = mysqli_insert_id($conn);
    header("Location: result.php?id=$last_id&from=name");
    exit;
}
?>


<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="style.css">

<form method="POST">
    <input type="text" name="name1" placeholder="Your Name" required>
    <input type="text" name="name2" placeholder="Partner Name" required>
    <button type="submit">Check</button>
</form>

<a href="pick.php">⬅ Back</a>
