<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewer</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<nav class="bg-[#000000c6] p-4 navbar">
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
            editer
        </a>
      </li> 
      </ul>
   
    </ul>
</nav>

  <div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-center">Countries and Cities Information</h1>
    <div class="overflow-x-auto">
      <table class="table-auto w-full bg-white shadow-md rounded-lg">
        <thead>
          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Country</th>
            <th class="py-3 px-6 text-left">City</th>
            <th class="py-3 px-6 text-left">Type</th>
            <th class="py-3 px-6 text-right">Population</th>
            <th class="py-3 px-6 text-left">Languages</th>
          </tr>
        </thead>
        <tbody class="text-gray-700 text-sm">
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>