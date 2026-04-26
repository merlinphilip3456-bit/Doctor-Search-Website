<?php
$conn = new mysqli("localhost", "root", "", "doctor_db");

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
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #dbeafe, #f0f9ff, #ecfeff);
}

header {
    background: rgba(255, 255, 255, 0.8);
    padding: 20px;
    text-align: center;
}

h1 {
    font-size: 28px;
    color: #1e3a8a;
}

main {
    padding: 40px;
}

.search-wrapper {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-bottom: 30px;
}

.search-input {
    padding: 12px;
    border-radius: 25px;
    border: 2px solid #bfdbfe;
    width: 300px;
}

.search-button {
    padding: 12px 20px;
    border-radius: 25px;
    background: #2563eb;
    color: white;
    border: none;
    cursor: pointer;
}

.doctors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.doctor-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.doctor-name {
    font-size: 18px;
    font-weight: bold;
}

.doctor-specialization {
    color: blue;
}

.doctor-location {
    color: gray;
}

.no-results {
    text-align: center;
    margin-top: 20px;
}
</style>

</head>

<body>

<header>
    <h1>Doctor Search</h1>
</header>

<main>

<form method="GET">
    <div class="search-wrapper">
        <input type="text" name="search" class="search-input" placeholder="Search doctors...">
        <button type="submit" class="search-button">Search</button>
    </div>
</form>

<div class="doctors-grid">

<?php
$search = "";

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = "SELECT * FROM doctors 
        WHERE name LIKE '%$search%' 
        OR specialization LIKE '%$search%' 
        OR location LIKE '%$search%'";

$result = $conn->query($sql);

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '
        <div class="doctor-card">
            <h2 class="doctor-name">'.$row['name'].'</h2>
            <p class="doctor-specialization">'.$row['specialization'].'</p>
            <p class="doctor-location">'.$row['location'].'</p>
        </div>
        ';
    }
} else {
    echo '<p class="no-results">No doctors found</p>';
}
?>

</div>

</main>

</body>
</html>
