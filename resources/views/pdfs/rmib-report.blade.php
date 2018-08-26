<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAPORAN RMIB</title>

  <style>
    @font-face {
      font-family: OpenSans-Regular;
      src: url('https://fonts.googleapis.com/css?family=Open+Sans');
    }

    html {
      font-family: 'Open Sans', sans-serif;
      font-size: 11px
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

    .page-break {
      page-break-after: always;
    }

    .svg {
      text-align: center;
    }

    .svg > img {
      width: 20;
      height: 20
    }
  </style>
</head>
<body>
  @foreach($rmibs as $rmib)
    <section>
      <h3>PROFIL MINAT</h3>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th rowspan="2">&nbsp;</th>
            <th colspan="12" style="text-align: center">ASPEK MINAT</th>
          </tr>
          <tr>
            <th>OUT</th>
            <th>MEC</th>
            <th>COM</th>
            <th>SCI</th>
            <th>PER</th>
            <th>AES</th>
            <th>MUS</th>
            <th>LIT</th>
            <th>SOC</th>
            <th>CLE</th>
            <th>PRA</th>
            <th>MED</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td scope="col">SKOR</td>
            @foreach ($rmib->sums as $row)
              <td style="text-align: center">{{ $row }}</td>
            @endforeach
          </tr>

          <tr>
            <td scope="col">PERINGKAT MINAT</td>
            @foreach ($rmib->ranks as $row)
              <td style="text-align: center">{{ $row }}</td>
            @endforeach
          </tr>
        </tbody>
      </table>

      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" colspan="2" style="text-align: center">MINAT</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <th scope="col">Outdoor</th>
              <td>Aktivitas yand dilakukan di luar atau di lapangan terbuka</td>
            </tr>

            <tr>
              <th scope="col">Mechanical</th>
              <td>Aktivitas yang berhubungan dengan mesin, alat-alat dan daya mekanik</td>
            </tr>

            <tr>
              <th scope="col">Computational</th>
              <td>Aktivitas yang berhubungan dengan angka-angka</td>
            </tr>

            <tr>
              <th scope="col">Scientific</th>
              <td>Aktivitas yang berhubungan dengan keaktifan dalam hal analisa, penyelidikan dan eksperimen</td>
            </tr>

            <tr>
              <th scope="col">Persuasive</th>
              <td>Aktivitas yang berhubungan dengan diskusi, membujuk dan bergaul dengan orang lain atau aktivitas yang
              membutuhkan kontak dengan orang lain</td>
            </tr>

            <tr>
              <th scope="col">Aesthetic</th>
              <td>Aktivitas yang berhubungan dengan hal-hal yang bersifat seni dan kreativitas</td>
            </tr>

            <tr>
              <th scope="col">Literary</th>
              <td>Aktivitas yang berhubungan dengan buku-buku, kegiatan membaca dan menulis/mengarang</td>
            </tr>

            <tr>
              <th scope="col">Musical</th>
              <td>Aktivitas yang berhubungan dengan musik</td>
            </tr>

            <tr>
              <th scope="col">Social Service</th>
              <td>Aktivitas yang berhubungan dengan menolong, membimbing dan menasehati orang lain</td>
            </tr>

            <tr>
              <th scope="col">Clerical</th>
              <td>Aktivitas yang bersifat rutin yang menuntut ketepatan dan ketelitian</td>
            </tr>

            <tr>
              <th scope="col">Practical</th>
              <td>Aktivitas yang bersifat praktis, karya pertukangan, dan yang memerlukan keterampilan</td>
            </tr>

            <tr>
              <th scope="col">Medical</th>
              <td>Aktivitas yang berhubungan dengan pengobatan</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="margin-top: 50px; text-align: right">
        <p>Makassar, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        <p>Psikolog,</p>
        <br/>
        <br/>
        <br/>
        <p>Harlina Hamid, S.Psi, M.Si, M.Psi, Psikolog</p>
        <p>SIPP : 02323-17-0013-11-2</p>
      </div>

      @if (! $loop->last)
        <div class="page-break"></div>
      @endif
    </section>
  @endforeach
</body>
</html>