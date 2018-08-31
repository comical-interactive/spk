@extends('layouts.app')

@section('page-title')
Edward Personal Preference Schedule
@endsection

@section('content')
  @include('layouts.partials.download-list', ['title' => 'Laporan EPPS', 'routeName' => 'school-eppss.download'])
@endsection