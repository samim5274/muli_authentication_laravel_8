<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependent Dropdown</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .loader {
            width: 50px;
            aspect-ratio: 1;
            display: grid;
            border: 4px solid #0000;
            border-radius: 50%;
            border-right-color: #25b09b;
            animation: l15 1s infinite linear;
        }
        .loader::before,
        .loader::after {
            content: "";
            grid-area: 1/1;
            margin: 2px;
            border: inherit;
            border-radius: 50%;
            animation: l15 2s infinite;
        }
        .loader::after {
            margin: 8px;
            animation-duration: 3s;
        }
        @keyframes l15{
            100%{transform: rotate(1turn)}
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Select Category</h2>
        <form action="" method="GET">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-600 font-medium">Category:</label>
                <select id="category" name="category" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="">--Select Category--</option>
                    @foreach ($categories as $row)
                        <option value="{{ $row->id }}">{{ $row->CatName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 font-medium">Subcategory:</label>
                <div class="loader" id="loader"></div>
                <select id="subcategory" name="subcategory" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value=''>--Select Sub Category--</option>
                </select>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var loader = $('#loader');
            var categoryId = $('#subcategory');
            loader.hide();
            $('#category').change(function(){
                var categoryId = $(this).val();
                if(categoryId == "")
                {
                    $("#subcategory").html("<option value='' disabled selected>--Select Category--</option>");
                }
                else
                {
                    loader.show();
                    $.ajax({
                        url:"/getSubCategory/"+categoryId,
                        type:"GET",
                        success:function(data){
                            var subCategory = data.subCategory;
                            var html = "<option value=''>--Select Sub Category--</option>";
                            for(let i =0;i<subCategory.length;i++){
                                html += `
                                <option value="`+subCategory[i]['id']+`">`+subCategory[i]['name']+`</option>
                                `;
                            }
                            $("#subcategory").html(html);
                            loader.hide();
                        }
                    });
                }

            });
        });
    </script>

</body>
</html>
