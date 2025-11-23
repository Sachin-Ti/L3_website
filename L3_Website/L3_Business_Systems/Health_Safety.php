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
        <link rel="stylesheet" href="Health.css"/>

        
    </head>
    <body>
        <div class="container">
            <aside>
                <div class="top">
                  <div class="logo">
                     <a href="index.php">
                        <img src="./images/logo.png">
                    </a>
                        
                  
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
                    

                    <a href="Health_Safety.php" class="active">
                          <span class="material-icons-round">health_and_safety</span>
                          <h3>Health&Safety</h3>
                    </a>

                     <a href="about.php">
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
            <h2>Health and Safety Report</h2>
            
            <div class="step-row">
                <div id="progress"></div>
                <div class="step-col"><small>Step 1</small></div>
                <div class="step-col"><small>Step 2</small></div>
                <div class="step-col"><small>Step 3</small></div>
            </div>

            <div class="container1">
                
            <form id="form1">
                <input type="text" placeholder="Report Title" required>
                <input type="date" required>
                <input type="text" placeholder="Incdent Type" required>

                <div class="btn-box">
                    <button type="button" id="Next1">Next</button>
                </div>

            </form>

            <form id="form2">
                <input type="text" placeholder="Location of Incident" required>
                <input type="text" placeholder="Who was Involved" required>
                <textarea placeholder="Description of Incident" required></textarea>
                <input type="text" placeholder="Reported By" required>
                <input type="file" id="incidentImage" accept="image/*">

                <div class="btn-box">
                    <button type="button" id="Back1">Back</button>
                    <button type="button" id="Next2">Next</button>
                </div>

            </form>

            <form id="form3">
                <input type="text" placeholder="Actions Taken" required>
                <input type="text" placeholder="Follow-up Actions" required>
                <input type="text" placeholder="Additional Notes">

                <div class="btn-box">
                    <button type="button" id="Back2">Back</button>
                    <button type="button" id="SubmitBtn">Submit</button>
                </div>
            </form>

            


            </div>
        </main>




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

                  <div class="info">

                        <p>hey <b>Sachin</b></p>
                        <small class="text-muted">Admin</small>
                  </div>
                  <div class="profile-photo">
                        <img src="./images/profile.png">
                  </div>
                  </div>
                </div>     
            </div>           

            <script src ="./script.js"></script>   

            <script>
            var form1 = document.getElementById('form1');
            var form2 = document.getElementById('form2');
            var form3 = document.getElementById('form3');

            var Next1 = document.getElementById('Next1');
            var Next2 = document.getElementById('Next2');
            var Back1 = document.getElementById('Back1');
            var Back2 = document.getElementById('Back2');

            var progress = document.getElementById('progress');

            Next1.onclick = function() {
                form1.style.top = "-500px";
                form2.style.top = "0px";
                progress.style.width = "66.66%";
            }

            Back1.onclick = function() {
                form1.style.top = "0px";
                form2.style.top = "500px";
                progress.style.width = "33.33%";
            }

            Next2.onclick = function() {
                form2.style.top = "-500px";
                form3.style.top = "0px";
                progress.style.width = "100%";
            }

            Back2.onclick = function() {
                form2.style.top = "0px";
                form3.style.top = "500px";
                progress.style.width = "66.66%";
            }
            </script>

            <script>
            document.getElementById('SubmitBtn').onclick = function() {
    // collect all form data into a JS object
    var data = {};
    data.title = document.querySelector('#form1 input[placeholder="Report Title"]').value;
    data.date = document.querySelector('#form1 input[type="date"]').value;
    data.incidentType = document.querySelector('#form1 input[placeholder="Incdent Type"]').value;
    data.location = document.querySelector('#form2 input[placeholder="Location of Incident"]').value;
    data.involved = document.querySelector('#form2 input[placeholder="Who was Involved"]').value;
    data.description = document.querySelector('#form2 textarea').value;
    data.reportedBy = document.querySelector('#form2 input[placeholder="Reported By"]').value;
    data.actionsTaken = document.querySelector('#form3 input[placeholder="Actions Taken"]').value;
    data.followUp = document.querySelector('#form3 input[placeholder="Follow-up Actions"]').value;
    data.additionalNotes = document.querySelector('#form3 input[placeholder="Additional Notes"]').value;

    // Add image file if selected
    var imageInput = document.getElementById('incidentImage');
    if (imageInput && imageInput.files.length > 0) {
        var reader = new FileReader();
        reader.onload = function(e) {
            data.incidentImage = e.target.result; // base64 string
            sendData(data);
        };
        reader.readAsDataURL(imageInput.files[0]);
    } else {
        sendData(data);
    }

    function sendData(data) {
        fetch("https://script.google.com/macros/s/AKfycbykzG0h9h533K9BwDgSSsX4WBbV9GICab2Ugn6fGy4fSw4Dx2gtV-osxLfXxqx_oMbXJg/exec", {
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            alert("Form submitted successfully!");
            document.getElementById('form1').reset();
            document.getElementById('form2').reset();
            document.getElementById('form3').reset();
            form1.style.top = "0px";
            form2.style.top = "500px";  
            form3.style.top = "500px";
            progress.style.width = "33.33%";
        })
        .catch(error => console.error("Error!", error));
    }
}
            </script>
           
            <script>
                function validateFormInputs(formId) {
                    const form = document.getElementById(formId);
                    const requiredInputs = form.querySelectorAll('input[required], textarea[required]');
                    for (let input of requiredInputs) {
                        if (!input.value.trim()) {
                            input.focus();
                            alert('Please fill all required fields.');
                            return false;
                        }
                    }
                    return true;
                }

                Next1.onclick = function() {
                    if (validateFormInputs('form1')) {
                        form1.style.top = "-500px";
                        form2.style.top = "0px";
                        progress.style.width = "66.66%";
                    }
                }

                Back1.onclick = function() {
                    form1.style.top = "0px";
                    form2.style.top = "500px";
                    progress.style.width = "33.33%";
                }

                Next2.onclick = function() {
                    if (validateFormInputs('form2')) {
                        form2.style.top = "-500px";
                        form3.style.top = "0px";
                        progress.style.width = "100%";
                    }
                }
                            
                Back2.onclick = function() {
                    form2.style.top = "0px";
                    form3.style.top = "500px";
                    progress.style.width = "66.66%";
                }

                
                </script>
            
        </body>
        </html>




