<?php include 'DbCon.php'; ?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM Countries WHERE ID = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$country = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $population = $_POST['population'];
    $languages = $_POST['languages'];

    $query = "UPDATE Countries SET Name = ?, Population = ?, Languages = ? WHERE ID = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $population, $languages, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Country</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Country</h1>
        <form action="" method="POST" class="bg-white p-6 shadow-md rounded">
            <div class="mb-4">
                <label class="block text-gray-700">Country Name</label>
                <input type="text" name="name" value="<?= htmlspecialchars($country['Name']) ?>" 
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Population</label>
                <input type="number" name="population" value="<?= htmlspecialchars($country['Population']) ?>" 
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Languages</label>
                <input type="text" name="languages" value="<?= htmlspecialchars($country['Languages']) ?>" 
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Country</button>
        </form>
    </div>
</body>
</html>
	