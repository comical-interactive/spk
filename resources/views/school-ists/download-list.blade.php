@extends('layouts.app')

@section('page-title')
Intelligenz Struktur Test
@endsection

@section('content')
  @include('layouts.partials.download-list', ['title' => 'Laporan IST', 'routeName' => 'school-ists.download'])
@endsection