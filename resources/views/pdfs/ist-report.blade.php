<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HASIL PEMERIKSAAN PSIKOLOGIS PEMETAAN POTENSI DIRI</title>

  <style>
    @font-face {
      font-family: OpenSans-Regular;
      src: url('https://fonts.googleapis.com/css?family=Open+Sans');
    }

    html {
      font-family: 'Open Sans', sans-serif;
      font-size: 11px;
    }

    .page-break {
      page-break-after: always;
    }

    .svg {
      text-align: center;
    }

    .svg > img {
      width: 15;
      height: 15
    }

    h2.table-heading {
      font-weight: 800;
      color: maroon
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
    }
    td,
    th {
      padding: 0;
    }
    table {
      background-color: transparent;
    }
    th {
      text-align: left;
    }
    .table {
      width: 100%;
      max-width: 100%;
      margin-bottom: 20px;
    }
    .table > thead > tr > th,
    .table > tbody > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tbody > tr > td,
    .table > tfoot > tr > td {
      padding: 8px;
      line-height: 1.42857143;
      vertical-align: top;
      border-top: 1px solid #dddddd;
    }
    .table > thead > tr > th {
      vertical-align: bottom;
      border-bottom: 2px solid #dddddd;
    }
    .table > caption + thead > tr:first-child > th,
    .table > colgroup + thead > tr:first-child > th,
    .table > thead:first-child > tr:first-child > th,
    .table > caption + thead > tr:first-child > td,
    .table > colgroup + thead > tr:first-child > td,
    .table > thead:first-child > tr:first-child > td {
      border-top: 0;
    }
    .table > tbody + tbody {
      border-top: 2px solid #dddddd;
    }
    .table .table {
      background-color: #ffffff;
    }
    .table-condensed > thead > tr > th,
    .table-condensed > tbody > tr > th,
    .table-condensed > tfoot > tr > th,
    .table-condensed > thead > tr > td,
    .table-condensed > tbody > tr > td,
    .table-condensed > tfoot > tr > td {
      padding: 5px;
    }
    .table-bordered {
      border: 1px solid #dddddd;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
      border: 1px solid #dddddd;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > thead > tr > td {
      border-bottom-width: 2px;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
      background-color: #f9f9f9;
    }
    .table-hover > tbody > tr:hover {
      background-color: #f5f5f5;
    }
    table col[class*="col-"] {
      position: static;
      float: none;
      display: table-column;
    }
    table td[class*="col-"],
    table th[class*="col-"] {
      position: static;
      float: none;
      display: table-cell;
    }
    .table > thead > tr > td.active,
    .table > tbody > tr > td.active,
    .table > tfoot > tr > td.active,
    .table > thead > tr > th.active,
    .table > tbody > tr > th.active,
    .table > tfoot > tr > th.active,
    .table > thead > tr.active > td,
    .table > tbody > tr.active > td,
    .table > tfoot > tr.active > td,
    .table > thead > tr.active > th,
    .table > tbody > tr.active > th,
    .table > tfoot > tr.active > th {
      background-color: #f5f5f5;
    }
    .table-hover > tbody > tr > td.active:hover,
    .table-hover > tbody > tr > th.active:hover,
    .table-hover > tbody > tr.active:hover > td,
    .table-hover > tbody > tr:hover > .active,
    .table-hover > tbody > tr.active:hover > th {
      background-color: #e8e8e8;
    }
    .table > thead > tr > td.success,
    .table > tbody > tr > td.success,
    .table > tfoot > tr > td.success,
    .table > thead > tr > th.success,
    .table > tbody > tr > th.success,
    .table > tfoot > tr > th.success,
    .table > thead > tr.success > td,
    .table > tbody > tr.success > td,
    .table > tfoot > tr.success > td,
    .table > thead > tr.success > th,
    .table > tbody > tr.success > th,
    .table > tfoot > tr.success > th {
      background-color: #dff0d8;
    }
    .table-hover > tbody > tr > td.success:hover,
    .table-hover > tbody > tr > th.success:hover,
    .table-hover > tbody > tr.success:hover > td,
    .table-hover > tbody > tr:hover > .success,
    .table-hover > tbody > tr.success:hover > th {
      background-color: #d0e9c6;
    }
    .table > thead > tr > td.info,
    .table > tbody > tr > td.info,
    .table > tfoot > tr > td.info,
    .table > thead > tr > th.info,
    .table > tbody > tr > th.info,
    .table > tfoot > tr > th.info,
    .table > thead > tr.info > td,
    .table > tbody > tr.info > td,
    .table > tfoot > tr.info > td,
    .table > thead > tr.info > th,
    .table > tbody > tr.info > th,
    .table > tfoot > tr.info > th {
      background-color: #d9edf7;
    }
    .table-hover > tbody > tr > td.info:hover,
    .table-hover > tbody > tr > th.info:hover,
    .table-hover > tbody > tr.info:hover > td,
    .table-hover > tbody > tr:hover > .info,
    .table-hover > tbody > tr.info:hover > th {
      background-color: #c4e3f3;
    }
    .table > thead > tr > td.warning,
    .table > tbody > tr > td.warning,
    .table > tfoot > tr > td.warning,
    .table > thead > tr > th.warning,
    .table > tbody > tr > th.warning,
    .table > tfoot > tr > th.warning,
    .table > thead > tr.warning > td,
    .table > tbody > tr.warning > td,
    .table > tfoot > tr.warning > td,
    .table > thead > tr.warning > th,
    .table > tbody > tr.warning > th,
    .table > tfoot > tr.warning > th {
      background-color: #fcf8e3;
    }
    .table-hover > tbody > tr > td.warning:hover,
    .table-hover > tbody > tr > th.warning:hover,
    .table-hover > tbody > tr.warning:hover > td,
    .table-hover > tbody > tr:hover > .warning,
    .table-hover > tbody > tr.warning:hover > th {
      background-color: #faf2cc;
    }
    .table > thead > tr > td.danger,
    .table > tbody > tr > td.danger,
    .table > tfoot > tr > td.danger,
    .table > thead > tr > th.danger,
    .table > tbody > tr > th.danger,
    .table > tfoot > tr > th.danger,
    .table > thead > tr.danger > td,
    .table > tbody > tr.danger > td,
    .table > tfoot > tr.danger > td,
    .table > thead > tr.danger > th,
    .table > tbody > tr.danger > th,
    .table > tfoot > tr.danger > th {
      background-color: #f2dede;
    }
    .table-hover > tbody > tr > td.danger:hover,
    .table-hover > tbody > tr > th.danger:hover,
    .table-hover > tbody > tr.danger:hover > td,
    .table-hover > tbody > tr:hover > .danger,
    .table-hover > tbody > tr.danger:hover > th {
      background-color: #ebcccc;
    }

     table.table-grade > thead > tr {
       background: paleturquoise
     }

     table.table-grade > tfoot > tr > td {
       font-weight: 800;
       color: maroon
     }

     table.table-grade > tbody > tr > td:first-child {
       background: beige;
       font-weight: 700;
       vertical-align: middle;
     }
  </style>
</head>
<body>
  @foreach($ists as $ist)
    <section>
      <table style="width: 100%; margin-bottom: 30px">
        <tr>
          <td><img height="100" src="{{ asset('img/educare.png') }}" alt=""></td>

          <td style="width: 30%">
            <h3 style="margin-bottom: 0; padding-bottom: 0">Training - Assesment – Therapy</h3>
            <p style="line-height: 1.5rem">Jalan Bau Mangga II No. 7 Makassar<br/>Telp. 085341171639<br/>
            email: educare_mks@yahoo.com</p>
          </td>
              <!-- boder biru dibawah -->
        </tr>
      </table>

      <div>
        <table class="table table-bordered" style="background: aliceblue">
          <thead>
            <tr>
              <th colspan="6" style="text-align: center; font-weight: 800">
                <h3>HASIL PEMERIKSAAN PSIKOLOGIS PEMETAAN POTENSI DIRI</h3>
              </th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Nama</td>
              <td style="width: 10px; text-align: center">:</td>
              <td>{{ $ist->test_taker_name }}</td>
              <td>Sekolah</td>
              <td style="width: 10px; text-align: center">:</td>
              <td>{{ $school->name }}</td>
            </tr>

            <tr>
              <td>No. Tes</td>
              <td style="width: 10px; text-align: center">:</td>
              <td>{{ $ist->test_taker_number }}</td>
              <td>Tanggal Tes</td>
              <td style="width: 10px; text-align: center">:</td>
              <td></td>
            </tr>
          </tbody>

          <tfoot>
            <tr>
              <td colspan="6">&nbsp;</td>
            </tr>
          </tfoot>
        </table>
      </div>

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
            @grade(['ability' => $ist->iq])
            @endgrade
            <td>Sangat mampu menyerap, memproses dan menggunakan kapasitas/potensinya dalam kehidupan sehari-hari</td>
          </tr>

          <tr>
            <td>KEMAMPUAN VERBAL</td>
            <td>Kurang memiliki kemampuan dalam menganalisis informasi yang bersifat verbal</td>
            @grade(['ability' => $ist->verbalAbility()])
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
            @grade(['ability' => $ist->arithmeticAbility()])
            @endgrade
            <td>Sangat mampu melakukan analisis dengan angka</td>
          </tr>

          <tr>
            <td>KEMAMPUAN ANALISIS-SINTESIS</td>
            <td>Kurang mampu untuk menilai, memilah, membuat perbedaan & hubungan suatu data/informasi dan kemudian
            membuat kesimpulan</td>
            @grade(['ability' => $ist->analyticSyntheticAbility()])
            @endgrade
            <td>Sangat mampu untuk menilai, memilah, membuat perbedaan & hubungan suatu data/informasi dan kemudian
            membuat kesimpulan</td>
          </tr>

          <tr>
            <td>KEMAMPUAN SPASIAL (PANDANG RUANG)</td>
            <td>Kurang mampu berpikir secara visual pada bentuk-bentuk geometris dan  menangkap objek tiga dimensi, serta
            mengingat hubungan yang dihasilkan dari gerakan objek dalam suatu ruang</td>
            @grade(['ability' => $ist->spatialAbility()])
            @endgrade
            <td>Sangat mampu berpikir secara visual pada bentuk-bentuk geometris dan  menangkap objek tiga dimensi, serta
            mengingat hubungan yang dihasilkan dari gerakan objek dalam suatu ruang</td>
          </tr>

          <tr>
            <td>KEMAMPUAN BERPIKIR LOGIS</td>
            <td>Kurang mampu untuk berpikir sesuai dengan kaidah-kaidah logika akal pikiran sehat</td>
            @grade(['ability' => $ist->logicAbility()])
            @endgrade
            <td>Sangat mampu untuk berpikir sesuai dengan kaidah-kaidah logika akal pikiran sehat</td>
          </tr>

          <tr>
            <td>DAYA INGAT</td>
            <td>Kurang mampu untuk memanggil kembali informasi yang pernah dimasukkan ke dalam otak</td>
            @grade(['ability' => $ist->memoryAbility()])
            @endgrade
            <td>Kemampuan untuk memanggil kembali informasi yang pernah dimasukkan ke dalam otak</td>
          </tr>

          <tr>
            <td>KEMAMPUAN MEMAHAMI MASALAH</td>
            <td>Kurang mampu untuk mencerna, menghubungkan dan mencari kata kunci dari sebuah permasalahan</td>
            @grade(['ability' => $ist->problemSolvingAbility()])
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
            <td>{{ $ist->iq->score() }} ({{ $ist->iq->criteria() }}, menurut IST)</td>
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