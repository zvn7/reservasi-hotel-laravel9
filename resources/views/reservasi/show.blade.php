@extends('layouts.main')
@section('content')
<section class="section mt-5">
    <div class="page-heading">
        <div class="page-title mt-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Reservasi</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('reservasi.index') }}">Reservasi List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Reservasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Reservasi</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Karyawan</label>
                                <input type="text" id="name" class="form-control" value="{{ $reservasi->nama_lengkap }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_reservasi">Tanggal Reservasi</label>
                                <input type="text" id="tanggal_reservasi" class="form-control" value="{{ $reservasi->created_at }}" disabled>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Pengunjung</label>
                                <input type="text" id="name" class="form-control" value="{{ $reservasi->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" value="{{ $reservasi->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telepon</label>
                                <input type="text" id="phone" class="form-control" value="{{ $reservasi->telepon }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" id="address" class="form-control" value="{{ $reservasi->alamat }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checkin">Checkin</label>
                                <input type="text" id="checkin" class="form-control" value="{{ $reservasi->tanggal_checkin }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checkout">Checkout</label>
                                <input type="text" id="checkout" class="form-control" value="{{ $reservasi->tanggal_checkout }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_kamar">Nomor Kamar</label>
                                <input type="text" id="nomor_kamar" class="form-control" value="{{ $reservasi->nomor_kamar }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipe_kamar">Tipe Kamar</label>
                                <input type="text" id="tipe_kamar" class="form-control" value="{{ $reservasi->tipe_kamar }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" id="total_harga" class="form-control" value="{{ number_format($reservasi->harga) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" id="total_harga" class="form-control" value="{{ number_format($reservasi->total_harga) }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status Pembayaran</label>
                                @php
                                    if ($reservasi->status_pembayaran == 0) {
                                        echo '<span class="badge bg-danger">Belum Lunas</span>';
                                    } else {
                                        echo '<span class="badge bg-success">Lunas</span>';
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <p class="btn btn-primary">
                    <i class="bi bi-arrow-left-square-fill"></i>
                    <a href="{{ route('reservasi.index') }}" class="text-white"> Back to Reservasi</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
