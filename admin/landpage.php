<?php include 'update_user.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/landpage.css">

    <!-- Montserrat font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="title">
                <div class="logo">
                    <a href="https://www.facebook.com/or1equals1" target="_blank"><img src="../assets/images/fb-blue.png" height="50px" class="logos"></a>
                    <a href="https://paterostechnologicalcollege.edu.ph/" target="_blank"><img src="../assets/images/ptc.png" height="52px" class="logos"></a>
                    <a href="https://github.com/fnicholasramos/capstone_webapp" target="_blank"><img src="../assets/images/github.png" height="50px" class="logos"></a> 
                </div>
                
                <div class="important">
                    <p class="onm">Report technical problem</p>
                    <p class="email">Pateros Technological College</p>
                    <p class="location">GitHub Repository</p>
                </div>
                
            </div> 

            <div class="main">
                <a href="#" class="user-edit" id="user-edit-link">
                    <img src="../assets/images/clean-user-grey.png" height="60px" class="user-icon">
                </a>
                <span class="current-user" id="current-user"></span>
            </div>

            <!-- Hidden edit form -->
             <div class="modify-user" id="edit-form-container" style="display: none;">
                <form method="GET" action="">
                    <label for="user_id">Choose a user to update:</label>
                    <select name="user_id" id="user_id" onchange="this.form.submit()">
                        <option value="">--Select User--</option>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $selected = (isset($_GET['user_id']) && $_GET['user_id'] == $row['id']) ? 'selected' : '';
                            echo "<option value='{$row['id']}' $selected>{$row['username']}</option>";
                        }
                        ?>
                    </select>
                </form>

                <!-- Display and edit user info -->
                <?php if (isset($currentUsername)): ?>
                    <form method="POST" action="">
                        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">

                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="<?php echo $currentUsername; ?>" required><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $currentEmail; ?>" required><br>

                        <button type="submit" class="save" name="update">Save Changes</button>
                        <button type="button" id="cancel-edit" class="cancel">Cancel</button>
                    </form>
                <?php endif; ?>       

             </div>
           
        </div>   


        <div class="overview">
            <div class="text">
            This study, conducted by BSIT students of Pateros Technological College, focuses on developing HealthGuard, an innovative IV Bag Monitoring and Alert System designed to improve healthcare efficiency and patient safety.
            </div>
        </div>

        <div class="box">
            <div class="client">
                <div class="text-two">
                The target respondents for this study are the registered nurses and IT staff of the Jose R. Reyes Memorial Medical Center (JRRMC), whose insights and feedback are vital for evaluating and improving the system.
                </div>
            </div>

            <div class="obj">
                <h3 class="research">-- Research Objectives --</h3>
                    <div class="list">
                       <ul>
                            <li>Develop a prototype with key features for IV monitoring and patient management, ensuring data privacy.</li>
                            <li>Evaluate the system using surveys, descriptive analysis, and ISO-25010 standards.</li>
                            <li>Create a user-friendly interface for nurses and doctors, incorporating feedback.</li>
                            <li>Enable real-time IV monitoring to reduce nursing workload and improve efficiency.</li>
                            <li>Complete development, testing, and evaluation within the project timeline.</li>
                       </ul>
                       
                    </div>
            </div>
        </div>

        <div class="ack">
            <div class="acknowledgment">
                <h2 class="ack-title">Acknowledgement</h2>
            </div>
            
            <div class="ack-message">
                <p class="ack-para">
                This research was made possible by the guidance of Dean Reagan B. Ricafort, ENGR., the support of Jose R. Reyes Memorial Medical Center, and the mentorship of Pateros Technological College faculty and staff.
                </p>
            </div>
        </div>

    </div>

    <script>
    const userEditLink = document.getElementById('user-edit-link');
    const editFormContainer = document.getElementById('edit-form-container');
    const cancelEditButton = document.getElementById('cancel-edit');
    const currentUserSpan = document.getElementById('current-user');
    const usernameInput = document.getElementById('username');

    // When the user clicks the image, show the edit form
    userEditLink.addEventListener('click', function (e) {
        e.preventDefault();  // Prevent the default link behavior
        const currentUsername = currentUserSpan.innerText;  // Get the current username
        usernameInput.value = currentUsername;  // Set the current username in the input field
        editFormContainer.style.display = 'block';  // Show the form
    });

    // When the user clicks cancel, hide the edit form
    cancelEditButton.addEventListener('click', function () {
        editFormContainer.style.display = 'none';  // Hide the form
    });

    // Handle user selection from the dropdown
    function handleUserSelection() {
        const selectedUserId = document.getElementById('user_id').value;

        // Only show the form if a user is selected
        if (selectedUserId) {
            editFormContainer.style.display = 'block';  // Keep the form visible
        } else {
            editFormContainer.style.display = 'none';  // Hide the form if no user is selected
        }
    }

    // Optional: Handle the form submission (if needed)
    document.getElementById('edit-form').addEventListener('submit', function (e) {
        e.preventDefault();  // Prevent form submission
        const newUsername = usernameInput.value;  // Get the new username
        currentUserSpan.innerText = newUsername;  // Update the current username
        editFormContainer.style.display = 'none';  // Hide the form after saving
    });
</script>
</body>
</html>