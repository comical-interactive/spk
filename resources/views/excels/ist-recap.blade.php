<table>
    <thead></thead>
    <tbody>
      @foreach(range(0, 5) as $i)
        <tr></tr>
      @endforeach

      <tr>
        <td colspan="6" align="center">REKAP REKOMENDASI PSIKOTES PEMINATAN/PENJURUSAN SISWA BARU</td>
      </tr>

      <tr>
        <td colspan="6">{{ strtoupper($school->name) }} TAHUN {{ date('Y') }}</td>
      </tr>

      <tr></tr>

      <tr>
        <td>Nomor Urut</td>
        <td>Nama</td>
        <td>Nomor Tes</td>
        <td>IQ, menurut IST</td>
        <td>Rekomendasi 1</td>
        <td>Rekomendasi 1</td>
      </tr>

      @foreach($school->ists as $ist)
        <tr>
          <td>{{ $ist->test_taker_index }}</td>
          <td>{{ $ist->test_taker_name }}</td>
          <td>{{ $ist->test_taker_number }}</td>
          <td>{{ $ist->iq->score() }}</td>
          <td>{{ $ist->first_choice_recommendation }}</td>
          <td>{{ $ist->second_choice_recommendation }}</td>
        </tr>
      @endforeach

      <tr></tr>

      <tr>
        <td>Keterangan:</td>
      </tr>

      <tr>
        <td>MIA</td>
        <td>Matematika dan Ilmu Alam</td>
      </tr>

      <tr>
        <td>IIS</td>
        <td>Ilmu Ilmu Sosial</td>
      </tr>

      <tr>
        <td>IBB</td>
        <td>Ilmu Bahasa dan Budaya</td>
      </tr>

      <tr></tr>
      <tr></tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">Makassar, {{ \Carbon\Carbon::now()->format('d F Y') }}</td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">Educare,</td>
      </tr>

      <tr></tr>
      <tr></tr>
      <tr></tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="3">Harlina Hamid, S.Psi, M.Si, M.Psi, Psikolog</td>
      </tr>
    </tbody>
  </table>