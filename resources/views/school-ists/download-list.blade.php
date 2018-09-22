@extends('layouts.app')

@section('page-title')
Intelligenz Struktur Test
@endsection

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="header">
        <h4 class="title">IST</h4>
        <p class="category">{{ $school->name }}</p>
      </div>

      <div class="content">
        <div class="table-responsive table-full-width">
          <table class="table table-striped">
            <tbody>
              @for ($i = 1; $i <= $partCount; $i++)
                <tr>
                  <td>
                    <a href="{{ route('school-ists.download', ['school' => $school, 'part' => $i]) }}">
                      Download Laporan IST part {{ $i }}
                    </a>      
                  </td>
                </tr>                  
              @endfor            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection