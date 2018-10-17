@extends('layouts.app')

@section('page-title')
  Data Siswa
@endsection

@section('content')
  @include('layouts.partials.test-index', ['routeName' => 'school-students.show', 'footerText' => 'Lihat Siswa'])
@endsection