<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HASIL PEMERIKSAAN PSIKOLOGIS PEMETAAN POTENSI DIRI</title>

  @include('layouts.partials.pdf-style')
</head>
<body>
  @foreach($ists as $ist)
    <section>
      @include('layouts.partials.pdf-header', ['model' => $ist])

      <h2 class="table-heading">PROFIL KEMAMPUAN  UMUM DAN KHUSUS</h2>

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
            <td style="background: beige">KECERDASAN UMUM</td>
            <td>Kurang mampu menyerap, memproses dan menggunakan kapasitas/potensinya dalam kehidupan sehari-hari.</td>
            @grade(['grade' => $ist->iq->grade()])
            @endgrade
            <td>Sangat mampu menyerap, memproses dan menggunakan kapasitas/potensinya dalam kehidupan sehari-hari</td>
          </tr>

          <tr>
            <td>KEMAMPUAN VERBAL</td>
            <td>Kurang memiliki kemampuan dalam menganalisis informasi yang bersifat verbal</td>
            @grade(['grade' => $ist->verbalAbility()->grade()])
            @endgrade
            <td>Sangat mampu menganalisis informasi yang bersifat verbal</td>
          </tr>

          <tr>
            <td>DAYA TANGKAP</td>
            <td>Kurang cepat atau tepat dalam memahami dan mengolah informasi atau data</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Sangat  cepat atau tepat dalam memahami dan mengolah informasi atau data</td>
          </tr>

          <tr>
            <td>KEMAMPUAN BERHITUNG</td>
            <td>Kurang memiliki kemampuan dalam melakukan analisis dengan angka</td>
            @grade(['grade' => $ist->arithmeticAbility()->grade()])
            @endgrade
            <td>Sangat mampu melakukan analisis dengan angka</td>
          </tr>

          <tr>
            <td>KEMAMPUAN ANALISIS-SINTESIS</td>
            <td>Kurang mampu untuk menilai, memilah, membuat perbedaan & hubungan suatu data/informasi dan kemudian
            membuat kesimpulan</td>
            @grade(['grade' => $ist->analyticSyntheticAbility()->grade()])
            @endgrade
            <td>Sangat mampu untuk menilai, memilah, membuat perbedaan & hubungan suatu data/informasi dan kemudian
            membuat kesimpulan</td>
          </tr>

          <tr>
            <td>KEMAMPUAN SPASIAL (PANDANG RUANG)</td>
            <td>Kurang mampu berpikir secara visual pada bentuk-bentuk geometris dan  menangkap objek tiga dimensi, serta
            mengingat hubungan yang dihasilkan dari gerakan objek dalam suatu ruang</td>
            @grade(['grade' => $ist->spatialAbility()->grade()])
            @endgrade
            <td>Sangat mampu berpikir secara visual pada bentuk-bentuk geometris dan  menangkap objek tiga dimensi, serta
            mengingat hubungan yang dihasilkan dari gerakan objek dalam suatu ruang</td>
          </tr>

          <tr>
            <td>KEMAMPUAN BERPIKIR LOGIS</td>
            <td>Kurang mampu untuk berpikir sesuai dengan kaidah-kaidah logika akal pikiran sehat</td>
            @grade(['grade' => $ist->logicAbility()->grade()])
            @endgrade
            <td>Sangat mampu untuk berpikir sesuai dengan kaidah-kaidah logika akal pikiran sehat</td>
          </tr>

          <tr>
            <td>DAYA INGAT</td>
            <td>Kurang mampu untuk memanggil kembali informasi yang pernah dimasukkan ke dalam otak</td>
            @grade(['grade' => $ist->memoryAbility()->grade()])
            @endgrade
            <td>Kemampuan untuk memanggil kembali informasi yang pernah dimasukkan ke dalam otak</td>
          </tr>

          <tr>
            <td>KEMAMPUAN MEMAHAMI MASALAH</td>
            <td>Kurang mampu untuk mencerna, menghubungkan dan mencari kata kunci dari sebuah permasalahan</td>
            @grade(['grade' => $ist->problemSolvingAbility()->grade()])
            @endgrade
            <td>Sangat mampu untuk mencerna, menghubungkan dan mencari kata kunci dari sebuah permasalahan</td>
          </tr>
        </tbody>

        <tfoot>
          <tr style="text-align: center">
            <td colspan="8">Keterangan :  SK = Sangat Kurang, K = Kurang, S = Sedang, B = Baik, SB = Sangat Baik</td>
          </tr>
        </tfoot>
      </table>

      <div style="margin-top: 30px">
        <table class="table table-bordered" style="background: aliceblue; font-size: 1.25rem; font-weight: 800">
          <tr>
            <td style="text-align: center">IQ</td>
            <td>{{ $ist->iq->score() }} ({{ $ist->iq->gradeInWord() }}, menurut IST)</td>
          </tr>
        </table>
      </div>

      @if (! $loop->last)
        <div class="page-break"></div>
      @endif
    </section>
  @endforeach
</body>
</html>