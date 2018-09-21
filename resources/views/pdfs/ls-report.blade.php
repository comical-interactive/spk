<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan LS</title>

    <style>
        @font-face {
            font-family: OpenSans-Regular;
            src: url('https://fonts.googleapis.com/css?family=Open+Sans');
        }

        html {
            font-family: 'Open Sans', sans-serif;
        }

        body {
            padding: 0 40px;
        }

        .page-break {
            page-break-after: always;
        }

        h2, h3 {
            text-align: center !important
        }

        h3 {
            margin-top: 3rem !important;
            background-color: lightgrey;
            padding: 20px;
        }

        div > h4 {
            color: maroon
        }

        img {
            width: 300px;
            margin-top: 10px;
            border: 1px solid maroon
        }
    </style>
</head>
<body>
    @foreach($school->mbtiEppsLss as $model)
        <section>
            <h2 class="text-center">GAYA BELAJAR</h2>

            @include("pdfs.partials.ls-{$model->ls}")
            
            <center>
                <img src="{{ asset('img/ls.jpg') }}">   
            </center>

            @if (! $loop->last)
                <div class="page-break"></div>
            @endif
        </section>
    @endforeach
</body>
</html>