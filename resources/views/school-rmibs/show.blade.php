@extends('layouts.app')

@section('page-title')
Rothwell Miller Interest Blank
@endsection

@section('content')
<div class="col-xs-12">
  <div class="card">
    <div class="header">
      <div class="row">
        <div class="col-md-6">
          <h4 class="title">RMIB</h4>
          <p class="category">{{ $school->name }}</p>
        </div>

        <div class="col-md-6 text-right">
          <ul class="list-inline">
            <li>
              <form action="{{ route('school-rmibs.import-ist-recap', compact('school')) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="input-group">
                  <input type="file" name="file">

                  <span class="input-group-btn">
                    <button class="btn btn-primary btn-fill" type="submit">Upload</button>
                  </span>
                </div>
              </form>
            </li>

            <li>
              <a href="{{ route('school-rmibs.download-list', compact('school')) }}" class="btn btn-info btn-fill">
                Download Laporan RMIB
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="content">
      @if ($rmibs->count() > 0)
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" rowspan="2">#</th>
                <th scope="col" rowspan="2" style="min-width: 300px">Nama</th>
                <th scope="col" colspan="12">Peringkat Minat</th>
              </tr>

              <tr>
                <th scope="col" nowrap>OUT</th>
                <th scope="col" nowrap>MECH</th>
                <th scope="col" nowrap>COMP</th>
                <th scope="col" nowrap>SCIE</th>
                <th scope="col" nowrap>PERS</th>
                <th scope="col" nowrap>AEST</th>
                <th scope="col" nowrap>MUS</th>
                <th scope="col" nowrap>LITE</th>
                <th scope="col" nowrap>SOC</th>
                <th scope="col" nowrap>CLER</th>
                <th scope="col" nowrap>PRAC</th>
                <th scope="col" nowrap>MED</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($rmibs as $rmib)
                <tr>
                  <td>{{ $rmib->test_taker_index }}</td>
                  <td>{{ $rmib->test_taker_name }}</td>

                  @if ($rmib->ranks)
                    @foreach($rmib->ranks as $rank)
                      <td class="text-center">{{ $rank }}</td>
                    @endforeach
                  @else
                    <td colspan="12">Gagal memuat peringkat minat</td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p class="lead">Tidak ada data siswa</p>
      @endif

      {{ $rmibs->links() }}
    </div>
  </div>
</div>
@endsection

@section('head')
<style>
  table.table th {
    text-align: center;
    font-weight: 800 !important
  }
</style>
@endsection
