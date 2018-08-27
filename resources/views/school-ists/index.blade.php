@extends('layouts.app')

@section('page-title')
  Intelligenz Struktur Test
@endsection

@section('content')
  @include('layouts.partials.test-index', ['routeName' => 'school-ists.show', 'footerText' => 'Lihat IST'])
@endsection