<?php
$servername="localhost";
$username="root";
$password="";
$dbname="demo";
$link=mysqli_connect($servername,$username,$password,$dbname);
$conn=mysqli_connect($link,$dbname);

if($conn)
{
    echo("Connection OK");
}
else{
    die("Connection failed because ".mysqli_connect_error());
}
?>

<html>
    <head>
        <title>Database Operation</title>
</head>
<body>
    <form name="form1" action="" method="post">
        <table>
            <tr>
                <td>Enter name</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Enter City</td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
            <td colspan = "2" align="center">
                <input type="submit" name="submit1" value="insert">
                <input type="submit" name="submit2" value="delete">
                <input type="submit" name="submit3" value="update">
                <input type="submit" name="submit4" value="display">
                <input type="submit" name="submit5" value="search">
            </td>
            </tr>
        </table>
</form>
</body>
</html>

<?php

if(isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into aat values('$_POST[username]','$_POST[city]','$_POST[email]')");
    echo "Record inserted successfully";
}
if(isset($_POST["submit2"]))
{
    mysqli_query($link,"delete into aat values where username='$_POST[username]'");
    echo "Record deleted successfully";
}
if(isset($_POST["submit3"]))
{
    mysqli_query($link,"update aat set username='$_POST[city]' where username='$_POST[username]'");
    echo "Record updated successfully";
}

if(isset($_POST["submit4"]))
{
    $res=mysqli_query($link,"select * from aat");
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo"name"; echo"</th>";
    echo "<th>"; echo"city"; echo"</th>";
    echo "<th>"; echo"email"; echo"</th>";
    echo "</tr>"
while($row=mysqli_fetch_array($res))
{
    echo "<tr>";
    echo "<td>"; echo $row["username"]; echo"</td>";
    echo "<td>"; echo $row["city"]; echo"</td>";
    echo "<td>"; echo $row["email"]; echo"</td>";
    echo "</tr>"
}
echo "</table>";
}
if(isset($_POST["submit5"]))
{
    $res=mysqli_query($link,"select * from aat where username='$_POST[username]'")
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>"; echo"name"; echo"</th>";
    echo "<th>"; echo"city"; echo"</th>";
    echo "<th>"; echo"email"; echo"</th>";
    echo "</tr>"
while($row=mysqli_fetch_array($res))
{
    echo "<tr>";
    echo "<td>"; echo $row["username"]; echo"</td>";
    echo "<td>"; echo $row["city"]; echo"</td>";
    echo "<td>"; echo $row["email"]; echo"</td>";
    echo "</tr>"
}
echo "</table>"
}
?>