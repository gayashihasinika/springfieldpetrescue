<?php
session_start();
if (!isset($_SESSION['user_name']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

$connection = new mysqli("localhost", "root", "", "sprinfieldpetrescue");

$user_name = $_SESSION['user_name'];

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_result = $connection->query("SELECT user_name, full_name, email, is_admin FROM users");
$pet_result = $connection->query("SELECT pet_id, user_name, name, pet_type, age, gender, district, city, phone_number, description, photo, is_adopted FROM pet");
$adopt_result = $connection->query("
    SELECT a.adopt_id, a.pet_id, a.full_name, a.district, a.city, a.phone_number, p.name AS pet_name
    FROM adopt a
    JOIN pet p ON a.pet_id = p.pet_id
    WHERE a.is_confirmed = 0
");
$confirmed_adopt_result = $connection->query("
    SELECT a.adopt_id, a.pet_id, a.full_name, a.district, a.city, a.phone_number, p.name AS pet_name
    FROM adopt a
    JOIN pet p ON a.pet_id = p.pet_id
    WHERE a.is_confirmed = 1  
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWS - Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/admin_dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <style>
        
body {
    font-family: 'Roboto', sans-serif;
    line-height: 1.6;
    color: #333;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.main-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.page-title {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 20px;
    border-bottom: 2px solid #3498db;
    padding-bottom: 10px;
}

.section-title {
    font-size: 1.8rem;
    color: #2c3e50;
    margin-top: 30px;
    margin-bottom: 15px;
}

.subsection-title {
    font-size: 1.4rem;
    color: #34495e;
    margin-top: 20px;
    margin-bottom: 10px;
}


form {
    margin-bottom: 20px;
}

input[type="text"],
input[type="email"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.btn-primary {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #2980b9;
}


.data-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.data-table th,
.data-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.data-table th {
    background-color: #4CAF50;
    color: #fff;
}

.data-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.data-table tr:hover {
    background-color: #e0e0e0;
}


.link-edit,
.link-delete,
.link-confirm {
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 3px;
    color: #fff;
    font-weight: bold;
}

.link-edit {
    background-color: #2ecc71;
}

.link-delete {
    background-color: #e74c3c;
}

.link-confirm {
    background-color: #f39c12;
}

.link-edit:hover,
.link-delete:hover,
.link-confirm:hover {
    opacity: 0.8;
}

.pet-photo {
    max-width: 100px;
    max-height: 100px;
    object-fit: cover;
    border-radius: 5px;
}


@media (max-width: 768px) {
    .main-container {
        padding: 10px;
    }

    .page-title {
        font-size: 2rem;
    }

    .section-title {
        font-size: 1.5rem;
    }

    .subsection-title {
        font-size: 1.2rem;
    }

    .data-table {
        font-size: 0.9rem;
    }

    .data-table th,
    .data-table td {
        padding: 8px;
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
    <header>
    <div class="logo">
            <a href="index.php">
            	<img src="images/logo.png" alt="PAWS Logo">
            </a>
    </div>
    <nav>
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">My Dashboard</a></li>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            </ul>
             <div class="auth-buttons">
             	<a href="logout.php" class="btn">Logout</a>
             </div>
    
    </nav>
    </header>
    <main class="main-container">
    <h1 class="page-title">Welcome back, <?php echo $user_name; ?>! &#128075</h1>
    <h1 class="page-title">Admin Dashboard</h1>

 
    <h2 class="section-title">Manage Users</h2>
    <form action="register_process.php" method="POST">
        <input type="text" name="user_name" placeholder="Username" required>
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="password" placeholder="Password" required>
        <button type="submit" name="add_user" class="btn-primary">Add User</button>
    </form>

    <h3 class="subsection-title">Existing Users:</h3>
    <table class="data-table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit User</th>
                <th>Delete User</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $user_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['is_admin'] ? 'Admin' : 'User'; ?></td>
                <td>
                     <a href="edit_user_admin.php?user_name=<?php echo $row['user_name']; ?>" class="link-edit">Edit</a>   
                </td>
                <td>
                     <a href="delete_user.php?user_name=<?php echo $row['user_name']; ?>" class="link-delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

   
    <h2 class="section-title">Manage Pets</h2>
    <form action="add_pet_process_admin.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Pet Name" required>
        <input type="text" name="pet_type" placeholder="Pet Type" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="gender" placeholder="Gender" required>
        <input type="text" name="district" placeholder="District" required>
        <input type="text" name="city" placeholder="City" required>
        <input type="text" name="phone_number" placeholder="Phone Number" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="file" name="photo" required>
        <button type="submit" name="add_pet" class="btn-primary">Add Pet</button>
    </form>

    <h3 class="subsection-title">Existing Pets:</h3>
    <table class="data-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Pet ID</th>
                <th>Pet Name</th>
                <th>Type</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Edit Pet</th>
                <th>Delete Pet</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $pet_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['pet_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['pet_type']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['district'] . ', ' . $row['city']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <?php if ($row['photo']) { ?>
                        <img src="<?php echo $row['photo']; ?>" alt="Pet Photo" class="pet-photo">
                    <?php } ?>
                </td>
                <td><?php echo $row['is_adopted'] ? 'Adopted' : 'Not Adopted'; ?></td>
                <td>
                    <a href="edit_pet_admin.php?pet_id=<?php echo $row['pet_id']; ?>" class="link-edit">Edit</a>
                </td>
                <td>
                <a href="delete_pet_admin.php?pet_id=<?php echo $row['pet_id']; ?>" class="link-delete" onclick="return confirm('Are you sure you want to delete this pet?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

  
    <h2 class="section-title">Manage Adoptions</h2>
    <h3 class="subsection-title">Adoption Requests:</h3>
    <table class="data-table">
        <thead>
            <tr>
                <th>Adoption ID</th>
                <th>Pet ID</th>
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
        <?php while ($row = $adopt_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['adopt_id']; ?></td>
                <td><?php echo $row['pet_id']; ?></td>
                <td><?php echo $row['pet_name']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['district']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td>
                    <a href="confirm_request_admin.php?confirm_adoption=1&pet_id=<?php echo $row['pet_id'];?>&adopt_id= <?php echo $row['adopt_id'];?>" class="link-confirm">Confirm</a>      
                </td>
                <td>
                    <a href="delete_request_admin.php?delete_request=1&adopt_id= <?php echo $row['adopt_id'];?>" class="link-delete" onclick="return confirm('Are you sure you want to delete this request?');">Delete</a> 
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <h3 class="subsection-title">Confirmed Adoption Requests:</h3>
    <table class="data-table">
        <thead>
            <tr>
                <th>Adoption ID</th>
                <th>Pet ID</th>
                <th>Pet Name</th>
                <th>Full Name</th>
                <th>District</th>
                <th>City</th>
                <th>Phone Number</th>
                <th>Delete Request</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $confirmed_adopt_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['adopt_id']; ?></td>
                <td><?php echo $row['pet_id']; ?></td>
                <td><?php echo $row['pet_name']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['district']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td>
                     <a href="delete_request_admin.php?delete_request=1&adopt_id= <?php echo $row['adopt_id'];?>" class="link-delete" onclick="return confirm('Are you sure you want to delete this request?');">Delete</a> 
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
$connection->close();
?>
