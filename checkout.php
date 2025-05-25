<?php
session_start();

$products = [
    1 => ['name' => 'Bond Paper A4', 'price' => 250, 'image' => 'assets/bondpaper.jpg'],
    2 => ['name' => 'Heavy Duty Stapler Set', 'price' => 350, 'image' => 'assets/stapler.jpg'],
    3 => ['name' => 'Printer Ink (Black)', 'price' => 550, 'image' => 'assets/printerink.jpg'],
    4 => ['name' => 'Ballpoint Pens (Blue)', 'price' => 120, 'image' => 'assets/bluepen.jpg'],
    5 => ['name' => 'Notebook Set', 'price' => 180, 'image' => 'assets/notebook.jpg'],
    6 => ['name' => 'Correction Tape', 'price' => 50, 'image' => 'assets/correction tape.jpg'],
];

if (empty($_SESSION['cart'])) {
    header("Location: index.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];



    $_SESSION['cart'] = [];
    echo "<p>Thank you for your order, $name! Your order will be processed soon.</p>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JJAM Trading - Checkout</title>
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
        </div>
    </nav>

    <section>
        <h2>Checkout</h2>

        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $product = $products[$productId];
            $subtotal = $product['price'] * $quantity;
            $total += $subtotal;
        }
        ?>

        <div class="catalogue">
            <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
                <?php $product = $products[$productId]; ?>
                <div class="item">
                    <div class="image-container">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                    <h3><?= $product['name'] ?></h3>
                    <p>Quantity: <?= $quantity ?></p>
                    <p class="price">₱<?= $product['price'] ?> each</p>
                    <p><strong>Subtotal: ₱<?= $product['price'] * $quantity ?></strong></p>
                </div>
            <?php endforeach; ?>
        </div>

        <h3>Total: ₱<?= $total ?></h3>

        <h3>Shipping Information</h3>
        <form action="checkout.php" method="POST">
            <div>
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="address">Shipping Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div>
                <button type="submit" class="btn">Place Order</button>
            </div>
        </form>
    </section>

    <footer>
        &copy; 2025 JJAM Trading. All rights reserved.
    </footer>

    <script src="script.js"></script>
</body>
</html>
