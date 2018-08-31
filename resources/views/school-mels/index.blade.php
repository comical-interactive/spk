@extends('layouts.app')

@section('page-title')
  Myers–Briggs Type Indicator, Edward Personal Preference Schedule, Learning Style
@endsection

@section('content')
  @include('layouts.partials.test-index', ['routeName' => 'school-mels.show', 'footerText' => 'Lihat MBTI EPPS LS'])
@endsection