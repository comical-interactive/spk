@extends('layouts.app')

@section('page-title')
Rothwell Miller Interest Blank
@endsection

@section('content')
  @include('layouts.partials.test-index', ['routeName' => 'school-rmibs.show', 'footerText' => 'Lihat RMIB'])
@endsection