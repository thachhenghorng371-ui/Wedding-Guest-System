<?php
    include "connect-database.php";
    date_default_timezone_set("Asia/Phnom_Penh");
    $name = "";$gender = "";$phone = "";$currencyRiel="";$currencyDollar="";
    $address = "";$errorMessage = "";$successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["ctr_name"];
        $gender = $_POST["ctr_gender"];
        $phone = $_POST["ctr_phone"];
        $currencyRiel = $_POST["ctr_curencyRiel"];
        $currencyDollar = $_POST["ctr_curencyDollar"];
        $address = $_POST["ctr_address"];
        $create_at = date('Y-m-d H:i:s');

        do{
            if(empty($name) || empty($gender) || empty($phone) || empty($address)){
                $errorMessage = "All the fileds are requied";
                break;
            }
            $sql = "INSERT INTO guests(guest_name,gender,phone,currency_riel,currency_dollar,guest_address,is_active,create_at,update_at)
                    VALUES('$name','$gender','$phone','$currencyRiel','$currencyDollar','$address',1,'$create_at','$create_at')";
            $record = $conn->query($sql);

            if(!$record){
                die("Invalid query".$conn->error);
                break;
            }
            $name = "";$gender = "";$currencyRiel="";$currencyDollar="";$phone = "";$address = "";
            $successMessage = "New Record Added";
            header("location: index.php");
            exit;
        }while(false);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Guest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <main class="container my-5" style="width: max-content;">
        <h2>Add New Guest to database</h2>
        <?php
            if(!empty($errorMessage)){
                echo"
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }
        ?>
        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ctr_name" value="<?php echo $name?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <select class="form-control" name="ctr_gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male" <?php echo ($gender == "Male") ? "selected":"" ?>>Male</option>
                        <option value="Female" <?php echo ($gender == "Female") ? "selected":"" ?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="Tel" class="form-control" name="ctr_phone" value="<?php echo $phone?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Currency Riel</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="ctr_curencyRiel" value="<?php echo $currencyRiel?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Currency Dollar</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="ctr_curencyDollar" value="<?php echo $currencyDollar?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ctr_address" value="<?php echo $address?>">
                </div>
            </div>
            <?php
                if(!empty($successMessage)){
                    echo"
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="button" class="btn btn-outline-primary">Cancel</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>