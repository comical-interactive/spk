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
  @foreach($school->rmibs as $rmib)
    <section>
      <h3>PROFIL MINAT</h3>

      <p>Berdasarkan hasil penelusuran minat Ananda <strong>{{ $rmib->test_taker_name }}</strong>,
      berikut urutan minat mulai dari yang paling diminati (peringkat 1) hingga yang kurang diminati
      (peringkat 12)</p>

      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th scope="col" style="text-align: center; width: 110px">PERINGKAT MINAT</th>
            <th scope="col" colspan="2" style="text-align: center">MINAT</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($rmib->ranks as $interest => $interestPoint)
            <tr>
              <td style="text-align: center">{{ $loop->index + 1 }}</td>
              <td style="width: 80px; border-right: 0">{{ $interest }}</td>
              <td style="border-left: 0">: {{ config("constants.rmib.interests.{$interest}") }}</td>
            </tr>
          @endforeach
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
        <p>
          <img src="{{ asset('img/signature.png') }}" height="80">
        </p>
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