@extends('layouts.app')

@section('page-title')
Myers–Briggs Type Indicator, Edward Personal Preference Schedule, Learning Style
@endsection

@section('content')
  @include('layouts.partials.download-list', ['title' => 'Laporan LS', 'routeName' => 'school-lss.download'])
@endsection