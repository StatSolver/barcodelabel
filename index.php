<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Barcode Generator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ✅ Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-md rounded-md p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">📦 Barcode Generator</h2>

    <form method="post" action="barcode.php" target="_blank" class="space-y-4">

      <div>
        <label class="block text-sm font-medium text-gray-700">ASIN</label>
        <input type="text" name="asin" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">SKU</label>
        <input type="text" name="sku" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Item Name</label>
        <input type="text" name="itemname" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Label Size</label>
        <select name="label_size" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
          <option value="50x25mm">50mm x 25mm</option>
          <option value="76x127mm">3" x 5"</option>
          <option value="101x152mm">4" x 6"</option>
        </select>
      </div>

      <div class="pt-4">
        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
          Print Label
        </button>
      </div>

    </form>
  </div>

</body>
</html>
