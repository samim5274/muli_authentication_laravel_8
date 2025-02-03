<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependent Dropdown</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Select Category</h2>

        <form>
            @csrf
            <div class="mb-4">
                <label class="block text-gray-600 font-medium">Category:</label>
                <select id="category" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="">Select Category</option>
                    @foreach ($categories as $row)
                        <option value="{{ $row->id }}">{{ $row->CatName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 font-medium">Subcategory:</label>
                <select id="subcategory" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="">Select Subcategory</option>
                </select>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#category').change(function () {
                var categoryId = $(this).val();
                if (categoryId) 
                {
                    $.ajax({
                        url: "{{ route('get.subcategories') }}",
                        type: "POST",
                        data: {
                            category_Id: categoryId,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            $('#subcategory').html('<option value="">Select Subcategory</option>');
                            $.each(data, function (key, value) {
                                $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } 
                else 
                {
                    $('#subcategory').html('<option value="">Select Subcategory</option>');
                }
            });
        });
    </script>

</body>
</html>
