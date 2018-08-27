@extends('layouts.app')

@section('page-title')
Rothwell Miller Interest Blank
@endsection

@section('content')
  @include('layouts.partials.download-list', ['title' => 'Laporan RMIB', 'routeName' => 'school-rmibs.download'])
@endsection