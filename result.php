<?php
include 'db.php';

// aktifkan error biar kelihatan jelas (boleh dihapus nanti)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// cek id
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

$id = intval($_GET['id']); // biar aman

$query = mysqli_query($conn, "SELECT * FROM result WHERE id = $id");

if (!$query) {
    die("Query error");
}

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan");
}
?>

<h1>Your Love Score</h1>
<h2><?php echo $data['score']; ?>%</h2>
<p><?php echo $data['message']; ?></p>

<a href="<?php echo $backPage; ?>">Try Again</a>
<a href="pick.php">⬅ Back to Pick Method</a>