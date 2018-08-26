@extends('layouts.app')

@section('page-title')
Data Sekolah
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="card">
      <div class="header">
        <div class="row">
          <div class="col-sm-8">
            <h4 class="title">Data Sekolah</h4>
            <p class="subtitle">List daftar sekolah yang terdaftar</p>
          </div>

          <div class="col-sm-4 text-right">
            <a href="{{ route('schools.create') }}" class="btn btn-primary btn-fill">
              <i class="ti-plus"></i> Tambah Sekolah
            </a>
          </div>
        </div>
      </div>

      <div class="content">
        @if ($schools->count() > 0)
          <div class="table-responsive table-full-width">
            <table class="table table-striped">
              <thead>
                <th>#</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>Kabupaten</th>
              </thead>

              <tbody>
                @foreach ($schools as $school)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                      <a href="{{ route('schools.show', [$school]) }}">{{ $school->name }}</a>
                    </td>
                    <td>{{ $school->address }}</td>
                    <td></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <p class="lead">Tidak ada data sekolah</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection