@extends('layouts.master')
@section('content')

<div class="col-xs-12">
    <div class="box">
        <h3 class="box-title"><i class="fa fa-database" style="padding-left: 1rem;"> Data Guru </i></h3>
        @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-check"></i>Success</h4>
            {{session('message')}}.
        </div>
        @endif
        <div class="box-header">
            <a href="/guru/create" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"> Tambah Guru </i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="guru-table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th> No </th>
                                    <th> Nama </th>
                                    <th> NIP </th>
                                    <th> Alamat </th>
                                    <th> Photo </th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($guru as $data)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->nip }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td><img src="{{ url('images/'.$data->photo) }}" alt="Photo" width="50"></td>
                                    <td>
                                        <a href="/guru/profil/{{ $data->id }}" class="btn btn-success btn-sm">Detail</a>
                                        <a href="/guru/edit/{{ $data->id }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $data->id }}">Delete</button>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal dialog hapus -->
@foreach($guru as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Form konfirmasi</h4>
            </div>
        </div>
        <div class="modal-body">
            <p>Anda yakin ingin menghapus DATA GURU yang bernama {{ $data->nama }}?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
            <a href="/guru/delete/{{ $data->id }}" class="btn btn-danger btn-outline">Hapus</a>
        </div>
    </div>
</div>
@endforeach
@endsection
@push('scripts')
<script>
    $(function () {
        $('#guru-table').DataTable();
    });
</script>
@endpush