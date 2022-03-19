@extends('layouts.admin-layouts')

@push('css')
<style>
    .cke {
        visibility: visible !important;
    }
    .modal-title {
        font-size: 23px!important;
        color: black!important;
    }

    .modal-backdrop.show {
        display: none !important;
    }
    .fix-text {
        font-size: 9px;
        color: rgb(0, 0, 0)!important;
        font-family: sans-serif!important;
    }
    table.dataTable tbody th,
    table.dataTable tbody td {
        padding: 8px 10px!important;
        border-color: #d8d8d8!important;
        border-top-color: #d8d8d8!important;
        border-right-color: #d8d8d8!important;
        border-bottom-color: #d8d8d8!important;
        border-left-color: #d8d8d8!important;
        table-layout:fixed!important;
        white-space: nowrap!important;
    }
    .button-text-fix {
        font-size: 11px!important;
    }
    table.dataTable {
        color: rgb(0, 0, 0)!important;
    }
</style>
@endpush

@section('content-header', 'Panel Beranda - Data Makanan Sehat')

@section('content-header-button')
    <button class="btn btn-info btn-md ml-auto mr-2" data-toggle="modal" data-target="#modaltambahdata">Tambah Data Anak</button>
    {{-- MODAL TAMBAH DATA --}}
    <div class="modal fade" id="modaltambahdata" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Kendaraan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Silahkan ubah data Kendaraan berikut. </div>
                <form action="{{ route('admin-tambah-data-anak') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container border-dark">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="kendaraan_merk">Merk Kendaraan</label>
                                    <input type="text" class="form-control" id="kendaraan_merk" placeholder="Masukkan merk kendaraan" name="kendaraan_merk">
                                    <small id="kendaraan_merk" class="form-text text-muted">Contoh : DAIHATSU 2022. </small>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="kendaraan_tahun">Tahun</label>
                                    <input type="number" class="form-control" id="kendaraan_tahun" placeholder="Masukkan merk kendaraan" name="kendaraan_tahun">
                                    <small id="kendaraan_tahun" class="form-text text-muted">Contoh : DAIHATSU 2022. </small>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="kendaraan_harga_sewa">Harga Sewa</label>
                                    <input type="number" class="form-control" id="kendaraan_harga_sewa" placeholder="Masukkan merk kendaraan" name="kendaraan_harga_sewa">
                                    <small id="kendaraan_harga_sewa" class="form-text text-muted">Contoh : 200000 </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kendaraan_max_mil">Max Mil Kendaraan</label>
                                    <input type="number" class="form-control" id="kendaraan_max_mil" placeholder="Masukkan Max Mil kendaraan" name="kendaraan_max_mil">
                                    <small id="kendaraan_max_mil" class="form-text text-muted">Contoh : 100000 </small>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kendaraan_status">Status Penyewaan</label>
                                    <select id="kendaraan_status" class="form-control" name="kendaraan_status">
                                        <option selected disabled value="">Pilih Status Penyewaan</option>
                                        <option value="TERSEDIA">Tersedia</option>
                                        <option value="RENTAL">Dalam Penyewaan</option>
                                        <option value="KOSONG">Tidak Tersedia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kendaraan_tipe">Tipe Kendaraan</label>
                                    <select id="kendaraan_tipe" class="form-control" name="kendaraan_tipe">
                                        <option selected disabled value="">Pilih tipe kendaraan...</option>
                                        <option value="MOBIL">MOBIL</option>
                                        {{-- <option value="MOTOR">MOTOR</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kendaraan_kondisi">Kondisi </label>
                                    <select id="kendaraan_kondisi" class="form-control" name="kendaraan_kondisi">
                                        <option selected disabled value="">Pilih Kondisi kendaraan...</option>
                                        <option value="BAIK">BAIK</option>
                                        <option value="RUSAK">RUSAK</option>
                                        <option value="DALAM PERBAIKAN">DALAM PERBAIKAN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kendaraan_jenis_transmisi">Jenis Transmisi</label>
                                    <select id="kendaraan_jenis_transmisi" class="form-control" name="kendaraan_jenis_transmisi">
                                        <option selected disabled value="">Pilih jenis transmisi...</option>
                                        <option value="AUTOMATIC">AUTOMATIC</option>
                                        <option value="SEMI-AUTOMATIC">SEMI-AUTOMATIC</option>
                                        <option value="MANUAL">MANUAL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kendaraan_jenis_body">Body Kendaraan</label>
                                    <select id="kendaraan_jenis_body" class="form-control" name="kendaraan_jenis_body">
                                        <option selected disabled value="">Pilih jenis body...</option>
                                        <option value="COMPACT">Compact</option>
                                        <option value="CONVERTIBLE">Convertible</option>
                                        <option value="COUPLE">Couple</option>
                                        <option value="MVP">MVP</option>
                                        <option value="OFF-ROAD">Off-Road</option>
                                        <option value="SEDAN">Sedan</option>
                                        <option value="SEDANO">Sedano</option>
                                        <option value="STATION WAGON">Station Wagon</option>
                                        <option value="SUV">SUV</option>
                                        <option value="TRANSPORTER">Transporter</option>
                                        <option value="VAN">Van</option>
                                        <option value="LAINNYA">Lainnya...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="kendaraan_foto">Foto</label>
                                    <input type="file" class="form-control-file" id="kendaraan_foto" name="kendaraan_foto">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <textarea name="kendaraan_deskripsi" id="tambaheditor">
                                    Tuliskan deskripsi kendaraan...
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn gray btn-danger" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-info" >
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('datatables') }}/datatables.min.css">
    <style>
        .cke {
            visibility: visible !important;
        }
        .modal-backdrop.show {
            display: none !important;
        }
        .fix-text {
            font-size: 15px;
        }
        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 8px 10px!important;
            border-color: #d8d8d8!important;
            border-top-color: #d8d8d8!important;
            border-right-color: #d8d8d8!important;
            border-bottom-color: #d8d8d8!important;
            border-left-color: #d8d8d8!important;
            table-layout:fixed!important;
            white-space: nowrap!important;
        }
        .button-text-fix {
            font-size: 11px!important;
        }
        table.dataTable {
            color: rgb(0, 0, 0)!important;
        }
    </style>
@endpush

@section('content-body')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-data-table-makanan :makanan="$makanan" />
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
@endpush
