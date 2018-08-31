@extends('layouts.app')

@section('page-title')
Learning Style
@endsection

@section('content')
  @include('layouts.partials.download-list', ['title' => 'Laporan LS', 'routeName' => 'school-lss.download'])
@endsection