<?php
// Database configuration
$servername = "localhost";
$username = "sarthakm";
$password = "SarukoSamurai";
$database = "wpminiproj";


// Connect to the database
$conn = new mysqli($servername, $username, $password, $database,3307);


// Check connection
if ($conn->connect_error) {
die("Connection failed: " .$conn->connect_error);
}


// Insert operation
if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


// Insert data into the database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
echo "Registration successful!";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}


// Update operation
if (isset($_POST['update'])) {
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


// Update data in the database
$sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
echo "Update successful!";
} else {
echo "Error updating record: " . mysqli_error($conn);
}
}


// Delete operation
if (isset($_GET['delete'])) {
$id = $_GET['delete'];


// Delete data from the database
$sql = "DELETE FROM users WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
echo "Delete successful!";
} else {
echo "Error deleting record: " . mysqli_error($conn);
}
}


// Select operation
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);


echo "<h2>User List</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Action</th></tr>";


if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "<td><a href='process.php?delete=" . $row['id'] . "'>Delete</a></td>";
echo "<td><a href='index.php?id=" . $row['id'] . "'>Edit</a></td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='5'>No users found.</td></tr>";
}


echo "</table>";


mysqli_close($conn);
?>
