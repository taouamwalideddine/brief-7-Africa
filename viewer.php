<?php include 'DbCon.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries and Cities</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="bg-black p-4 navbar">
    <ul class="flex justify-around items-center">
        <li>
            <a href="index.php" class="text-white text-sm md:text-lg font-semibold hover:text-[#757575] transition duration-300">Africa</a>
        </li>
        <ul class="flex gap-4">
            <li>
                <a href="viewer.php" class="bg-[#80808048] px-3 py-2 md:px-4 md:py-2 rounded-full hover:bg-[#292929] active:bg-red-700 text-white text-sm md:text-lg font-semibold transition duration-300">Viewer</a>
            </li>
            <li>
                <a href="add.php" class="bg-[#80808048] px-3 py-2 md:px-4 md:py-2 rounded-full hover:bg-[#292929] active:bg-red-700 text-white text-sm md:text-lg font-semibold transition duration-300">Add</a>
            </li>
        </ul>
    </ul>
</nav>

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 text-center">Countries and Cities in Africa</h1>
    <a href="add.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Country</a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $query = "SELECT c.ID as CountryID, c.Name as Country, ci.Name as City, ci.ID as CityID, ci.Type, c.Population, c.Languages 
                  FROM Countries c
                  LEFT JOIN Cities ci ON c.ID = ci.Country_ID
                  ORDER BY c.ID";
        $stmt = $pdo->query($query);
        $countries = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (!isset($countries[$row['CountryID']])) {
                $countries[$row['CountryID']] = [
                    'Country' => $row['Country'],
                    'Population' => $row['Population'],
                    'Languages' => $row['Languages'],
                    'Cities' => []
                ];
            }

            if ($row['City']) {
                $countries[$row['CountryID']]['Cities'][] = [
                    'City' => $row['City'],
                    'Type' => $row['Type'],
                    'CityID' => $row['CityID']
                ];
            }
        }

        foreach ($countries as $countryID => $country) {
            echo "<div class='bg-white shadow-md rounded-lg p-6'>";
            echo "<h2 class='text-lg font-semibold mb-2'>{$country['Country']}</h2>";
            echo "<p class='text-sm text-gray-600'><strong>Population:</strong> " . number_format($country['Population']) . "</p>";
            echo "<p class='text-sm text-gray-600'><strong>Languages:</strong> {$country['Languages']}</p>";

            echo "<h3 class='text-md font-semibold mt-4 mb-2'>Cities:</h3>";
            echo "<ul class='list-disc ml-4'>";

            foreach ($country['Cities'] as $city) {
                echo "<li class='text-sm text-gray-600'>
                        <strong>{$city['City']} ({$city['Type']})</strong>
                        <div class='mt-1'>
                            <a href='editCity.php?id={$city['CityID']}' class='text-blue-500 hover:underline'>Edit City</a>
                        </div>
                    </li>";
            }

            echo "</ul>";

            echo "<div class='mt-4'>
                    <a href='editCountry.php?id={$countryID}' class='text-blue-500 hover:underline mr-2'>Edit Country</a>
                    <a href='delete.php?id={$countryID}' class='text-red-500 hover:underline'>Delete</a>
                </div>";

            echo "</div>";
        }
        ?>
    </div>
</div>
<footer class="bg-black text-white py-8">
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
