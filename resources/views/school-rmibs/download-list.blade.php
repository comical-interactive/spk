@extends('layouts.app')

@section('page-title')
Rothwell Miller Interest Blank
@endsection

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="header">
        <div class="row">
          <div class="col-md-6">
            <h4 class="title">Laporan RMIB</h4>
            <p class="category">{{ $school->name }}</p>
          </div>

          <div class="col-md-6 text-right">
            @if ($downloadable->count() > 0)
              <a href="{{ route('school-rmibs.download', [$school]) }}" class="btn btn-info btn-fill">
                Download Keseluruhan
              </a>
            @endif
          </div>
        </div>
      </div>

      <div class="content">
        @if ($downloadable->count() > 0)
          <div class="table-responsive table-full-width">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col" style="min-width: 300px">Deskripsi</th>
                  <th scope="col">Link</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($downloadable->chunk($downloadableCount) as $chunk)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>

                    <td>
                      Download Laporan RMIB Nomor Urut {{ $chunk->first() }} sampai {{ $chunk->last() }}
                    </td>

                    <td>
                      <a
                        href="{{ route('school-rmibs.download', [$school]) }}?offset={{ $chunk->first() - 1 }}"
                        class="btn btn-info btn-fill"
                      >
                        Download
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="lead">Tidak ada data siswa</p>
        @endif
      </div>
    </div>
  </div>
@endsection