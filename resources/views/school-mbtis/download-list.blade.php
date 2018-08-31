@extends('layouts.app')

@section('page-title')
Myers–Briggs Type Indicator
@endsection

@section('content')
  @include('layouts.partials.download-list', ['title' => 'Laporan MBTI', 'routeName' => 'school-mbtis.download'])
@endsection