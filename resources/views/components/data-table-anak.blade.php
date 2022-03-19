<div>
    <div class="table-responsive">

        <table id="example1" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="">{{ $item->data_nama_lengkap }}</td>

                        <td style="width: 25%">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex mx-auto justify-content-center">

                                    <a class="btn btn-sm btn-info mr-1 rounded button-text-fix" href="#" data-toggle="modal" data-target="#modallihat{{ $item->id }}">
                                        <i class="fas fa-info-circle"></i>
                                        Lihat
                                    </a>

                                    <a class="btn btn-sm btn-primary mr-1 rounded button-text-fix" href="#" data-toggle="modal" data-target="#modalupdate{{ $item->id }}">
                                        <i class="fas fa-cog"></i>
                                        Ubah
                                    </a>

                                    <a href="#" class="btn btn-danger rounded btn-sm button-text-fix" data-toggle="modal" data-target="#modaldelete{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </a>

                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- MODAL LIHAT --}}
                    <div class="modal fade" id="modallihat{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Informasi Kendaraan : " NULL "</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4">
                                            <h5 class="fix-text">Merk </h5>
                                        </div>
                                        <div class="col-sm-8 col-md-8 col-lg-8">
                                            <h5 class="fix-text">: NULL </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn gray btn-info" data-dismiss="modal">TUTUP</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DELETE --}}
                    <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Tindakan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">Apakah anda yakin ingin menghapus Data ini? </div>
                                <form action="{{ route('admin-hapus-data-anak', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-footer">
                                        <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-outline-danger" >
                                            Delete
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- End MODAL DELETE --}}

                    {{-- MODAL UPDATE --}}
                    <div class="modal fade" id="modalupdate{{ $item->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Data Anak</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Silahkan ubah data Anak berikut. </div>
                                <form action="{{ route('admin-update-data-anak', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="container border-dark">

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="data_nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="data_nama_lengkap" placeholder="Masukkan merk kendaraan" name="data_nama_lengkap" value="{{ $item->data_nama_lengkap }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="data_nama_orang_tua">Nama Orang Tua (Ayah/Ibu/Wali)</label>
                                                    <input type="text" class="form-control" id="data_nama_orang_tua" placeholder="Masukkan merk kendaraan" name="data_nama_orang_tua" value="{{ $item->data_nama_orang_tua }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="data_jenis_kelamin">Jenis Kelamin</label>
                                                    <select id="data_jenis_kelamin" class="form-control" name="data_jenis_kelamin">
                                                        <option value="{{ $item->data_jenis_kelamin }}" selected>
                                                            @switch($item->data_jenis_kelamin)
                                                                @case("L")
                                                                    Laki - Laki
                                                                    @break
                                                                @case("P")
                                                                    Perempuan
                                                                    @break
                                                            @endswitch
                                                        </option>
                                                        <option value="L">Laki - Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="data_umur">Umur (Bulan)</label>
                                                    <input type="number" class="form-control" id="data_umur" placeholder="Masukkan merk kendaraan" name="data_umur" value="{{ $item->data_umur }}">
                                                    <small id="kendaraan_merk" class="form-text text-muted">Contoh : 22 (Bulan). </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="data_alamat_lengkap">Alamat</label>
                                                    <input type="text" class="form-control" id="data_alamat_lengkap" placeholder="Masukkan merk kendaraan" name="data_alamat_lengkap" value="{{ $item->data_alamat_lengkap }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="data_foto">Foto</label>
                                                    <input type="file" class="form-control-file" id="data_foto" name="data_foto">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn gray btn-danger" data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-info" >
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- End MODAL UPDATE --}}

                @endforeach

            </tbody>
        </table>

    </div>
</div>
