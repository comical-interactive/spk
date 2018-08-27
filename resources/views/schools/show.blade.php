@extends('layouts.app')

@section('page-title')
Direktori {{ $school->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="title">{{ $school->name }}</h4>
                    </div>

                    <div class="col-md-6 text-right">
                        <ul class="list-inline">
                            <li>
                                <form method="POST" action="{{ route('schools.reset', compact('school')) }}">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-success btn-fill btn-wd">
                                        <i class="ti-reload"></i> Reset Data
                                    </button>
                                </form>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('schools.destroy', compact('school')) }}">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger btn-fill btn-wd">
                                        <i class="ti-trash"></i> Hapus Sekolah
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content h-500">
                <form
                    class="form form-import"
                    action="{{ route('school-ists.import', compact('school')) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <h4>Impor Data IST</h4>

                    <div class="form-inline">
                        <div class="form-group">
                            <input type="file" class="form-control border-input" name="file">
                        </div>

                        <button class="btn btn-primary btn-fill">Upload</button>
                    </div>

                    @if ($school->ists_count > 0)
                        <p class="text-success">Data IST telah diimpor, mengupload data baru akan menghapus data yang
                        lama</p>
                    @endif
                </form>

                <form
                    class="form form-import"
                    action="{{ route('school-rmibs.import', compact('school')) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <h4>Impor Data RMIB</h4>

                    <div class="form-inline">
                        <div class="form-group">
                            <input type="file" class="form-control border-input" name="file">
                        </div>

                        <button class="btn btn-primary btn-fill">Upload</button>
                    </div>

                    @if ($school->rmibs_count > 0)
                        <p class="text-success">Data RMIB telah diimpor, mengupload data baru akan menghapus data yang
                        lama</p>
                    @endif
                </form>

                <form
                    class="form form-import"
                    action="{{ route('school-mels.import', compact('school')) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <h4>Impor Data MBTI EPPS LS</h4>

                    <div class="form-inline">
                        <div class="form-group">
                            <input type="file" class="form-control border-input" name="file">
                        </div>

                        <button class="btn btn-primary btn-fill">Upload</button>
                    </div>

                    @if ($school->mbti_epps_lss_count > 0)
                        <p class="text-success">Data MBTI EPPS LS telah diimpor, mengupload data baru akan menghapus
                        data yang lama</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection