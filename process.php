<?php
$servername = "localhost";
$username = "root";
$password = "hamza";
$dbname = "dev_project";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Error: Failed to connect to the database. " . mysqli_connect_error());
}

$brandIds = [];
$cpuIds = [];
$ramIds = [];
$memoryIds = [];
$displayIds = [];
$resolutionIds = [];

if (isset($_POST['brand'])) {

    $selectedBrands = $_POST['brand'];

    // Build the query for selected brand(s)
    $brandQuery = "SELECT id FROM laptops WHERE ";

    foreach ($selectedBrands as $brand) {
        $brandQuery .= "brand LIKE '%$brand%' OR ";
    }

    $brandQuery = rtrim($brandQuery, "OR ");

    // Execute the query to get matching laptop IDs
    $brandResult = mysqli_query($conn, $brandQuery);

    while ($row = mysqli_fetch_assoc($brandResult)) {
        $brandIds[] = $row['id'];
      
    }

}

if (isset($_POST['cpu'])) {
    $selectedCPUs = $_POST['cpu'];

    // Build the query for selected CPU option(s)
    $cpuQuery = "SELECT id FROM laptops WHERE ";

    foreach ($selectedCPUs as $cpu) {
        $cpuQuery .= "full_cpu_name LIKE '%$cpu%' OR ";
    }

    $cpuQuery = rtrim($cpuQuery, " OR ");

    // Execute the query to get matching laptop IDs
    $cpuResult = mysqli_query($conn, $cpuQuery);

    while ($row = mysqli_fetch_assoc($cpuResult)) {
        $cpuIds[] = $row['id'];
    }
}

if (isset($_POST['ram'])) {
    $selectedRAMs = $_POST['ram'];

    // Build the query for selected RAM option(s)
    $ramQuery = "SELECT id FROM laptops WHERE ";

    foreach ($selectedRAMs as $ram) {
        $ramQuery .= "available_ram_sizes LIKE '%$ram%' OR ";
    }

    $ramQuery = rtrim($ramQuery, " OR ");

    // Execute the query to get matching laptop IDs
    $ramResult = mysqli_query($conn, $ramQuery);

    while ($row = mysqli_fetch_assoc($ramResult)) {
        $ramIds[] = $row['id'];
    }
}

if (isset($_POST['memory'])) {
    $selectedMemories = $_POST['memory'];

    // Build the query for selected memory option(s)
    $memoryQuery = "SELECT id FROM laptops WHERE ";

    foreach ($selectedMemories as $memory) {
        $memoryQuery .= "available_storage_capacity LIKE '%$memory%' OR ";
    }

    $memoryQuery = rtrim($memoryQuery, " OR ");

    // Execute the query to get matching laptop IDs
    $memoryResult = mysqli_query($conn, $memoryQuery);

    while ($row = mysqli_fetch_assoc($memoryResult)) {
        $memoryIds[] = $row['id'];
    }
}

if (isset($_POST['display'])) {
    $selectedDisplays = $_POST['display'];

    // Build the query for selected display option(s)
    $displayQuery = "SELECT id FROM laptops WHERE ";

    foreach ($selectedDisplays as $display) {
        $displayQuery .= "display_size LIKE '%$display%' OR ";
    }

    $displayQuery = rtrim($displayQuery, " OR ");

    // Execute the query to get matching laptop IDs
    $displayResult = mysqli_query($conn, $displayQuery);

    while ($row = mysqli_fetch_assoc($displayResult)) {
        $displayIds[] = $row['id'];
    }
}

if (isset($_POST['resolution'])) {
    $selectedResolutions = $_POST['resolution'];

    // Build the query for selected resolution option(s)
    $resolutionQuery = "SELECT id FROM laptops WHERE ";

    foreach ($selectedResolutions as $resolution) {
        $resolutionQuery .= "display_resolution LIKE '%$resolution%' OR ";
    }

    $resolutionQuery = rtrim($resolutionQuery, " OR ");

    // Execute the query to get matching laptop IDs
    $resolutionResult = mysqli_query($conn, $resolutionQuery);

    while ($row = mysqli_fetch_assoc($resolutionResult)) {
        $resolutionIds[] = $row['id'];
    }
}

// Perform intersection based on selected IDs
$finalIds = [];

if (!empty($brandIds)) {
    $finalIds = $brandIds;
}

if (!empty($cpuIds)) {
    $finalIds = empty($finalIds) ? $cpuIds : array_intersect($finalIds, $cpuIds);
}

if (!empty($ramIds)) {
    $finalIds = empty($finalIds) ? $ramIds : array_intersect($finalIds, $ramIds);
}

if (!empty($memoryIds)) {
    $finalIds = empty($finalIds) ? $memoryIds : array_intersect($finalIds, $memoryIds);
}

if (!empty($displayIds)) {
    $finalIds = empty($finalIds) ? $displayIds : array_intersect($finalIds, $displayIds);
}

if (!empty($resolutionIds)) {
    $finalIds = empty($finalIds) ? $resolutionIds : array_intersect($finalIds, $resolutionIds);
}
$count = count($finalIds) ?? 0;
// Use the $finalIds array or convert it to a string as needed
$finalIdsString = implode(',', $finalIds);

echo "Final IDs: " . $finalIdsString;
header("Location: index.php?ids=$finalIdsString&count=$count#result");
exit();

?>