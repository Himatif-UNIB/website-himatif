<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        input[type=text]{
            border-bottom: 1px solid #92A4B2;
            padding: 2px 0 2px 0;
        }
    </style>

    <title>Form</title>
</head>
<body class="bg-dark-blue">

    <div class="my-36 max-w-3xl mx-auto space-y-4">
        <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md border-t-8 border-orange-500">
            <h2 class="text-3xl font-semibold text-dark-blue-800">Forumlir Tanpa Judul</h2>
            <p class="my-3 text-dark-blue-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, optio illum, a cum debitis harum, autem dolore quaerat quia quasi quod? Quasi dolor ipsa, tempore sapiente nemo eaque suscipit repellat.</p>
        </div>

        <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md">
            <h3 class="text-lg font-semibold text-dark-blue-800">Pertanyaan Tanpa Judul</h3>
            <input class="my-3 w-full bg-gray-100 focus:outline-none" type="text" placeholder="Jawaban anda">
        </div>

        <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md">
            <h3 class="text-lg font-semibold text-dark-blue-800">Pertanyaan Tanpa Judul</h3>
            <label class="inline-flex items-center mt-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-500" checked><span class="ml-2 text-gray-700">label</span>
            </label>
        </div>
    </div>

</body>
</html>