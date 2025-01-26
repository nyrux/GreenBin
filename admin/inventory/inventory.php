<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenBin</title>

    <link rel="stylesheet" href="inventory.css">
    <link rel="stylesheet" href="../utilities/nav.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
   <!-- Nav Bar Top -->
    <nav class="nav-top">
        <div class="logo-cont">
            <div class="logo"></div>
        </div>
        <div class="bars-cont">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>
<!-- Nav Bar Slider -->
 <div class="nav-slider">
    <i class="fa-solid fa-x"></i>
    <div class="nav-links">
        <a href="../home/home.html" class="link"><div>Home</div></a>
        <a href="../waste_reqs/waste.php" class="link"><div>Waste Requests</div></a>
        <a href="../bin_reqs/bin.php" class="link"><div>Bin Requests</div></a>
        <a href="../inventory/inventory.php" class="link"><div>Trade Waste</div></a>
    </div>
 </div>

 <!-- Inventory Section -->

 <div class="inventory-title">Inventory</div>

 <div class="filter-cont">
    <form method="GET" action="inventory.php">
        <label for="waste-type">Filter Waste :&nbsp;</label>
        <select id="waste-type" name="waste_type">
            <option value="">Select Waste Type</option>
            <option value="bioDegradable" <?php echo isset($_GET['waste_type']) && $_GET['waste_type'] == 'bioDegradable' ? 'selected' : ''; ?>>Bio Degradable Waste</option>
            <option value="nonBioDegradable" <?php echo isset($_GET['waste_type']) && $_GET['waste_type'] == 'nonBioDegradable' ? 'selected' : ''; ?>>Non Bio Degradable Waste</option>
            <option value="industrialWaste" <?php echo isset($_GET['waste_type']) && $_GET['waste_type'] == 'industrialWaste' ? 'selected' : ''; ?>>Industrial Waste</option>
            <option value="chemicalWaste" <?php echo isset($_GET['waste_type']) && $_GET['waste_type'] == 'chemicalWaste' ? 'selected' : ''; ?>>Chemical Waste</option>
        </select>
        <button class="filter-btn" type="submit">Filter</button>
    </form>
 </div>
    
 <table>
    <tr>
        <th>Waste Type</th>
        <th>Quantity (kg)</th>
    </tr>
    <?php 
        $conn = mysqli_connect("localhost", "root", "", "wastemgmt"); 
        if ($conn-> connect_error) {
            die("Connection failed: ".$conn-> connect_error);
        }

        $waste_type = isset($_GET['waste_type']) ? $_GET['waste_type'] : '';

        if ($waste_type) {
            $sql = "SELECT waste_type, qty FROM waste_req WHERE waste_type = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $waste_type);
        } else {
            $sql = "SELECT waste_type, qty FROM waste_req";
            $stmt = $conn->prepare($sql);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["waste_type"]."</td><td>".$row["qty"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No results found</td></tr>";
        }

        $conn->close();
    ?>
 </table>

 <script src="../utilities/nav.js"></script>
</body>
</html>
