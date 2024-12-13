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

<body class="bg-gray-100 bg-[url('./images/moucian.png')] bg-cover">
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
    <form action="" method="POST" class="bg-black p-6 shadow-md border-4 border-[#a0a0a0] rounded-xl">
        <div class="mb-4">
            <label class="block text-white">City Name</label>
            <input type="text" name="name" class="w-full border border-black p-2 rounded-xl" required>
        </div>
        <div class="mb-4">
            <label class="block text-white">City Type</label>
            <select name="type" class="w-full border border-black p-2 rounded-xl" required>
                <option value="capital">Capital</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-white">Country</label>
            <select name="country_id" class="w-full border border-black p-2 rounded-xl required>
                <?php
                $countries = $pdo->query("SELECT ID, Name FROM Countries")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($countries as $country) {
                    echo "<option value=\"{$country['ID']}\">{$country['Name']}</option>";
                }
                ?>
            </select>
        </div>
<button type="submit" class="bg-black border-2 rounded-lg hover:bg-white hover:text-black text-white px-4 py-2">Add City</button>
    </form>
</div>
<footer class="bg-black text-white mt-10 py-8">
      <div class="container mx-auto px-4">
         <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
               <div>
                  <h2 class="text-lg font-bold mb-4">About Us</h2>
                  <p class="text-gray-400 text-sm">
                     We are dedicated to sharing the beauty and diversity of Africa. Explore its rich culture, stunning landscapes, and vibrant history with us.
                  </p>
               </div>

               <div>
                  <h2 class="text-lg font-bold mb-4">Quick Links</h2>
                  <ul class="space-y-2 text-sm">
                     <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                     <li><a href="#" class="text-gray-400 hover:text-white transition">About</a></li>
                     <li><a href="#" class="text-gray-400 hover:text-white transition">Services</a></li>
                     <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                  </ul>
               </div>

               <div>
                  <h2 class="text-lg font-bold mb-4">Follow Us</h2>
                  <div class="flex space-x-4">
                     <a href="#" class="text-gray-400 hover:text-white text-xl transition">
                           <i class="bi bi-facebook"></i>
                     </a>
                     <a href="#" class="text-gray-400 hover:text-white text-xl transition">
                           <i class="bi bi-twitter"></i>
                     </a>
                     <a href="#" class="text-gray-400 hover:text-white text-xl transition">
                           <i class="bi bi-instagram"></i>
                     </a>
                     <a href="#" class="text-gray-400 hover:text-white text-xl transition">
                           <i class="bi bi-linkedin"></i>
                     </a>
                  </div>
               </div>
         </div>

         <div class="border-t border-gray-700 my-6"></div>

         <div class="flex flex-col md:flex-row items-center justify-between text-gray-500 text-sm">
               <p>&copy; 2024 Africa Explorer. All rights reserved.</p>
               <p>
                  <a href="#" class="hover:text-white">Privacy Policy</a> | 
                  <a href="#" class="hover:text-white">Terms of Service</a>
               </p>
         </div>
      </div>
</footer>
</body>
</html>
