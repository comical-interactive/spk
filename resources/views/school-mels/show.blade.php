@extends('layouts.app')

@section('page-title')
Myers–Briggs Type Indicator, Edward Personal Preference Schedule, Learning Style
@endsection

@section('content')
<div class="col-xs-12">
  <div class="card">
    <div class="header">
      <div class="row">
        <div class="col-md-6">
          <h4 class="title">MBTI EPPS LS</h4>
          <p class="category">{{ $school->name }}</p>
        </div>

        <div class="col-md-6 text-right">
          <a href="#" class="btn btn-info btn-fill">
            Download Laporan MBTI
          </a>

          <a href="{{ route('school-eppss.download-list', compact('school')) }}" class="btn btn-info btn-fill">
            Download Laporan EPPS
          </a>

          <a href="{{ route('school-ls.download-list', compact('school')) }}" class="btn btn-info btn-fill">
            Download Laporan LS
          </a>
        </div>
      </div>
    </div>

    <div class="content">
      @if ($mbtiEppsLss->count() > 0)
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Tes</th>
              <th scope="col">Nama</th>
              <th scope="col">Umur</th>
              <th scope="col">Jenis Kelamin</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($mbtiEppsLss as $model)
              <tr>
                <td>{{ $model->test_taker_index }}</td>
                <td>{{ $model->test_taker_number }}</td>
                <td>{{ $model->test_taker_name }}</td>
                <td>{{ $model->test_taker_age }}</td>
                <td>{{ $model->test_taker_sex }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
        <p class="lead">Tidak ada data siswa</p>
      @endif

      {{ $mbtiEppsLss->links() }}
    </div>
  </div>
</div>
@endsection
