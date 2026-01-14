<style>
/* NAVBAR */
.navbar {
    background: hotpink;
    color: white;
    padding: 12px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 1000;
}

.navbar h2 {
    margin: 0;
}

/* HAMBURGER */
.hamburger {
    font-size: 26px;
    cursor: pointer;
}

/* MENU */
.menu {
    position: fixed;
    top: 0;
    right: -250px;
    width: 220px;
    height: 100%;
    background: #ff69b4;
    padding: 20px;
    transition: 0.3s;
    z-index: 999;
}

.menu a {
    display: block;
    color: white;
    text-decoration: none;
    margin: 15px 0;
    font-weight: bold;
}

.menu.show {
    right: 0;
}
</style>

<div class="navbar">
    <h2>💖 LoveCalculator</h2>
    <div class="hamburger" onclick="toggleMenu()">☰</div>
</div>

<div class="menu" id="menu">
    <a href="index.php">Home</a>
    <a href="pick.php">Pick Method</a>
    <a href="name.php">Love by Name</a>
    <a href="zodiac.php">Love by Zodiac</a>
    <a href="birth.php">Love by Birth</a>
</div>

<script>
function toggleMenu() {
    document.getElementById("menu").classList.toggle("show");
}
</script>
