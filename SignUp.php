
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rtero Devices</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
   <script src="/scripts.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <!-- ------------navbar--------------------- -->
    <nav class="navbar"> 
        <div class="logo">
            <a href="index.php">Retro Devices</a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Devices</a>
                <ul class="dropdown-menu">
                    <li><a href="Sony.php">Sony</a></li>
                    <li><a href="Nintendo.php">Nintendo</a></li>
                    <li><a href="Atari.php">Atari</a></li>
                </ul>
            </li>
    
            <li><a href="#feedback">Feedback</a></li>
            <li id="userProfile">
                <a href="Login.php#login"><i class="bi bi-person-circle"></i></a>
            </li>
    
            <li>
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search...">
                    <button class="searchbutton"><i class="bi bi-search"></i></button>
                </div>
            </li>
        </ul>
    </nav>

        <section id="signUp" class="form-section">
            <h2 style="text-align: center;">Sign up</h2>
            <form class="form-form"  action="process_signUp.php" method="POST" novalidate>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"> <?php echo $_GET['error']; ?> </p>
                <?php } ?> 
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password confirmation">Repeat password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required> 
                </div>
                

                <div class="form-actions">
                  <button  class="button" type="submit">Sign Up</button>
                </div>
            </form>

            <p>Have an account already? <a href="Login.php">Login</a>.</p>
        </section>

        
     

<footer class="footer">
    <p>&copy; 2024 Retro Devices. All rights reserved.</p>
    <p>Contact us: <a href="mailto:info@retrodvices.com">info@retrodvices.com</a></p>
</footer>

  
</body>
</html>