<?php
include 'connect-database.php';
$createTableSQL = "CREATE TABLE IF NOT EXISTS guests(
    guest_id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(50) NOT NULL,
    gender VARCHAR(5) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    currency_riel DECIMAL(12,2) DEFAULT 0,
    currency_dollar DECIMAL(12,2) DEFAULT 0,
    guest_address VARCHAR(255) NOT NULL,
    is_active BOOLEAN DEFAULT 1,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if($conn->query($createTableSQL) === TRUE){
    echo "Table 'Student ' Create Successfuly";
}else{
    echo "Error Create Table" .$conn->error."!";
}
$conn->close();
?>