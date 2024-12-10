<?php include 'DbCon.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<nav class="bg-black p-4 navbar">
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
        <a href="editor.php" class="bg-[#80808048] px-3 py-2 md:px-4 md:py-2 rounded-full hover:bg-[#292929] active:bg-red-700 text-white text-sm md:text-lg font-semibold transition duration-300 btn-primary">
            add
        </a>
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
                    $query = "SELECT c.ID as CountryID, c.Name as Country, ci.Name as City, ci.Type, c.Population, c.Languages 
                              FROM Countries c
                              LEFT JOIN Cities ci ON c.ID = ci.Country_ID";
                    $stmt = $pdo->query($query);
                    $currentCountry = null;

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $newCountry = $row['CountryID'] !== $currentCountry;
                        $currentCountry = $row['CountryID'];

                        echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                        if ($newCountry) {
                            echo "<td class='py-3 px-6 text-left' rowspan='2'>{$row['Country']}</td>";
                            echo "<td class='py-3 px-6 text-left'>{$row['City']}</td>";
                        }
                    
                            echo "<td class='py-3 px-6 text-left'>{$row['Type']}</td>";
                            echo "<td class='py-3 px-6 text-right'>" . number_format($row['Population']) . "</td>";
                            echo "<td class='py-3 px-6 text-left'>{$row['Languages']}</td>";
                            echo "<td class='py-3 px-6 text-center'>
                                <a href='edit.php?id={$row['CountryID']}' class='text-blue-500 hover:underline'>Edit</a>
                                |
                                <a href='delete.php?id={$row['CountryID']}' class='text-red-500 hover:underline'>Delete</a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>