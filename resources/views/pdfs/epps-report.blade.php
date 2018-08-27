<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan EPPS</title>

  @include('layouts.partials.pdf-style')
</head>
<body>
  @foreach($mbtiEppsLss as $model)
    <section>
      @include('layouts.partials.pdf-header')

      <h2 class="page-heading">PROFIL KEPRIBADIAN</h2>

      <table class="table table-bordered table-grade">
        <thead>
          <tr>
            <th>ASPEK</th>
            <th>GAMBARAN SKOR RENDAH</th>
            <th>SK</th>
            <th>K</th>
            <th>S</th>
            <th>B</th>
            <th>SB</th>
            <th>GAMBARAN SKOR TINGGI</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>KEPERCAYAAN DIRI</td>
            <td>Kurang mampu menunjukkan performa yang mengekspresikan kelebihan yang dimilikinya</td>
            @grade(['grade' => $model->epps->grades()['ach']])
            @endgrade
            <td>Sangat mampu menunjukkan performa yang mengekspresikan kelebihan yang dimilikinya</td>
          </tr>

          <tr>
            <td>PENYESUAIAN DIRI</td>
            <td>Kurang mampu melakukan adaptasi dan menyatu dengan lingkungan yang baru & berbeda</td>
            @grade(['grade' => $model->epps->grades()['ach']])
            @endgrade
            <td>Sangat mampu melakukan adaptasi dan menyatu dengan lingkungan yang baru & berbeda</td>
          </tr>

          <tr>
            <td>KESTABILAN EMOSI</td>
            <td>Kurang mampu mengelola emosinya jika dihadapkan pada stimulus dari lingkungan yang tidak sesuai dengan
            kondisi mereka/ bersifat menekan</td>
            @grade(['grade' => $model->epps->grades()['ach']])
            @endgrade
            <td>Sangat mampu mengelola emosinya jika dihadapkan pada stimulus dari lingkungan yang tidak sesuai dengan
            kondisi mereka/ bersifat menekan</td>
          </tr>

          <tr>
            <td>TANGGUNG JAWAB/ KOMITMEN TERHADAP TUGAS</td>
            <td>Kurang menunjukkan komitmen yang kuat dan berbuat yang terbaik sampai selesai saat dihadapkan pada suatu
            tugas</td>
            @grade(['grade' => $model->epps->grades()['ach']])
            @endgrade
            <td>Menunjukkan komitmen yang sangat kuat dan berbuat yang terbaik sampai selesai saat dihadapkan pada suatu
            tugas</td>
          </tr>
        </tbody>

        <tfoot>
          <tr style="text-align: center">
            <td colspan="8">Keterangan :  SK = Sangat Kurang, K = Kurang, S = Sedang, B = Baik, SB = Sangat Baik</td>
          </tr>
        </tfoot>
      </table>

      @if (! $loop->last)
        <div class="page-break"></div>
      @endif
    </section>
  @endforeach
</body>
</html>