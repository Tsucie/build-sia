@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ url('images/'.$guru->photo) }}" alt="User Profile Picture">
                <h3 class="profile-username text-center">{{ $guru->nama }}</h3>
                <p>
                    <h4 class="text-muted text-center">
                        <span>{{ $guru->jabatan }}</span>
                    </h4>
                </p>
                <strong><i class="fa fa-book margin-r-5"></i>NIP :</strong>{{ $guru->nip }}<hr>
                <strong><i class="fa fa-pinterest margin-r-5"></i>Pendidikan :</strong>{{ $guru->pendidikan }}<hr>
                <strong><i class="fa fa-bank margin-r-5"></i>Tempat Lahir :</strong>{{ $guru->tempat_lahir }}<hr>
                <strong><i class="fa fa-calendar margin-r-5"></i>Tanggal Lahir :</strong>{{ $guru->tanggal_lahir }}<hr>
                <strong><i class="fa fa-whatsapp margin-r-5"></i>No Telp :</strong>{{ $guru->telp }}<hr>
                <strong><i class="fa fa-map-marker margin-r-5"></i>Alamat :</strong>{{ $guru->alamat }}<hr>
                <a href="/guru" class="btn btn-success btn-block"><b>CLOSE</b></a>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    $(function () {
        $('#guru-table').DataTable();
    });
</script>
@endpush