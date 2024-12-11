
<?php include 'DbCon.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $population = $_POST['population'];
    $languages = $_POST['languages'];
    $continent = 'Africa';
    $query = "INSERT INTO Countries (Name, Population, Languages, Continent) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $population, $languages, $continent]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Country</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 ">
<nav class="bg-black p-4 w-full navbar">
    <ul class="flex justify-around items-center">
      <li class="navbar-item">
        <a href="index.php" class="text-white text-sm md:text-lg font-semibold hover:text-[#757575]  transition duration-300 navbar-link">Africa</a>
      </li>
      <ul class="flex gap-4">
      <li class="navbar-item">
        <a  href="viewer.php" class="bg-[#80808048] px-3 py-2 md:px-4 md:py-2 rounded-full hover:bg-[#292929] active:bg-red-700 text-white text-sm md:text-lg font-semibold transition duration-300 btn-primary">
            viewer
        </a>
      </li>
      <li class="navbar-item">
        <a href="add.php" class="bg-[#80808048] px-3 py-2 md:px-4 md:py-2 rounded-full hover:bg-[#292929] active:bg-red-700 text-white text-sm md:text-lg font-semibold transition duration-300 btn-primary">
            add
        </a>
      </li> 
      </ul>
   
    </ul>
  </nav>

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">Add New Country</h1>
        <form action="" method="POST" class="bg-white p-6 shadow-md rounded">
            <div class="mb-4">
                <label class="block text-gray-700">Country Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Population</label>
                <input type="number" name="population" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Languages</label>
                <input type="text" name="languages" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Country</button>
        </form>
    </div>
</body>
</html>
