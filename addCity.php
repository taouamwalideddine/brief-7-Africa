<?php include 'DbCon.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $country_id = $_POST['country_id'];

    $query = "INSERT INTO Cities (Name, Type, Country_ID) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $type, $country_id]);

    header("Location: viewer.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<nav class="bg-black p-4 w-full navbar">
    <ul class="flex justify-around items-center">
        <li class="navbar-item">
            <a href="index.php" class="text-white text-sm md:text-lg font-semibold hover:text-[#757575] transition duration-300 navbar-link">Africa</a>
        </li>
        <ul class="flex gap-4">
            <li class="navbar-item">
                <a href="viewer.php" class="bg-[#80808048] px-3 py-2 md:px-4 md:py-2 rounded-full hover:bg-[#292929] active:bg-red-700 text-white text-sm md:text-lg font-semibold transition duration-300 btn-primary">
                    Viewer
                </a>
            </li>
            <li class="navbar-item">
                <a href="add.php" class="bg-[#80808048] px-3 py-2 md:px-4 md:py-2 rounded-full hover:bg-[#292929] active:bg-red-700 text-white text-sm md:text-lg font-semibold transition duration-300 btn-primary">
                    Add
                </a>
            </li> 
        </ul>
    </ul>
</nav>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-center">Add New City</h1>
    <form action="" method="POST" class="bg-white p-6 shadow-md rounded">
        <div class="mb-4">
            <label class="block text-gray-700">City Name</label>
            <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">City Type</label>
            <select name="type" class="w-full border border-gray-300 p-2 rounded" required>
                <option value="capital">Capital</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Country</label>
            <select name="country_id" class="w-full border border-gray-300 p-2 rounded" required>
                <?php
                $countries = $pdo->query("SELECT ID, Name FROM Countries")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($countries as $country) {
                    echo "<option value=\"{$country['ID']}\">{$country['Name']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add City</button>
    </form>
</div>
</body>
</html>
