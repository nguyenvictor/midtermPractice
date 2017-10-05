
<?php
require_once('database.php');

 $state='CA';
 $query = "SELECT firstName, lastName, city FROM customers WHERE state = ? ORDER BY lastName";

 $stmt = $db->prepare($query);
 $stmt->bind_param('s', $state);
 $stmt->execute();
$stmt->store_result();
 $stmt->bind_result($firstName, $lastName, $city);

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Midterm</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Customer list</h1>
    </div>

    <div id="main">

        <h1>Customer List</h1>

       

        <div id="content">
            <!-- display a table of products -->
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>

                </tr>
                <?php while($stmt->fetch()): ?>

                <tr>
                    <td><?php  echo $firstName; ?></td>
                    <td><?php  echo $lastName; ?></td>
                    <td><?php echo $city; ?></td>

                    
                    
                </tr>
                
                <?php endwhile; ?>
            </table>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> midterm, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>

<?php
  $stmt->free_result();
  $db->close();
 ?>