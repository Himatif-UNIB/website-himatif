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
            <div class="mt-4">
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="accountType" value="personal">
                        <span class="ml-2">Personal</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" name="accountType" value="busines">
                        <span class="ml-2">Business</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md">
            <h3 class="text-lg font-semibold text-dark-blue-800">Pertanyaan Tanpa Judul</h3>
            <div class="mt-4 space-x-3">
                <label for="">
                    <input type="checkbox">
                    <span>Testing</span>
                </label>
                <label for="">
                    <input type="checkbox">
                    <span>Testing</span>
                </label>
            </div>
        </div>

        <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md">
            <h3 class="text-lg font-semibold text-dark-blue-800">Pertanyaan Tanpa Judul</h3>
            <div class="mt-4">
                <textarea class="w-full h-auto bg-gray-100 focus:outline-none border border-dark-blue-400 rounded-md p-3" id="textarea"></textarea>
            </div>
        </div>

        <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md">
            <h3 class="text-lg font-semibold text-dark-blue-800">Pertanyaan Tanpa Judul</h3>
            <div class="mt-4">
                <select name="" id="" class="w-1/4 px-3 py-2 bg-gray-100 border border-dark-blue-400 rounded-md">
                    <option value="1">testing</option>
                    <option value="2">qwe</option>
                </select>
            </div>
        </div>

        <div class="w-full h-auto px-6 py-5 bg-gray-100 rounded-md">
            <h3 class="text-lg font-semibold text-dark-blue-800">Pertanyaan Tanpa Judul</h3>
            <div class="mt-4">
                <input type="file">
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('form.submit') }}" class="font-semibold text-lg bg-orange-500 rounded-md px-6 py-1 text-white hover:bg-orange-600 focus:outline-none">Kirim</a>
        </div>

    </div>

</body>
</html>