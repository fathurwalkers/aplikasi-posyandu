<div>
    <div class="table-responsive">

        <table id="example1" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Makanan</th>
                    <th>Kilokalori</th>
                    <th>Karbohidrat</th>
                    <th>Lemak</th>
                    <th>Protein</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($makanan as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="">{{ $item->makanan_nama }}</td>
                        <td class="">{{ $item->makanan_kalori }}</td>
                        <td class="">{{ $item->makanan_karbohidrat }}</td>
                        <td class="">{{ $item->makanan_lemak }}</td>
                        <td class="">{{ $item->makanan_protein }}</td>

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
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title text-center py-0">Informasi Data Makanan : " {{ $item->makanan_nama }} "</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="container">
                                        <hr />
                                        <div class="row mb-4">
                                            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                                                <img src="{{ asset('default-img') }}/{{ $item->makanan_gambar }}" alt="" class="img img-thumbnail" width="35%">
                                            </div>
                                        </div>
                                        <hr />
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    <h5 class="fix-text">Nama Makanan</h5>
                                                    <h5 class="fix-text">Kalori</h5>
                                                    <h5 class="fix-text">Karbohidrat</h5>
                                                    <h5 class="fix-text">Lemak</h5>
                                                    <h5 class="fix-text">Protein</h5>
                                                </div>
                                                <div class="col-sm-8 col-md-8 col-lg-8">
                                                    <h5 class="fix-text">: {{ $item->makanan_nama }} </h5>
                                                    <h5 class="fix-text">: {{ $item->makanan_kalori }} Kilokalori </h5>
                                                    <h5 class="fix-text">: {{ $item->makanan_karbohidrat }} Gram </h5>
                                                    <h5 class="fix-text">: {{ $item->makanan_lemak }} Gram </h5>
                                                    <h5 class="fix-text">: {{ $item->makanan_protein }} Gram </h5>
                                                </div>
                                            </div>
                                        <hr />
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
                                <form action="{{ route('admin-hapus-data-makanan', $item->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <h4 class="modal-title">Ubah Data Makanan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Silahkan ubah data Makanan berikut. </div>
                                <form action="{{ route('admin-update-data-makanan', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="container border-dark">

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="makanan_nama">Nama Makanan</label>
                                                    <input type="text" class="form-control" id="makanan_nama" placeholder="Masukkan merk kendaraan" name="makanan_nama" value="{{ $item->makanan_nama }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="makanan_protein">Protein</label>
                                                    <input type="number" class="form-control" id="makanan_protein" placeholder="Masukkan merk kendaraan" name="makanan_protein" value="{{ $item->makanan_protein }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="makanan_kalori">Kilokalori</label>
                                                    <input type="number" class="form-control" id="makanan_kalori" placeholder="Masukkan merk kendaraan" name="makanan_kalori" value="{{ $item->makanan_kalori }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="makanan_karbohidrat">Karbohidrat</label>
                                                    <input type="number" class="form-control" id="makanan_karbohidrat" placeholder="Masukkan merk kendaraan" name="makanan_karbohidrat" value="{{ $item->makanan_karbohidrat }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="makanan_lemak">Lemak</label>
                                                    <input type="number" class="form-control" id="makanan_lemak" placeholder="Masukkan merk kendaraan" name="makanan_lemak" value="{{ $item->makanan_lemak }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="makanan_gambar">Gambar Makanan</label>
                                                    <input type="file" class="form-control-file" id="makanan_gambar" name="makanan_gambar">
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
