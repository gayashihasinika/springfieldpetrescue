<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$connection = new mysqli("localhost", "root", "", "sprinfieldpetrescue");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_name = $_SESSION['user_name'];


$pet_sql = "SELECT pet_id, name, pet_type, age, gender, district, city, description, photo, is_adopted FROM pet WHERE user_name=?";
$pet_stmt = $connection->prepare($pet_sql);
$pet_stmt->bind_param("s", $user_name);
$pet_stmt->execute();
$pet_result = $pet_stmt->get_result();


$adopt_sql = "SELECT adopt.adopt_id, adopt.pet_id, pet.name AS pet_name, adopt.full_name, adopt.district, adopt.city, adopt.phone_number
              FROM adopt
              JOIN pet ON adopt.pet_id = pet.pet_id
              WHERE pet.user_name = ? AND adopt.is_confirmed = 0";
$adopt_stmt = $connection->prepare($adopt_sql);
$adopt_stmt->bind_param("s", $user_name);
$adopt_stmt->execute();
$adopt_result = $adopt_stmt->get_result();


$confirmed_adopt_sql = "SELECT adopt.adopt_id, adopt.pet_id, pet.name AS pet_name, adopt.full_name, adopt.district, adopt.city, adopt.phone_number
                        FROM adopt
                        JOIN pet ON adopt.pet_id = pet.pet_id
                        WHERE adopt.is_confirmed = 1 AND pet.user_name = ?";
$confirmed_adopt_stmt = $connection->prepare($confirmed_adopt_sql);
$confirmed_adopt_stmt->bind_param("s", $user_name);
$confirmed_adopt_stmt->execute();
$confirmed_adopt_result = $confirmed_adopt_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Springfield Pet Rescue and Rehome</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <style>
        /*header styles*/
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

/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.page-title {
    font-size: 32px;
    text-align: center;
    color: #333;
    margin: 20px 0;
}

h2.section-title {
    font-size: 28px;
    color: #555;
    text-align: center;
    margin-top: 40px;
}


/* Pet Grid Styles */
.pet-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin: 20px 0;
}

.pet-card {
    background-color: #ddd;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s ease-in-out;
}

.pet-card:hover {
    transform: scale(1.05);
}

.pet-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.pet-details {
    padding: 15px;
    text-align: left;
}

.pet-details p {
    margin: 5px 0;
    color: #555;
}

.pet-details strong {
    color: #333;
}

.pet-actions {
    margin-top: 10px;
    text-align: center;
}

.btn-secondary, .btn-danger {
    text-decoration: none;
    padding: 8px 12px;
    margin-right: 5px;
    font-size: 14px;
    border-radius: 4px;
    color: #fff;
    background-color: #28a745;
    transition: background-color 0.3s ease;
}

.btn-secondary {
    background-color: #17a2b8;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-secondary:hover, .btn-danger:hover {
    background-color: #0056b3;
}

/* Table Styles */
.data-table {
    width: 100%;
    max-width: 1000px;
    margin: 30px auto;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.data-table th, .data-table td {
    padding: 12px 15px;
    text-align: center;
    border: 1px solid #ddd;
}

.data-table th {
    background-color: #006064;
    color: #fff;
    text-transform: uppercase;
    font-size: 16px;
}

.data-table td {
    background-color: #fff;
    color: #555;
}

.btn-confirm, .btn-delete {
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 4px;
    color: #fff;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.btn-confirm {
    background-color: #28a745;
}

.btn-confirm:hover {
    background-color: #218838;
}

.btn-delete {
    background-color: #dc3545;
}

.btn-delete:hover {
    background-color: #c82333;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .pet-grid {
        flex-direction: column;
        align-items: center;
    }

    .pet-card {
        width: 90%;
    }

    .data-table {
        width: 95%;
        font-size: 14px;
    }
}

.btn-primary{
    background-color: #006064;
    color: white;
    padding: 10px 15px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 1.1rem;
    transition: background-color 0.3s;
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
             	<a href="logout.php" class="btn">Logout</a>
        </div>
        </div>
    </div>
    <nav>
        <ul class="menu">
        <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="dashboard.php">My Dashboard</a></li>
                <li><a href="edit_user.php">Profile</a></li>
                <li>
                <?php
                
                if ($_SESSION['is_admin'] == 1){
                	echo '<a href="admin_dashboard.php">Admin Dashboard</a>';
                }?>
                </li>
            </ul>
        </nav>

        <!-- Banner Section -->
    <div class="banner">
        <div class="overlay"></div>
        <div class="banner-content">
            <h1>Hi, <?php echo $user_name; ?>! &#128075</h1>
            <h1>Welcome back to Springfield Pet Rescue</h1>
            <br />
            <br />
            <br />
            <br />
            <br />
            <a href="add_pet.php" class="btn-primary">
            Add New Pet
        </a>
        </div>
    </div>
    <br />
    <main class="main-container">
    <div><h1 class="page-title">Your Pets</h1></div>
    
    <div class="pet-grid">
    <?php if ($pet_result->num_rows > 0) {?>
        <?php while ($row = $pet_result->fetch_assoc()) { ?>
            <div class="pet-card">
                <?php if ($row['photo']) { ?>
                    <img src="<?php echo $row['photo']; ?>" alt="Pet Photo" class="pet-image">
                <?php } else { ?>
                    <img src="default.jpg" alt="Pet Photo" class="pet-image">
                <?php } ?>
                <div class="pet-details">
                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p><br />
                    <p><strong>Type:</strong> <?php echo $row['pet_type']; ?></p><br />
                    <p><strong>Age:</strong> <?php echo $row['age']; ?></p><br />
                    <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p><br />
                    <p><strong>District:</strong> <?php echo $row['district']; ?></p><br />
                    <p><strong>City:</strong> <?php echo $row['city']; ?></p><br />
                    <p><strong>Description:</strong> <?php echo $row['description']; ?></p><br />
                    <p><strong>Status:</strong> 
                        <?php echo ($row['is_adopted'] == 1) ? 'Adopted' : 'Not Adopted'; ?>
                    </p><br />
                    <div class="pet-actions">
                        <a href="edit_pet.php?pet_id=<?php echo $row['pet_id']; ?>" class="btn-secondary">Edit</a>
                        <a href="delete_pet.php?pet_id=<?php echo $row['pet_id']; ?>" class="btn-danger" onclick="return confirm('Are you sure you want to delete this pet?');">Delete</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { echo "<p>No pets added.</p>";} ?>
    </div>

    <h2 class="section-title">Adoption Requests for Your Pets</h2>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Pet Name</th>
                <th>Full Name</th>
                <th>District</th>
                <th>City</th>
                <th>Phone Number</th>
                <th>Confirm Request</th>
                <th>Delete Request</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($adopt_row = $adopt_result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $adopt_row['pet_name']; ?></td>
                    <td><?php echo $adopt_row['full_name']; ?></td>
                    <td><?php echo $adopt_row['district']; ?></td>
                    <td><?php echo $adopt_row['city']; ?></td>
                    <td><?php echo $adopt_row['phone_number']; ?></td>
                    <td>
                         <a href="confirm_request.php?confirm_adoption=1&pet_id=<?php echo $adopt_row['pet_id'];?>&adopt_id= <?php echo $adopt_row['adopt_id'];?>" class="btn-confirm"> Confirm</a> 
                    </td>
                    <td>
                         <a href="delete_request.php?delete_request=1&adopt_id= <?php echo $adopt_row['adopt_id'];?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this request?');"> Delete</a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <h2 class="section-title">Confirmed Adoption Requests</h2>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Pet Name</th>
                <th>Full Name</th>
                <th>District</th>
                <th>City</th>
                <th>Phone Number</th>
                <th>Delete Request</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($confirmed_row = $confirmed_adopt_result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $confirmed_row['pet_name']; ?></td>
                    <td><?php echo $confirmed_row['full_name']; ?></td>
                    <td><?php echo $confirmed_row['district']; ?></td>
                    <td><?php echo $confirmed_row['city']; ?></td>
                    <td><?php echo $confirmed_row['phone_number']; ?></td>
                    <td>
                         <a href="delete_request.php?delete_request=1&adopt_id= <?php echo $confirmed_row['adopt_id'];?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this request?');"> Delete</a> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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

<?php 
$pet_stmt->close();
$adopt_stmt->close();
$confirmed_adopt_stmt->close();
$connection->close(); 
?>
