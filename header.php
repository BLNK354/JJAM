<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJAM Trading - Home</title>
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
                    <?php if ($user === "Guest"): ?>
                        <a href="login.php" class="auth-link">Login</a>
                        <a href="register.php" class="auth-link">Register</a>
                    <?php else: ?>
                        <a href="logout.php" class="auth-link">Logout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="welcome-section">
        <h2><?= $greeting ?></h2>
        <p>Explore our catalogue of quality office and school supplies.</p>
        <a href="cart.php" class="btn">Go to Cart</a>
    </section>

    <footer>
        &copy; 2025 JJAM Trading. All rights reserved.
    </footer>
</body>
</html>
