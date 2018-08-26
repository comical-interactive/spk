@extends('layouts.app')

@section('page-title')
Tambah Sekolah
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="card">
      <div class="header">
        <h4 class="title">Tambah Sekolah</h4>
      </div>

      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('schools.store') }}" method="POST" class="form">
              @csrf

              <div class="form-group">
                <label>Nama Sekolah</label>
                <input type="text" class="form-control border-input" name="name" placeholder="Nama Sekolah">
              </div>

              <div class="form-group">
                <label>Kabupaten</label>
                <input type="text" class="form-control border-input" placeholder="Nama Sekolah">
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea
                  rows="5"
                  class="form-control border-input"
                  name="address"
                  placeholder="Alamat Sekolah"
                ></textarea>
              </div>

              <div class="text-center">
                <button class="btn btn-info btn-fill btn-wd">Tambah Sekolah</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection