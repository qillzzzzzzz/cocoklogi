<style>

.navbar {
    display: flex;
    justify-content: flex-end; /* pindah ke kanan */
    padding: 15px;
}

/* HAMBURGER */
.hamburger {
    font-size: 30px;
    cursor: pointer;
    color: white;
    background: rgba(255,255,255,0.25);
    padding: 6px 12px;
    border-radius: 12px;
    transition: 0.3s;
}

.hamburger:hover {
    background: rgba(255,255,255,0.4);
    transform: scale(1.05);
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
