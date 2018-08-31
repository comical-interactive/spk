<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan MBTI</title>

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

        h3 {
            margin-top: 2rem;
        }

        table > tbody > tr > td:nth-child(3) {
            padding-left: 20px
        }

        table > tbody > tr > td:nth-child(odd) {
            font-weight: bold
        }

        h3 {
            color: maroon
        }

        ul > li {
            line-height: 1.5
        }
    </style>
</head>
<body>
    @foreach($mbtiEppsLss as $model)
        <section>
            <div>
                <h4>Nama: {{ $model->test_taker_name }}</h4>
            </div>

            @if ($model->mbti->isValid())
                <div>
                    <h3>Tipe Kepribadian</h3>

                    <table>
                        <tr>
                            <td>Introvert</td>
                            <td>: {{ $model->mbti->introvert }}%</td>
                            <td>Extrovert</td>
                            <td>: {{ $model->mbti->extrovert }}%</td>
                        </tr>

                        <tr>
                            <td>Sensing</td>
                            <td>: {{ $model->mbti->sensing }}%</td>
                            <td>Intuition</td>
                            <td>: {{ $model->mbti->intuition }}%</td>
                        </tr>

                        <tr>
                            <td>Thinking</td>
                            <td>: {{ $model->mbti->thinking }}%</td>
                            <td>Feeling</td>
                            <td>: {{ $model->mbti->feeling }}%</td>
                        </tr>

                        <tr>
                            <td>Judging</td>
                            <td>: {{ $model->mbti->judging }}%</td>
                            <td>Perceiving</td>
                            <td>: {{ $model->mbti->perceiving }}%</td>
                        </tr>
                    </table>
                </div>

                @include("pdfs.partials.mbti-{$model->mbti->type}")


            @else
                <h1>Hasil Tidak Valid</h1>
            @endif

        </section>

        @if (! $loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>
</html>