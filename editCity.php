<?php include 'DbCon.php'; ?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM Cities WHERE ID = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$city = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];

    $query = "UPDATE Cities SET Name = ?, Type = ? WHERE ID = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $type, $id]);

    header("Location: viewer.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit city</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit city</h1>
        <form action="" method="POST" class="bg-white p-6 shadow-md rounded">
            <div class="mb-4">
                <label class="block text-gray-700">city Name</label>
                <input type="text" name="name" value="<?= htmlspecialchars($city['Name']) ?>" 
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">type</label>
                <input type="text" name="type" value="<?= htmlspecialchars($city['Type']) ?>" 
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update city</button>
        </form>
    </div>
</body>
</html>
