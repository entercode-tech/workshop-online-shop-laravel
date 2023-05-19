@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <button class="btn btn-primary ms-auto me-0" data-bs-toggle="modal" data-bs-target="#add_category"><i class="bi bi-plus-lg"></i> Tambah
                    Kategori</button>
            </div>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th class="text-nowrap" style="width: 20px">No</th>
                        <th class="text-nowrap">Nama</th>
                        <th class="text-nowrap" style="width: 170px">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $item)
                        <tr>
                            <td class="text-nowrap">{{ $loop->iteration }}</td>
                            <td class="text-nowrap">{{ $item->nama }}</td>
                            <td class="text-nowrap d-flex gap-2">
                                <button class="btn btn-warning" onclick="edit_category('{{ route('kategori.update',$item->id) }}','{{ json_encode($item) }}')">Edit</button>
                                <form action="{{ route('kategori.destroy',$item->id) }}" method="post">
                                @csrf
                                <button type="button" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="add_category" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <form action="{{ route('kategori.store') }}" method="post" id="form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> 
                    <div class="modal-body">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori">
                        <div class="text-danger error_alert" id="nama_error_alert"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="send_form('#form')" id="submit_btn"><i class="bi bi-files"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_category" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <form method="post" id="edit_form">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> 
                    <div class="modal-body">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori">
                        <div class="text-danger error_alert" id="nama_error_alert"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="send_form('#edit_form')" id="submit_btn"><i class="bi bi-files"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function edit_category(route,data){
                let modal = $('#edit_category')
                let form = modal.find('form')
                form.attr('action',route)
                
                data = JSON.parse(data)
                $.each(data, function (index, value) { 
                     form.find('input[name="'+index+'"]').val(value)
                     form.find('textarea[name="'+index+'"]').text(value)
                });
                modal.modal('show')
            }
        </script>
    @endpush
@endsection
