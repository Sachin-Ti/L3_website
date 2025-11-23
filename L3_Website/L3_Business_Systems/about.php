<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inventory system</title>
        
        <!--Materials Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=order_approve" />

        <!--CSS/Stylesheet-->
        <link rel="stylesheet" href="styles_products.css"/>

    </head>
    <body>
<div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="./images/logo.png">
                <h2>Business<span class="danger">Systems</span> </h2>
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-round">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="manager_page.php"  >
                  <span class="material-icons-round">grid_view</span>
                  <h3>Dashboard</h3>
            </a>
        
            <a href="inventory.php" >
                  <span class="material-icons-round">inventory</span>
                  <h3>inventory</h3>
            </a>

         
            <a href="raw_materials.php">
                  <span class="material-icons-round">warehouse</span>
                  <h3>Raw Materials</h3>
            </a>

         
            <a href="finished_products.php">
                  <span class="material-icons-round">inventory_2</span>
                  <h3>Finished Goods</h3>
            </a>

            <a href="Health_Safety.php">
                          <span class="material-icons-round">health_and_safety</span>
                          <h3>Health&Safety</h3>
             </a>
            


            <a href="#" class="active">
            <span class="material-icons-outlined">info</span>
                    <h3>about </h3>
            </a>

              <a href="index.php">
                  <span class="material-icons-round">logout</span>
                  <h3>Logout</h3>
              </a>
        </div>
    </aside>
    <main>
        <h1>About Us</h1>
        <p>Welcome to Black Sheep, your trusted partner in inventory management solutions. Our mission is to empower businesses of all sizes with cutting-edge tools and technologies that streamline operations, enhance efficiency, and drive growth.</p>
        <p>At Business Systems, we understand the challenges faced by modern businesses in managing their inventory effectively. That's why we've developed a comprehensive suite of solutions designed to meet the unique needs of our clients. From real-time tracking and reporting to automated reordering and analytics, our platform offers everything you need to take control of your inventory.</p>
        <p>Our team of experts is dedicated to providing exceptional customer service and support. We work closely with our clients to understand their specific requirements and tailor our solutions accordingly. Whether you're a small business looking to optimize your stock levels or a large enterprise seeking to integrate inventory management across multiple locations, we have the expertise and experience to help you succeed.</p>
        <p>Thank you for choosing Business Systems as your inventory management partner. We look forward to working with you and helping your business thrive in today's competitive marketplace.</p>
        <p>here are some pictures of our facilitates and our department head</p>


  
<?php
// Folder on disk (for PHP)
$dir = __DIR__ . '/images/about';

// Base URL of this project (for the browser)
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

// Scan images
$images = [];
if (is_dir($dir)) {
    $files = scandir($dir);
    $images = array_filter($files, function($file) use ($dir) {
        $path = $dir . '/' . $file;
        return is_file($path) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file);
    });
}
$images = array_values($images);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; }
        .carousel {
            width: 600px;
            height: 400px;
            margin: auto;
            overflow: hidden;
            position: relative;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            background: #fff;
        }
        .carousel-track {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-track img {
            width: 600px;
            height: 400px;
            object-fit: cover;
        }
        .controls {
            text-align: center;
            margin-top: 10px;
        }
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background: #7380ec;
            color: #fff;
            font-size: 14px;
        }
        button:disabled {
            opacity: 0.5;
            cursor: default;
        }
    </style>
</head>
<body>

<div class="carousel" id="carousel">
    <div class="carousel-track" id="track">
        <?php if (!empty($images)): ?>
            <?php foreach ($images as $img): ?>
                <img src="<?php
                    echo htmlspecialchars($baseUrl . '/images/about/' . $img);
                ?>" alt="">
            <?php endforeach; ?>
        <?php else: ?>
            <div style="width:600px;height:400px;display:flex;align-items:center;justify-content:center;">
                No images found.
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="controls">
    <button id="prevBtn" onclick="prevSlide()">Prev</button>
    <button id="nextBtn" onclick="nextSlide()">Next</button>
</div>

<script>
let index = 0;
const track = document.getElementById('track');
const total = track.children.length;

// Disable if not enough slides
if (total <= 1) {
    document.getElementById('prevBtn').disabled = true;
    document.getElementById('nextBtn').disabled = true;
}

function updateCarousel() {
    if (total > 0) {
        track.style.transform = `translateX(-${index * 600}px)`;
    }
}

function nextSlide() {
    if (total <= 1) return;
    index = (index + 1) % total;
    updateCarousel();
}

function prevSlide() {
    if (total <= 1) return;
    index = (index - 1 + total) % total;
    updateCarousel();
}
</script>

</body>
</html>