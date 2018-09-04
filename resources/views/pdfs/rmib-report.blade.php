<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAPORAN RMIB</title>

  @include('layouts.partials.pdf-style')
</head>
<body>
  @foreach($rmibs as $rmib)
    <section>
      <h3>PROFIL MINAT</h3>

      <p>Berdasarkan hasil asesmen psikologis, berikut profil peminatan untuk ananda<strong>
      {{ $rmib->test_taker_name }}</strong></p>

      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th rowspan="2" style="width: 110px">&nbsp;</th>
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

      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th scope="col" colspan="2" style="text-align: center">MINAT</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th scope="col" style="width: 110px">Outdoor</th>
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

      <h2 class="table-heading">REKOMENDASI</h2>

      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th>PEMINATAN</th>
            <th style="text-align: center">MATEMATIKA & ILMU ALAM</th>
            <th style="text-align: center">ILMU ILMU SOSIAL</th>
            <th style="text-align: center">ILMU BAHASA & BUDAYA</th>
          </tr>
        </thead>
        
        <tbody>
          <tr>
            <th scope="col">REKOMENDASI 1</th>

            <td class="svg">
              @if ($rmib->first_recommendation == 'MIA')
                <img src="{{ asset('check-mark.svg') }}">
              @endif
            </td>
            
            <td class="svg">
              @if ($rmib->first_recommendation == 'IIS')
                <img src="{{ asset('check-mark.svg') }}">
              @endif
            </td>
            
            <td class="svg">
              @if ($rmib->first_recommendation == 'IBB')
                <img src="{{ asset('check-mark.svg') }}">
              @endif
            </td>            
          </tr>

          <tr>
            <th scope="col">REKOMENDASI 2</th>

            <td class="svg">
              @if ($rmib->second_recommendation == 'MIA')
                <img src="{{ asset('check-mark.svg') }}">
              @endif
            </td>
            
            <td class="svg">
              @if ($rmib->second_recommendation == 'IIS')
                <img src="{{ asset('check-mark.svg') }}">
              @endif
            </td>
            
            <td class="svg">
              @if ($rmib->second_recommendation == 'IBB')
                <img src="{{ asset('check-mark.svg') }}">
              @endif
            </td>            
          </tr>
        </tbody>
      </table>

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