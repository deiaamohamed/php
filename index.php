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

        <form action="register.php" method="POST" enctype="multipart/form-data">

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
                    <option value="EGYPT">EGYPT</option>
                    <option value="USA">USA</option>
                    <option value="KSA">KSA</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" id="male" name="gender" value="Male" class="form-check-input">
                    <label for="male" class="form-check-label">Male</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" id="female" name="gender" value="Female" class="form-check-input">
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
                <label for="profile_image" class="form-label">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" class="form-control" accept="image/*" required>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Department:</label>
                <input type="text" id="department" name="department" value="OS" class="form-control" readonly>
            </div>

            <div>
                <?php
                    $list = ["OS", "CS", "IS"];
                    
                    function randomize($list){
                        $randomIndex = array_rand($list);
                        $randomValue = $list[$randomIndex];
                        echo "<p>Random Department: $randomValue</p>";
                        return $randomValue;
                    }
                    $val = randomize($list);
                ?>
                <label>Captcha</label>
                <input type="text" name="cap" pattern="<?php echo $val; ?>" required>
                <br><br>
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

<script>
    const form = document.querySelector('form');
    const firstNameInput = document.getElementById('first_name');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const profileImageInput = document.getElementById('profile_image');
    const skillInputs = document.querySelectorAll('input[name="skills[]"]');
    const genderInputs = document.querySelectorAll('input[name="gender"]');

    form.addEventListener('submit', function(event) {
        let isValid = true;

        firstNameInput.setCustomValidity('');
        usernameInput.setCustomValidity('');
        passwordInput.setCustomValidity('');
        profileImageInput.setCustomValidity('');
        skillInputs.forEach(skill => skill.setCustomValidity(''));
        genderInputs.forEach(gender => gender.setCustomValidity(''));

        const firstName = firstNameInput.value.trim();
        const username = usernameInput.value.trim();
        const password = passwordInput.value;

        if (firstName.length < 3) {
            firstNameInput.setCustomValidity('First Name must be at least 3 characters long.');
            isValid = false;
        } else if (/\d/.test(firstName)) {
            firstNameInput.setCustomValidity('First Name must contain only letters.');
            isValid = false;
        }

        if (username.length < 3) {
            usernameInput.setCustomValidity('Username must be at least 3 characters long.');
            isValid = false;
        }

        if (password.length < 4) {
            passwordInput.setCustomValidity('Password must be at least 4 characters long.');
            isValid = false;
        } else if (!/\d/.test(password)) {
            passwordInput.setCustomValidity('Password must contain at least one number.');
            isValid = false;
        } else if (/[A-Z]/.test(password)) {
            passwordInput.setCustomValidity('Password must not contain uppercase letters.');
            isValid = false;
        } else if (/[-@#$%^&*]/.test(password)) {
            passwordInput.setCustomValidity('Password must not contain special characters.');
            isValid = false;
        }

        const checkedGender = document.querySelectorAll('input[name="gender"]:checked');
        if (checkedGender.length === 0) {
            genderInputs[0].setCustomValidity('Please select a gender.');
            genderInputs[0].reportValidity();
            isValid = false;
        }

        const checkedSkills = document.querySelectorAll('input[name="skills[]"]:checked');
        if (checkedSkills.length === 0) {
            skillInputs[0].setCustomValidity('Please select at least one skill.');
            skillInputs[0].reportValidity();
            isValid = false;
        }

        if (profileImageInput.files.length === 0) {
            profileImageInput.setCustomValidity('Please choose an image.');
            profileImageInput.reportValidity();
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    skillInputs.forEach(skill => {
        skill.addEventListener('change', function() {
            skillInputs.forEach(s => s.setCustomValidity(''));
        });
    });

    genderInputs.forEach(g => {
        g.addEventListener('change', function() {
            genderInputs.forEach(x => x.setCustomValidity(''));
        });
    });

    profileImageInput.addEventListener('change', () => profileImageInput.setCustomValidity(''));
    firstNameInput.addEventListener('input', () => firstNameInput.setCustomValidity(''));
    usernameInput.addEventListener('input', () => usernameInput.setCustomValidity(''));
    passwordInput.addEventListener('input', () => passwordInput.setCustomValidity(''));
</script>
</body>
</html>