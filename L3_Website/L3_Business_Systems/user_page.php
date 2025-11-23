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
            <a href="user_page.php"  >
                  <span class="material-icons-round">grid_view</span>
                  <h3>Dashboard</h3>
            </a>
        
            <a href="inventory_user.php" >
                  <span class="material-icons-round">inventory</span>
                  <h3>inventory</h3>
            </a>

         
            <a href="raw_materials_user.php">
                  <span class="material-icons-round">warehouse</span>
                  <h3>Raw Materials</h3>
            </a>

         
            <a href="finished_products-user.php">
                  <span class="material-icons-round">inventory_2</span>
                  <h3>Finished Goods</h3>
            </a>

                  <a href="Health_Safety_user.php">
                              <span class="material-icons-round">health_and_safety</span>
                              <h3>Health&Safety</h3>
                  </a>

 

            <a href="about_user.php">
            <span class="material-icons-outlined">info</span>
                    <h3>about </h3>
            </a>

              <a href="index.php">
                  <span class="material-icons-round">logout</span>
                  <h3>Logout</h3>
              </a>
        </div>
    </aside>
            <!---------------------END OF ASIDE ------------->
            <main>
            <h1>Dashboard</h1>

            <div class="insight">
                  <div class="Purchases">
                        <span class="material-icons-round">account_balance</span>
                        <div class="middle">
                              <div class="left">
                                    <h3>Total Purchases</h3>
                                    <h1>$32400</h1>
                              </div>
                              <div class="progress">
                                    <svg>
                                          <circle cx='38' cy='42' r='36'></circle>
                                    </svg>
                             
                              <div class="number">
                                    <p>81%</p>
                              </div>
                              </div>
                        </div>
                        <small class="text-muted">Past Month</small>
                  </div>
                  <!--------------END OF PURCHASES------------->
                       <div class="Stock">
                        <span class="material-icons-round">inventory_2</span>
                        <div class="middle">
                              <div class="left">
                                    <h3>Total Stock</h3>
                                    <h1>29000</h1>
                              </div>
                              <div class="progress">
                                    <svg>
                                          <circle cx='38' cy='42' r='36'></circle>
                                    </svg>
                              
                              <div class="number">
                                    <p>73%</p>
                              </div>
                              </div>
                        </div>
                        <small class="text-muted">Past Month</small>
                  </div>
                  <!--------------END OF inventory------------->
                       <div class="Material">
                        <span class="material-icons-round">warehouse</span>
                        <div class="middle">
                              <div class="left">
                                    <h3>Total Raw Materials</h3>
                                    <h1>9200</h1>
                              </div>
                              <div class="progress">
                                    <svg>
                                          <circle cx='38' cy='42' r='36'></circle>
                                    </svg>
                              
                              <div class="number">
                                    <p>23%</p>
                              </div>
                              </div>
                        </div>
                        <small class="text-muted">Past Month</small>
                  </div>
                  <!--------------END OF Materials------------->
            </div>
            
            <!-----end of insights-->
            <div class="recent-orders">
                  <table>
                        <thead>
                        <tr>
                              <th>Product Name</th>
                              <th>Product Number</th>
                              <th>Payment</th>
                              <th>Status</th>
                              <th></th>
                        </tr>
                        </thead>
                        <tbody>


                              
                        
                  </table>

            </div>
            

            
            </main>

            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-round">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-round active">light_mode</span>
                        <span class="material-icons-round">dark_mode</span>
                        
                    </div>

             <div class="profile">
                 <p> hello Employee</p>

                  </div>

                  <p>Welcome to Black Sheep, your trusted partner in inventory management solutions. Our mission is to empower businesses of all sizes with cutting-edge tools and technologies that streamline operations, enhance efficiency, and drive growth.
        At Business Systems, we understand the challenges faced by modern businesses in managing their inventory effectively. That's why we've developed a comprehensive suite of solutions designed to meet the unique needs of our clients. From real-time tracking and reporting to automated reordering and analytics, our platform offers everything you need to take control of your inventory.
        Our team of experts is dedicated to providing exceptional customer service and support. We work closely with our clients to understand their specific requirements and tailor our solutions accordingly. Whether you're a small business looking to optimize your stock levels or a large enterprise seeking to integrate inventory management across multiple locations, we have the expertise and experience to help you succeed.</p>

               
                <!-----------------END OF TOP ----------------->
                
                  


            <script src ="./orders.js"></script>  
            <script src ="./script.js"></script>     
           

            
            
        </body>
        </html>