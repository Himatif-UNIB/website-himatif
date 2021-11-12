<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        @font-face {
            font-family: 'Mochiy Pop One';
            src: url({{ storage_path('fonts/MochiyPopOne-Regular.ttf') }}) format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        body {
            background: rgb(204,204,204);
            margin: 0;
    		height: 8.27in;
    		width: 11.69in;
    		background-image: url({{ asset('storage/' . $certificate_background_image) }});
    		background-size: 11.69in 8.27in; /* Not sure whether it works with DOMPDF. So, using a background of actual size. */
    		background-repeat: no-repeat;
            font-family: 'Mochiy Pop One'
        }

        .text-gray-800{
            color: #1F2937;
        }

        .text-3xl{
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .text-center{
            text-align: center;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
</head>
<body>

    <div class="text-center" style="margin-top: 140px;">
        {{ $certificate_number }}
    </div>

    <div class="text-center">
        <p class="text-3xl text-gray-800" style="margin-top: 100px;">{{ $name }}</p>
    </div>

</body>
</html>