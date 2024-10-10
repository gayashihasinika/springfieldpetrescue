<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springfield Pet Rescue and Rehome</title>
    
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <style>
        /*header styles*/
.top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #00838f;
    padding: 20px;
    border-bottom: 5px solid #004d40;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.imgl {
    width: 60px;
    height: 60px;
    border-radius: 30px;
}

.auth-buttons .btn {
    color: white;
    background-color: #006064;
    padding: 10px 15px;
    margin-left: 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 1.1rem;
    transition: background-color 0.3s;
}

.auth-buttons .btn:hover {
    background-color: #004d40;
}

.top h1 {
    flex: 1;
    text-align: center;
    font-size: 2.5rem;
    margin: 0;
    color: #ffffff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

/*menu styles*/
ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: left;
    background-color: #004d40;
}

li {
    position: relative;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 1.1rem;
}

li a:hover,
.dropdown:hover .dropbtn {
    background-color: #00332b;
}



/* General Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

/* Banner Section */
.banner {
    position: relative;
    background-image: url('images/image1.jpg'); /* Replace with your banner image */
    background-size: cover;
    background-position: center;
    height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.banner-content {
    position: relative;
    z-index: 2;
    padding: 20px;
}

.banner-content h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    font-weight: bold;
}

.banner-content p {
    font-size: 1.5rem;
    margin-bottom: 30px;
}

@media (max-width: 768px) {
    .banner-content h1 {
        font-size: 2.5rem;
    }

    .banner-content p {
        font-size: 1.2rem;
    }
}

.footer {
    background-color: #004d40;
    color: #ffffff;
    padding: 20px 0px;
    text-align: center;
    margin-top: 50px;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
}

.footer-section {
    flex: 1;
    margin: 10px;
}

.footer-section h3 {
    margin-bottom: 20px;
    color: #2ebacd;
}

.footer-section p {
    margin-bottom: 15px;
    line-height: 1.6;
    margin: 0;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #ffffff;
    text-decoration: none;
}

.footer-section ul li a:hover {
    color: #2ebacd;
    text-decoration: underline;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 15px;
}

.social-links a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #ffffff;
    transition: transform 0.3s ease;
}

.social-links a:hover {
    transform: scale(1.1);
}

.social-links img.icon {
    width: 30px;
    height: 30px;
    margin-right: 8px;
    transition: opacity 0.3s ease;
}

.social-links a:hover img.icon {
    opacity: 0.7;
}

.social-links i {
    font-size: 1.5rem;
    color: #ffffff;
    margin-left: 8px;
}

.social-links a:hover i {
    color: #2ebacd;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .social-links {
        flex-direction: column;
        gap: 10px;
    }

    .social-links a {
        justify-content: center;
    }
}


.footer-bottom {
    margin-top: 30px;
    border-top: 1px solid #2ebacd;
    padding-top: 10px;
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9rem;
    color: #e0e0e0;
}

/* Icons */
.footer-section i {
    color: #2ebacd;
    margin-right: 10px;
}

.footer-section a {
    color: #ffffff;
    text-decoration: none;
}

.footer-section a:hover {
    color: #2ebacd;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: center;
    }

    .footer-section {
        max-width: 90%;
    }

    .social-links {
        margin-top: 10px;
    }
}




/* Section Styling */
.section {
    background-image: url("images/background.jpg"); /* Light background for contrast */
    border-radius: 8px; /* Rounded corners */
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    item-align: center;
}

.section h2 {
    font-size: 2rem;
    color: #00838f; /* Secondary color for subheadings */
    margin-bottom: 15px;
}

.section p {
    font-size: 1.1rem;
    color: #333; /* Dark text for better readability */
    margin-bottom: 10px;
}

/* Contact Information Styling */
.section strong {
    color: #006064; /* Highlighting strong text with a darker tone */
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    h1 {
        font-size: 2rem; /* Responsive font size for smaller screens */
    }

    .section h2 {
        font-size: 1.5rem; /* Responsive font size for smaller screens */
    }

    .section p {
        font-size: 1rem; /* Responsive font size for smaller screens */
    }
}



</style>
</head>
<body>
<?php if (isset($_GET['status']) && isset($_GET['message'])): ?>
        <script>
            alert("<?php echo $_GET['message']; ?>");
        </script>
    <?php endif; ?>

    <div class="container">
        <div class="top">
            <img class="imgl" src="images/1.jpg" alt="Springfield Pet Rescue">
            <h1>Springfield Pet Rescue and Rehome</h1>
            <div class="auth-buttons">
                <?php if (isset($_SESSION['user_name'])): ?>
                    <a href="logout.php" class="btn">Logout</a>
                <?php else: ?>
                    <a href="register.php" class="btn">Register</a>
                    <a href="login.php" class="btn">Log In</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav>
        <ul class="menu">
        <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                 <?php if (isset($_SESSION['user_name'])){ 
                 	echo '<a href="dashboard.php">My Dashboard</a>';
                 }?>	
                </li>
                <li>
                 <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                    echo '<a href="admin_dashboard.php">Admin Dashboard</a>';
                 } ?>
                </li>
        </ul>
        </nav>

        <div class="banner">
        <div class="overlay"></div>
        <div class="banner-content">
            <h1>Contact Us</h1>

        </div>
    </div>
    <main>
    <div class="container">
        

        <div class="section">
            <h2>Get in Touch</h2>
            <p>If you have any questions, concerns, or need further assistance regarding pet rescue or rehoming, feel free to reach out to us. We're here to help!</p>
            <p><strong>Email:</strong> support@paws.com</p>
            <p><strong>Phone:</strong> +94 112345678</p>
            <p><strong>Address:</strong> WV26+Q53, Thurstan Road, Colombo 03.</p>
        </div>
    </div>
    </main>
    <footer class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h3>About Springfield Pet Rescue</h3>
            <p>
                We are dedicated to rescuing, rehabilitating, and rehoming stray and abandoned animals. Our mission is to create a safe and caring community for every animal in need.
            </p>
        </div>

        <div class="footer-section links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="help.php">Help</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-section contact">
            <h3>Contact Us</h3>
            <p><i class="fas fa-map-marker-alt"></i> 123 Rescue St, Springfield, SL</p>
            <p><i class="fas fa-phone"></i> +94 123 456 789</p>
            <p><i class="fas fa-envelope"></i> info@springfieldpetrescue.com</p>
            <div class="social-links">
                <a href="https://www.facebook.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon1.png" alt="Facebook" />
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon2.png" alt="Instagram" />
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://twitter.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon3.png" alt="Twitter" />
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://tiktok.com/springfieldpetrescue" target="_blank" rel="noopener noreferrer">
                    <img class="icon" src="images/icon4.png" alt="TikTok" />
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2024 Springfield Pet Rescue and Rehome. All Rights Reserved.</p>
    </div>
</footer>     
</body>
</html>
