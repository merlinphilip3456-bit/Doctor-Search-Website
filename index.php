<?php
$conn = new mysqli("root", "epiz_xxxxx", "", "doctor_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Search</title>

<style>
/* KEEP YOUR SAME CSS */
</style>
</head>

<body>

<header>
    <div class="header-content">
        <h1>Doctor Search</h1>
    </div>
</header>

<main>

<!-- SEARCH -->
<div class="search-container">
    <form method="GET">
        <div class="search-wrapper">
            <div class="search-input-wrapper">
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search by name, specialization, or location..."
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                >
            </div>
            <button class="search-button">Search</button>
        </div>
    </form>
</div>

<!-- RESULTS -->
<div class="doctors-grid">

<?php
$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM doctors 
        WHERE name LIKE ? OR specialization LIKE ? OR location LIKE ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $searchParam = "%$search%";
    $stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="doctor-card">
                <div class="doctor-info">
                    <h2 class="doctor-name">'.htmlspecialchars($row['name']).'</h2>
                    <div class="doctor-details">
                        <p class="doctor-specialization">'.htmlspecialchars($row['specialization']).'</p>
                        <p class="doctor-location">'.htmlspecialchars($row['location']).'</p>
                    </div>
                    <button class="view-profile-btn">View Profile</button>
                </div>
            </div>
            ';
        }
    } else {
        echo '<p class="no-results show">No doctors found</p>';
    }

    $stmt->close();
} else {
    echo "Query preparation failed: " . $conn->error;
}

$conn->close();
?>

</div>

</main>

</body>
</html>
