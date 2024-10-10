<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springfield Pet Rescue and Rehome</title>
    
    
    <style>
        /*header styles*/
/* General Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

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

.container {
    padding: 40px 20px;
    text-align: center;
    background-image: url(images/background.jpg);
}

/* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
     /* Padding for overall content */
}



/* Section Styles */
.section {
    margin-bottom: 30px; /* Spacing between sections */
}

.section h2 {
    font-size: 2rem; /* Section heading font size */
    color: #2f1313; /* Heading color */
    margin-bottom: 10px; /* Margin below heading */
}

.section h4 {
    font-size: 1.5rem; /* Subheading font size */
    color: #ae6427; /* Subheading color */
    margin: 15px 0; /* Margin for subheadings */
}

.section p {
    font-size: 1rem; /* Paragraph font size */
    color: #8c6239; /* Text color */
    margin-bottom: 10px; /* Margin below paragraphs */
}

.section ul {
    list-style-type: disc; /* Bullet points */
    margin-left: 20px; /* Indentation for list */
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .container {
        padding: 10px; /* Reduce padding on smaller screens */
    }

    .section h2 {
        font-size: 1.5rem; /* Smaller heading font size */
    }

    .section h4 {
        font-size: 1.2rem; /* Smaller subheading font size */
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
            <h1>Help</h1>

        </div>
    </div>
    <div class="container">
    <h1>Springfield Pet Rescue - Help Guide</h1>

    <div class="section">
        <h2>Overview</h2>
        <p>Welcome to the Springfield Pet Rescue! Our organization is dedicated to rescuing, caring for, and finding loving homes for pets in need. This guide will help you navigate our features and make the most of our services.</p>
    </div>

    <div class="section">
        <h2>1. User Registration and Login</h2>
        <h4><strong>New User Registration:</strong></h4>
        <ul>
            <li>Click on the <strong>Register</strong> button in the top right corner of the homepage.</li>
            <li>Fill in the required fields (Full Name, Username, Email, and Password).</li>
            <li>Ensure your password is secure.</li>
            <li>Click <strong>Register</strong> to complete your registration.</li>
            <li>If you receive a message that the username or email is already taken, please try again with a unique username and email.</li>
            <li>You will be redirected to the login page to use your newly created credentials.</li> 
        </ul>

        <h4><strong>Login:</strong></h4>
        <ul>
            <li>Click on the <strong>Login</strong> button in the top right corner of the homepage.</li>
            <li>Enter your registered username and password.</li>
            <li>Click <strong>Login</strong>.</li>
        </ul>
    </div>
    <hr>

    <div class="section">
        <h2>2. Dashboard</h2>
        <p>The dashboard provides an overview of key activities, such as managing pets and tracking adoptions.</p>
        <p>At the top of the dashboard, you'll find each pet you've added displayed in individual boxes, showcasing their details.</p><br>
        <h4><strong>Adding a New Pet:</strong></h4>
        <p>To add a new pet to the system:</p>
        <ul>
            <li>From the dashboard, click on <strong>Add New Pet</strong> located at the top right corner.</li>
            <li>Fill in the pet's details such as Name, Age, Location, and Description.</li>
            <li>Upload a picture of the pet.</li>
            <li>Click <strong>Add Pet</strong> to save the new entry.</li>
        </ul>
        <h4><strong>Edit or Delete Pet Information:</strong></h4>
        <ul>
            <li>To edit a pet's details, click the <strong>Edit</strong> button located in the bottom right corner of the pet's profile.</li>
            <li>To remove a pet from the dashboard, click the <strong>Delete</strong> button, also found in the bottom right corner of the pet's profile box.</li>
        </ul>
        <h4><strong>Adoption Requests:</strong></h4>
        <ul>
            <li>When someone requests to adopt a pet, their details will be shown at the bottom of the page.</li>
            <li>You can <strong>Confirm or Delete</strong> the request by clicking the respective buttons.</li>
            <li>Confirmed adoption requests can also be seen at the bottom of the page, and you can delete these requests once the pet has been successfully adopted.</li>
        </ul>
    </div>
    <hr>

    <div class="section">
        <h2>3. Home</h2>
        <p>This section displays the pets available for adoption that other users have uploaded.</p>
        <h4><strong>Adopt a Pet:</strong></h4>
        <ul>
            <li>If you want to find a pet to adopt, click the <strong>Adopt</strong> button under each pet listing.</li>
            <li>Fill in your Full Name, City, District, and Phone Number, then click <strong>Submit</strong> to send your adoption request.</li>
        </ul>
    </div>
</div>



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
