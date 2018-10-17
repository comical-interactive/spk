@extends('layouts.app')

@section('page-title')
Data Siswa
@endsection

@section('content')
<div class="col-xs-12">
  <div class="card">
    <div class="header">
      <h4 class="title">Siswa</h4>
      <p class="category">{{ $school->name }}</p>
    </div>

    <div class="content">
      @if ($students->count() > 0)
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nomor Tes</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Umur</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($students as $student)
                <tr>
                    <td>{{ $student->testNumber }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->sex }}</td>
                    <td>{{ $student->age }}</td>
                    <td>
                      <a href="{{ route('school-students.download', compact('school', 'student')) }}">
                        Download Laporan Tes
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
