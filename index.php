<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Registration Form</h3>

        <form action="dbconfig.php" method="POST">

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" minlength="3" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address">
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select id="country" name="country" class="form-select">
                    <option value="EGY">EGYPT</option>
                    <option value="USA">USA</option>
                    <option value="KSA">KSA</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" id="male" name="gender" value="male" class="form-check-input">
                    <label for="male" class="form-check-label">Male</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" id="female" name="gender" value="female" class="form-check-input">
                    <label for="female" class="form-check-label">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Skills:</label>

                <div class="form-check">
                    <input type="checkbox" id="php" name="skills[]" value="PHP" class="form-check-input">
                    <label for="php" class="form-check-label">PHP</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" id="js" name="skills[]" value="JavaScript" class="form-check-input">
                    <label for="js" class="form-check-label">JavaScript</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" id="python" name="skills[]" value="Python" class="form-check-input">
                    <label for="python" class="form-check-label">Python</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" minlength="3" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" minlength="4" required>
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Department:</label>
                <input type="text" id="department" name="department" value="OS" class="form-control" readonly>
            </div>
            <div>
                <?php
                    $list=["OS", "CS", "IS"];
                    
                    function randomize($list){
                        $randomIndex = array_rand($list);
                        $randomValue = $list[$randomIndex];
                        echo "<p>Random Department: $randomValue</p>";
                        return $randomValue;
                    }
                    $val=randomize($list);
                    ?>
                    <lable>capacha</label>
                  <input type="text" name="cap" pattern="<?php echo $val; ?>">  <br><br>
                  
            </div>

            <div class="d-grid">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
             <div class="d-grid">
                <input type="reset" name="reset" value="Reset" class="btn btn-secondary mt-2">
            </div>

            
        </form>
    </div>
</div>

</body>
</html>