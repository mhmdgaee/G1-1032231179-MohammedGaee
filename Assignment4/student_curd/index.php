<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Student Management</h1>

    <!-- Form -->
    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="text" name="mobile" placeholder="Enter Mobile" required>
        <input type="text" name="department" placeholder="Enter Department" required>
        <button type="submit" name="submit">Add Student</button>
    </form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    $sql = "INSERT INTO student (name, email, mobile, department)
            VALUES ('$name', '$email', '$mobile', '$department')";

    mysqli_query($conn, $sql);
}
?>

    <!-- Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM student");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['mobile']}</td>
        <td>{$row['department']}</td>
        <td>
            <a href='edit.php?id={$row['id']}' class='edit'>Edit</a>
            <a href='delete.php?id={$row['id']}' class='delete'>Delete</a>
        </td>
    </tr>";
}
?>

    </table>
</div>

</body>
</html>