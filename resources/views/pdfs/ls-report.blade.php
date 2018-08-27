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
            font-size: 11px;
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
            margin-top: 3rem !important
        }

        div > h4 {
            color: maroon
        }
    </style>
</head>
<body>
    @foreach($mbtiEppsLss as $model)
        <section>
            <h2 class="text-center">GAYA BELAJAR</h2>

            @include("pdfs.partials.ls-{$model->ls}")

            @if (! $loop->last)
                <div class="page-break"></div>
            @endif
        </section>
    @endforeach
</body>
</html>