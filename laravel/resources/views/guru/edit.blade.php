@extends('layouts.master')
@section('title', 'Edit Data Guru')
@section('content')

<div class="row">
    <div class="col-md-6">
        <form action="/guru/update/{{ $guru->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{ $guru->nama }}">
                </div>
                <div class="text-danger">
                    @error('nama')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                    <input type="tel" class="form-control" name="nip" id="nip" placeholder="NIP" value="{{ $guru->nip }}">
                </div>
                <div class="text-danger">
                    @error('nip')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="{{ $guru->jabatan }}">
                </div>
                <div class="text-danger">
                    @error('jabatan')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                    <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="{{ $guru->pendidikan }}">
                </div>
                <div class="text-danger">
                    @error('pendidikan')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-bank"></i>
                    </div>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ $guru->tempat_lahir }}">
                </div>
                <div class="text-danger">
                    @error('tempat_lahir')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $guru->tanggal_lahir }}">
                </div>
                <div class="text-danger">
                    @error('tanggal_lahir')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <select name="agama" id="agama" class="form-control">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <div class="text-danger">
                    @error('agama')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <input type="tel" class="form-control" name="telp" id="telp" placeholder="Nomor Telpon" data-inputmask="&quot;mask&quot;:&quot;(999) 999-9999&quot;" data-mask="" value="{{ $guru->telp }}">
                </div>
                <div class="text-danger">
                    @error('telp')
                    {{message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <input type="text" class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat" value="{{ $guru->alamat }}">
                    <div class="text-danger">
                    @error('alamat')
                    {{message}}
                    @enderror
                </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row-sm-6">
                    <img src="{{ url('images/'.$guru->photo) }}" alt="Foto guru" width="100px">
                </div>
                <div class="row-sm-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Photo</label>
                        <input type="file" class="form-control" name="photo" id="exampleInputFile" value="{{ $guru->photo }}">
                    </div>
                    <div class="text-danger">
                        @error('photo')
                        {{message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <a href="/guru" class="btn btn-success btn-sm">Close</a>
                <button class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(function () {
        $('#guru-table').DataTable();
    });
</script>\
@endpush