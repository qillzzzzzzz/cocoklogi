<?php
include 'db.php'; 

if (isset($_POST['name1'])) {

    // 1️⃣ AMBIL INPUT
    $name1 = trim($_POST['name1']);
    $name2 = trim($_POST['name2']);

    // 2️⃣ SAMAKAN URUTAN NAMA (A+B = B+A)
    $names = [$name1, $name2];
    sort($names);

    // 3️⃣ BUAT SEED DARI NAMA
    $seed = crc32(strtolower($names[0] . $names[1]));
    mt_srand($seed);

    // 4️⃣ RANDOM KONSISTEN
    $score = mt_rand(60, 100);

    // 5️⃣ PESAN
    $message = "Kecocokan berdasarkan nama 💖";

    // 6️⃣ SIMPAN KE DATABASE
    mysqli_query($conn, "
        INSERT INTO result
        (methode, name1, name2, score, message)
        VALUES 
        ('name', '$name1', '$name2', '$score', '$message')
    ");

    // 7️⃣ REDIRECT KE RESULT
    $last_id = mysqli_insert_id($conn);
    header("Location: result.php?id=$last_id&from=name");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Love by Name</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="home-wrapper">
    <div class="container love-card">

        <div class="love-icon">♡</div>

        <h1>Love by Name</h1>

        <p class="subtitle">
            Enter both names to see your compatibility
        </p>

        <form method="POST" class="name-form">

            <input 
                type="text" 
                name="name1" 
                placeholder="Your Name"
                class="input-center"
                required
            >

            <input 
                type="text" 
                name="name2" 
                placeholder="Partner Name"
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