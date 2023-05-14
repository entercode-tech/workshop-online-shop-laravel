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
                        <th scope="col">Column 1</th>
                        <th scope="col">Column 2</th>
                        <th scope="col">Column 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">R1C1</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                    <tr>
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
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
@endsection
