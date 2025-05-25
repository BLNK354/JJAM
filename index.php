<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['user_name']; 
    $login_status = "<p>Welcome, $username!</p><a href='logout.php'>Logout</a>";
} else {
    $login_status = "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>JJAM Trading Catalogue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="nav-left">
                <img src="assets/logo.png" alt="JJAM Logo" class="logo">
                <span class="company-name">JJAM Trading</span>
            </div>
            <div class="nav-center">
                <div class="nav-links">
                    <a href="#index.php">Home</a>
                    <a href="Contact.html">Contact</a>
                    <a href="AboutUs.html">About Us</a>
                    <a href="cart.php">Cart</a>
                </div>
            </div>
            <div class="nav-right">
                <?= $login_status ?>
            </div>
        </div>
    </nav>

    <section id="home">
        <h1>Welcome to JJAM Trading</h1>
        <p>🎉 JJAM TRADING provides you with limitless possibilities for your office needs.🎉</p>
    </section>

    <section id="categories">
        <h2>Featured Products</h2>
        <div class="catalogue">

            <!-- SALE Items First -->
            <div class="item">
                <div class="image-container">
                    <span class="sale-badge">SALE</span>
                    <img src="assets/bondpaper.jpg" alt="Bond Paper">
                </div>
                <h3>Bond Paper A4</h3>
                <p>80gsm, pack of 500 sheets</p>
                <div class="price">₱250</div>
                <button class="add-to-cart" data-id="1">Add to Cart</button>
            </div>

            <div class="item">
                <div class="image-container">
                    <span class="sale-badge">SALE</span>
                    <img src="assets/stapler.jpg" alt="Stapler Set">
                </div>
                <h3>Heavy Duty Stapler Set</h3>
                <p>Includes staples and remover</p>
                <div class="price">₱350</div>
                <button class="add-to-cart" data-id="2">Add to Cart</button>
            </div>

            <div class="item">
                <div class="image-container">
                    <span class="sale-badge">SALE</span>
                    <img src="assets/printerink.jpg" alt="Printer Ink">
                </div>
                <h3>Printer Ink (Black)</h3>
                <p>Compatible with most inkjet printers</p>
                <div class="price">₱550</div>
                <button class="add-to-cart" data-id="3">Add to Cart</button>
            </div>

            <!-- Regular Items -->
            <div class="item">
                <div class="image-container">
                    <img src="assets/bluepen.jpg" alt="Ballpoint Pens">
                </div>
                <h3>Ballpoint Pens (Blue)</h3>
                <p>Box of 10 pens</p>
                <div class="price">₱120</div>
                <button class="add-to-cart" data-id="4">Add to Cart</button>
            </div>

            <div class="item">
                <div class="image-container">
                    <img src="assets/notebook.jpg" alt="Notebook">
                </div>
                <h3>Notebook Set</h3>
                <p>Pack of 3 ruled notebooks</p>
                <div class="price">₱180</div>
                <button class="add-to-cart" data-id="5">Add to Cart</button>
            </div>

            <div class="item">
                <div class="image-container">
                    <img src="assets/correction tape.jpg" alt="Correction Tape">
                </div>
                <h3>Correction Tape</h3>
                <p>Non-toxic, quick-dry formula</p>
                <div class="price">₱50</div>
                <button class="add-to-cart" data-id="6">Add to Cart</button>
            </div>

        </div>
    </section>

    <footer>
        &copy; 2025 JJAM Trading. All rights reserved.
    </footer>

    <script src="script.js"></script>
</body>
</html>
