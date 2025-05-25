<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['remove'])) {
    $idToRemove = $_GET['remove'];
    unset($_SESSION['cart'][$idToRemove]);
    header("Location: cart.php");
    exit();
}

$products = [
    1 => ['name' => 'Bond Paper A4', 'price' => 250, 'image' => 'assets/bondpaper.jpg'],
    2 => ['name' => 'Heavy Duty Stapler Set', 'price' => 350, 'image' => 'assets/stapler.jpg'],
    3 => ['name' => 'Printer Ink (Black)', 'price' => 550, 'image' => 'assets/printerink.jpg'],
    4 => ['name' => 'Ballpoint Pens (Blue)', 'price' => 120, 'image' => 'assets/bluepen.jpg'],
    5 => ['name' => 'Notebook Set', 'price' => 180, 'image' => 'assets/notebook.jpg'],
    6 => ['name' => 'Correction Tape', 'price' => 50, 'image' => 'assets/correction tape.jpg'],
];

$username = $_SESSION['user_name'];
$login_status = "<p>Welcome, $username!</p><a href='logout.php'>Logout</a>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJAM Trading - Cart</title>
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
                    <a href="index.php">Home</a>
                    <a href="cart.php">Cart</a>
                </div>
            </div>
            <div class="nav-right">
                <?= $login_status ?>
            </div>
        </div>
    </nav>

    <section>
        <h2>Your Cart</h2>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty. <a href="index.php">Browse Products</a></p>
        <?php else: ?>
            <div class="catalogue">
                <?php 
                    $total = 0;
                    foreach ($_SESSION['cart'] as $productId => $quantity):
                        if (!isset($products[$productId])) continue;
                        $product = $products[$productId];
                        $subtotal = $product['price'] * $quantity;
                        $total += $subtotal;
                ?>
                <div class="item">
                    <div class="image-container">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                    <h3><?= $product['name'] ?></h3>
                    <p>Quantity: <?= $quantity ?></p>
                    <p class="price">₱<?= $product['price'] ?> each</p>
                    <p><strong>Subtotal: ₱<?= $subtotal ?></strong></p>
                    <a href="cart.php?remove=<?= $productId ?>" class="remove-btn">Remove</a>
                </div>
                <?php endforeach; ?>
            </div>
            <h3 style="text-align: center;">Total: ₱<?= $total ?></h3>
            <div class="cart-actions" style="text-align: center; margin-top: 20px;">
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
            </div>
        <?php endif; ?>
    </section>

    <footer>
        &copy; 2025 JJAM Trading. All rights reserved.
    </footer>

    <script src="script.js"></script>
</body>
</html>
