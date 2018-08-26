@extends('layouts.app')

@section('page-title')
Rothwell Miller Interest Blank
@endsection

@section('content')
  @if ($schools->count() <= 0)
    <h2>Tambahkan data sekolah terlebih dahulu</h2>
  @endif

  @foreach($schools as $school)
    <div class="col-lg-3 col-sm-6">
      <div class="card">
        <div class="content text-center">
          <h4>{{ $school->name }}</h4>

          <div class="footer">
            <hr />
            <a href="{{ route('school-rmibs.show', [$school]) }}">
                <i class="ti-info-alt"></i> Lihat RMIB
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection