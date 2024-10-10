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
    <link rel="stylesheet" type="text/css" href="css/about.css">
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




/* About Section */
.about-section {
    padding: 50px 20px;
    background-image: url(images/background.jpg);
    text-align: center;
}

/* Mission and Vision Section */
.mission-vision-section {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap; /* Wrap the cards on smaller screens */
    padding: 50px 20px;
}

.card {
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    padding: 40px 30px;
    margin: 20px;
    max-width: 400px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Different backgrounds for mission and vision */
.mission-card {
    background: linear-gradient(135deg, #2ebacd, #006064); /* Gradient using #2ebacd and #006064 */
    color: #ffffff;
}

.vision-card {
    background: linear-gradient(135deg, #006064, #004d40); /* Gradient using #006064 and #004d40 */
    color: #ffffff;
    height: 380px;
}

.card h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.card p {
    font-size: 1.2rem;
    line-height: 1.7;
}

.missionimage{
    width: 40%;
    height: 30%;
    object-fit: cover;
    border-radius: 15px;
}

.visionimage{
    width: 40%;
    height: 40%;
    object-fit: cover;
    border-radius: 15px;
}


/* Hover effect for the cards */
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .mission-vision-section {
        flex-direction: column;
        align-items: center;
    }

    .card {
        max-width: 90%;
    }
}

/* Promotions Section */
.promotions-section {
    padding: 50px 20px;
    text-align: center;
}

.promotions-section h2 {
    color: #004d40;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.promotions-section p {
    font-size: 1.2em;
    line-height: 1.6;
    color: #006064;
}

.donate-btn {
    background-color: #006064;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    text-transform: uppercase;
}

.donate-btn:hover {
    background-color: #004d40;
}

/* Services Section */
.services-section {
    padding: 50px ;
    text-align: center;
    
}

.section-title{
    color: #004d40;
    font-size: 2.5rem;
    margin-bottom: 40px;
    border-bottom: 4px solid #004d40;
    display: inline-block;
    padding-bottom: 10px;
}

.section-description{
    max-width: 1100px;
    margin: 0 auto;
    color: #171616;
    font-size: 1.2rem;
    margin-bottom: 50px;
    line-height: 1.5;
    font-weight: bold;
}

.services-section h2 {
    color: #004d40;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.services-section .service-card {
    background-color: #9ee7f3;
    border-radius: 10px;
    border: 2px solid black;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    text-align: left;
    max-width: 300px;
    display: inline-block;
    vertical-align: top;
    margin: 0 10px;
    transition: transform 0.3s ease;
}

.service-card:hover {
    transform: scale(1.05); /* Add a subtle hover effect */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); 
    background-color: #2ebacd;
    
}

.service-card h3 {
    font-size: 1.8rem;
    color: #004d40;
    margin-bottom: 15px;
}

.service-card p {
    font-size: 1.2rem;
    font-weight: bold;
    line-height: 1.6;
    color: black;

}


@media (min-width: 768px) {
    .services-section {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .service-card {
        width: 30%; /* Adjust card width for larger screens */
        margin: 15px;
    }
}

@media (max-width: 767px) {
    .service-card {
        width: 100%; /* Full-width on smaller screens */
        margin: 15px 0;
    }
}

/* Adoption Section */
.adoption-section {
    padding: 50px 20px;
    text-align: center;
    margin-top: 30px;
}

.adoption-section h2 {
    color: #004d40;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.adoption-section p {
    font-size: 1.2em;
    line-height: 1.6;
    color: #006064;
}

.adopt-btn {
    background-color: #006064;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    text-transform: uppercase;
}

.adopt-btn:hover {
    background-color: #004d40;
}

/* Facts Section */
.facts-section {
    padding: 50px 20px;
    text-align: center;
    margin-top: 30px;
}

.facts-section h2 {
    color: #004d40;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.facts-section p {
    font-size: 1.2em;
    line-height: 1.6;
    color: #006064;
}

.facts-btn {
    background-color: #006064;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    text-transform: uppercase;
}

.facts-btn:hover {
    background-color: #004d40;
}

/* Education Section */
.education-section {
    padding: 50px;
    text-align: center;
}

.education-section h2 {
    color: #006064;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.education-section .education-card {
    background-color: #2ebacd;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    text-align: left;
    max-width: 450px;
    display: inline-block;
    vertical-align: top;
    margin: 0 10px;
    transition: transform 0.3s ease;
}

.education-card h3 {
    font-size: 1.8rem;
    color: #004d40;
    margin-bottom: 15px;
}

.education-card p {
    font-size: 1.2rem;
    font-weight: bold;
    line-height: 1.6;
    color: black;
}

.education-card:hover {
    transform: scale(1.05); /* Add a subtle hover effect */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); 
    background-color: #eef2f2;
    
}

@media (min-width: 768px) {
    .education-section {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .education-card {
        width: 30%; /* Adjust card width for larger screens */
        margin: 15px;
    }
}

@media (max-width: 767px) {
    .education-card {
        width: 100%; /* Full-width on smaller screens */
        margin: 15px 0;
    }
}

.kids-btn, .adults-btn {
    background-color: #006064;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    text-transform: uppercase;
}

.kids-btn:hover, .adults-btn:hover {
    background-color: #004d40;
}

/* Volunteer Section */
.volunteer-section {
    padding: 50px 20px;
    text-align: center;
    margin-top: 30px;
}

.volunteer-section h2 {
    color: #004d40;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.volunteer-section p {
    background-color: #2ebacd;
    padding: 20px;
    border-radius: 10px;
    margin: 10px auto;
    width: 80%;
    color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-size: 1.2em;
    line-height: 1.6;
}

.volunteer-btn {
    background-color: #006064;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    text-transform: uppercase;
}

.volunteer-btn:hover {
    background-color: #004d40;
}

/* Success Stories Section */
.success-stories-section {
    padding: 50px 20px;
    background-color: #e0f7fa; /* Lightened version of primary color */
    text-align: center;
    margin-top: 30px;
}

.success-stories-section h2 {
    color: #004d40;
    font-size: 2.5em;
    margin-bottom: 20px;
}

.success-stories-section p {
    font-size: 1.2em;
    line-height: 1.6;
    color: #006064;
}

.success-stories-btn {
    background-color: #006064;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    text-transform: uppercase;
}

.success-stories-btn:hover {
    background-color: #004d40;
}

/* Responsive Design for Small Devices */
@media (max-width: 768px) {
    .banner-content h1 {
        font-size: 2rem;
    }

    .banner-content p {
        font-size: 1rem;
    }

    .about-section, .promotions-section, .services-section, .adoption-section, .facts-section, .education-section, .volunteer-section, .success-stories-section {
        padding: 30px 10px;
    }

    .card, .education-card, .service-card {
        width: 100%;
        max-width: 100%;
    }
}

    @media (max-width: 480px) {
        .banner-content h1 {
            font-size: 1.5rem;
        }
    
        .banner-content p {
            font-size: 0.9rem;
        }
    
        .success-stories-section, .volunteer-section, .education-section, .facts-section, .adoption-section, .services-section, .promotions-section, .about-section {
            padding: 20px 10px;
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
            <h1>About Us</h1>

        </div>
    </div>
        <div class="about-section">
        <div class="mission-vision-section">
            <div class="card mission-card">
                <h2>Our Mission</h2>
                <img class="missionimage" src="images/mission.webp" alt="Our Mission">
                <p>To rescue, rehabilitate, and rehome stray and abandoned animals, ensuring they find loving and permanent homes.</p>
            </div>
            <div class="card vision-card">
                <h2>Our Vision</h2>
                <img class="visionimage" src="images/vision.webp" alt="Our Vision">
                <p>A community where every stray animal has a safe and caring home, and where animal welfare is a shared responsibility.</p>
            </div>
        </div>

        <!-- Promotions Section -->
        <div class="promotions-section">
            <h2 class="section-title">What We Do</h2>
            <p class="section-description">
            Springfield Pet Rescue rehomes pets in the Western Province of Sri Lanka, with a commitment to improving the lives of
                        animals in need. Our services begin with rescue operations, where we respond to calls from the public and work with local
                        authorities to save stray, abandoned, and mistreated animals. Once rescued, every animal is given medical care,
                        including vaccinations, parasite control, and spaying or neutering, to restore them to full health. For those
                        animals who have experienced trauma, we provide rehabilitation, working closely with veterinarians and animal
                        behaviorists to ensure they receive the training and support needed for a successful adoption. Our adoption services
                        focus on carefully matching pets with loving homes to ensure their long-term well-being. In addition to our rescue
                        and rehoming efforts, we actively engage the community through awareness programs, encouraging people to
                        participate in fundraising events and support our mission by donating or sponsoring rescue initiatives.
                        Together, we strive to give every animal a chance at a happy, healthy life.
                    </p>
            
        </div>

        <!-- Services Section -->
        <h2 class="section-title">Our Services</h2>
        <div class="services-section">
            <div class="card service-card">
                <h3>Rescue Operations</h3>
                <p>We conduct rescue missions to save stray and injured animals from dangerous situations and bring them to safety.</p>
            </div>
            <div class="card service-card">
                <h3>Medical Care</h3>
                <p>Our dedicated team provides medical treatment, vaccinations, and rehabilitation for rescued animals.</p>
            </div>
            <div class="card service-card">
                <h3>Rehoming Program</h3>
                <p>We work tirelessly to match our rescued animals with loving families and ensure they are placed in safe homes.</p>
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