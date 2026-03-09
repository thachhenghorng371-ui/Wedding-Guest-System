<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wedding</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body class="m-5">
<h2>Wedding Guest Registration System</h2>
<a class="btn btn-primary" href="add.php">Add New Guest</a>
<hr>
<table id="mytable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Currency Riel</th>
            <th>Currency Dollar</th>
            <th>Address</th>
            <th>Create_At</th>
            <th>Update_At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include 'connect-database.php';
            $sql = "SELECT * FROM guests WHERE is_active = 1";
            $records = $conn->query($sql);

            while($row = $records->fetch_assoc()){
                echo "
                <tr>
                    <td>{$row['guest_id']}</td>
                    <td>{$row['guest_name']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['currency_riel']}</td>
                    <td>{$row['currency_dollar']}</td>
                    <td>{$row['guest_address']}</td>
                    <td>{$row['create_at']}</td>
                    <td>{$row['update_at']}</td>
                    <td>
                        <a href='edit.php?id={$row['guest_id']}'>Edit</a> |
                        <a href='delete.php?id={$row['guest_id']}'>Delete</a>
                    </td>
                </tr>
                ";
            }
        ?>
    </tbody>
</table>

<script>
    new DataTable('#mytable');
</script>

</body>
</html>