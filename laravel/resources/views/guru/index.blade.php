@extends('layouts.master')
@section('content')

<div class="col-xs-12">
    <div class="box">
        <h3 class="box-title"><i class="fa fa-database" style="padding-left: 1rem;"> Data Guru </i></h3>
        <div class="box-header">
            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"> Tambah Guru </i></a>
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
                                        <a href="#" class="btn btn-success btn-sm">Detail</a>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
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
@endsection
@push('scripts')
<script>
    $(function () {
        $('#guru-table').DataTable();
    });
</script>
@endpush