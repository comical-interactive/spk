@extends('layouts.app')

@section('page-title')
Intelligenz Struktur Test
@endsection

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="header">
        <div class="row">
          <div class="col-md-6">
            <h4 class="title">IST</h4>
            <p class="category">{{ $school->name }}</p>
          </div>

          <div class="col-md-6 text-right">
            @if ($school->ists_count > 0)
              <a href="{{ route('school-ists.download-list', compact('school')) }}" class="btn btn-info btn-fill">
                Download Laporan IST
              </a>

              <a href="{{ route('school-ists.export', compact('school')) }}" class="btn btn-primary btn-fill">
                Ekspor Rekap IST
              </a>
            @endif
          </div>
        </div>
      </div>

      <div class="content">
        @if ($ists->count() > 0)
          <div class="table-responsive table-full-width">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col" style="min-width: 300px">Nama</th>
                  <th scope="col">Umur</th>
                  <th scope="col">P1</th>
                  <th scope="col">P2</th>
                  <th scope="col">SE</th>
                  <th scope="col">WA</th>
                  <th scope="col">AN</th>
                  <th scope="col">GE</th>
                  <th scope="col">RA</th>
                  <th scope="col">ZR</th>
                  <th scope="col">FA</th>
                  <th scope="col">WU</th>
                  <th scope="col">ME</th>
                  <th scope="col">Total</th>
                  <th scope="col">SE</th>
                  <th scope="col">WA</th>
                  <th scope="col">AN</th>
                  <th scope="col">GE</th>
                  <th scope="col">RA</th>
                  <th scope="col">ZR</th>
                  <th scope="col">FA</th>
                  <th scope="col">WU</th>
                  <th scope="col">ME</th>
                  <th scope="col">Total</th>
                  <th scope="col">IQ</th>
                  <th scope="col" style="min-width: 200px">KRIT. IQ</th>
                  <th scope="col">KEC. UMUM</th>
                  <th scope="col">K. VERBAL</th>
                  <th scope="col">K. VERBAL</th>
                  <th scope="col">K. BERHITUNG</th>
                  <th scope="col">K. BERHITUNG</th>
                  <th scope="col">K. ANAL-SINTESIS</th>
                  <th scope="col">K. ANAL-SINTESIS</th>
                  <th scope="col">K. SPASIAL</th>
                  <th scope="col">K. SPASIAL</th>
                  <th scope="col">LOGIKA BERPIKIR</th>
                  <th scope="col">LOGIKA BERPIKIR</th>
                  <th scope="col">KONSENTRASI</th>
                  <th scope="col">KONSENTRASI</th>
                  <th scope="col">K. MENGINGAT</th>
                  <th scope="col">K. MENGINGAT</th>
                  <th scope="col">PEMAHAMAN MASALAH</th>
                  <th scope="col">PEMAHAMAN MASALAH</th>
                  <th scope="col">R1</th>
                  <th scope="col">R2</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($ists as $ist)
                  <tr>
                    <td>{{ $ist->test_taker_index }}</td>
                    <td>{{ $ist->test_taker_name }}</td>
                    <td>{{ $ist->test_taker_age }}</td>
                    <td>{{ $ist->test_taker_first_choice }}</td>
                    <td>{{ $ist->test_taker_second_choice }}</td>
                    <td>{{ $ist->raw_score->se }}</td>
                    <td>{{ $ist->raw_score->wa }}</td>
                    <td>{{ $ist->raw_score->an }}</td>
                    <td>{{ $ist->raw_score->ge }}</td>
                    <td>{{ $ist->raw_score->ra }}</td>
                    <td>{{ $ist->raw_score->zr }}</td>
                    <td>{{ $ist->raw_score->fa }}</td>
                    <td>{{ $ist->raw_score->wu }}</td>
                    <td>{{ $ist->raw_score->me }}</td>
                    <td>{{ $ist->raw_score->total }}</td>
                    <td>{{ $ist->standardized_score->se }}</td>
                    <td>{{ $ist->standardized_score->wa }}</td>
                    <td>{{ $ist->standardized_score->an }}</td>
                    <td>{{ $ist->standardized_score->ge }}</td>
                    <td>{{ $ist->standardized_score->ra }}</td>
                    <td>{{ $ist->standardized_score->zr }}</td>
                    <td>{{ $ist->standardized_score->fa }}</td>
                    <td>{{ $ist->standardized_score->wu }}</td>
                    <td>{{ $ist->standardized_score->me }}</td>
                    <td>{{ $ist->standardized_score->total }}</td>
                    <td>{{ $ist->iq->score() }}</td>
                    <td>{{ $ist->iq->criteria() }}</td>
                    <td>{{ $ist->iq->grade() }}</td>
                    <td class="text-right">{{ $ist->verbalAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->verbalAbility()->grade() }}</td>
                    <td class="text-right">{{ $ist->arithmeticAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->arithmeticAbility()->grade() }}</td>
                    <td class="text-right">{{ $ist->analyticSyntheticAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->analyticSyntheticAbility()->grade() }}</td>
                    <td class="text-right">{{ $ist->spatialAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->spatialAbility()->grade() }}</td>
                    <td class="text-right">{{ $ist->logicAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->logicAbility()->grade() }}</td>
                    <td class="text-right">{{ $ist->concentrationAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->concentrationAbility()->grade() }}</td>
                    <td class="text-right">{{ $ist->memoryAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->memoryAbility()->grade() }}</td>
                    <td class="text-right">{{ $ist->problemSolvingAbility()->score() }}</td>
                    <td class="text-center">{{ $ist->problemSolvingAbility()->grade() }}</td>
                    <td>{{ $ist->first_choice_recommendation }}</td>
                    <td>{{ $ist->second_choice_recommendation }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="lead">Tidak ada data siswa</p>
        @endif

        {{ $ists->links() }}
      </div>
    </div>
  </div>
@endsection