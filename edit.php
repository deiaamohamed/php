<?php
require "dbconfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($connection, $sql);

if(mysqli_num_rows($result) == 0){
    echo "User not found";
    exit();
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">
<div class="card-header bg-warning">
<h4 class="mb-0">Edit User</h4>
</div>

<div class="card-body">

<form action="update.php" method="POST" enctype="multipart/form-data" >

<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
<div class="mb-3">
<label class="form-label">Profile Image</label><br>
<?php if(!empty($user['profile_image'])): ?>
    <img src="data:image/jpeg;base64,<?php echo base64_encode($user['profile_image']); ?>" width="80" height="80" style="object-fit:cover;" class="rounded mb-2">
<?php else: ?>
    No Image
<?php endif; ?>
<input type="file" name="profile_image" class="form-control" accept="image/*">
</div>
<div class="mb-3">
<label class="form-label">First Name</label>
<input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Last Name</label>
<input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Address</label>
<input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Country</label>
<input type="text" class="form-control" name="country" value="<?php echo $user['country']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Gender</label>
<input type="text" class="form-control" name="gender" value="<?php echo $user['gender']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Skills</label>
<input type="text" class="form-control" name="skills" value="<?php echo $user['skills']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="text" class="form-control" name="password" value="<?php echo $user['password_hash']; ?>">
</div>

<button type="submit" class="btn btn-success">Update</button>

</form>

</div>
</div>

</div>

</body>
</html>