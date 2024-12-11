
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

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-center">Countries and Cities in Africa</h1>
    <a href="add.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Country</a>
    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Country</th>
                    <th class="py-3 px-6 text-left">City</th>
                    <th class="py-3 px-6 text-left">Type</th>
                    <th class="py-3 px-6 text-right">Population</th>
                    <th class="py-3 px-6 text-left">Languages</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                <?php
                $query = "SELECT c.ID as CountryID, c.Name as Country, ci.Name as City, ci.ID as CityID, ci.Type, c.Population, c.Languages 
                          FROM Countries c
                          LEFT JOIN Cities ci ON c.ID = ci.Country_ID
                          ORDER BY c.ID";
                $stmt = $pdo->query($query);
                $currentCountryID = null;

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                    
                    if ($currentCountryID !== $row['CountryID']) {
                        $currentCountryID = $row['CountryID'];

                        // Display country details only once
                        echo "<td class='py-3 px-6 text-left font-semibold' rowspan='1'>{$row['Country']}</td>";
                        echo "<td class='py-3 px-6 text-left'>{$row['City']}</td>";
                        echo "<td class='py-3 px-6 text-left'>{$row['Type']}</td>";
                        echo "<td class='py-3 px-6 text-right'>" . number_format($row['Population']) . "</td>";
                        echo "<td class='py-3 px-6 text-left'>{$row['Languages']}</td>";
                        echo "<td class='py-3 px-6 text-center'>
                                <a href='editCountry.php?id={$row['CountryID']}' class='text-blue-500 hover:underline'>Edit Country</a>
                                <a href='editCity.php?id={$row['CityID']}' class='text-blue-500 hover:underline'>Edit City</a>
                                |
                                <a href='delete.php?id={$row['CountryID']}' class='text-red-500 hover:underline'>Delete</a>
                              </td>";
                    } else {
                        // Display only city details
                        echo "<td></td>";
                        echo "<td class='py-3 px-6 text-left'>{$row['City']}</td>";
                        echo "<td class='py-3 px-6 text-left'>{$row['Type']}</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td class='py-3 px-6 text-center'>
                                <a href='editCity.php?id={$row['CityID']}' class='text-blue-500 hover:underline'>Edit City</a>
                              </td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
