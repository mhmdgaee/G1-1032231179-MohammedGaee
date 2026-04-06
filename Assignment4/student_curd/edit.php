<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM student WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    $sql = "UPDATE student SET 
            name='$name', email='$email', 
            mobile='$mobile', department='$department'
            WHERE id=$id";

    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Edit Student</h1>

    <form method="POST">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" required>
        <input type="text" name="department" value="<?php echo $row['department']; ?>" required>
        <button type="submit" name="update">Update</button>
    </form>

</div>

</body>
</html>