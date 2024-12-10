<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
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
</body>
</html>