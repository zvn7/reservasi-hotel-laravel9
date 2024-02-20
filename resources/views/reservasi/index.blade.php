@extends('layouts.main')


@section('content')
<section class="section mt-5">
    <div class="page-heading">
        <div class="page-title mt-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Reservasi</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reservasi List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">
                    List reservasi
                </h3>
                <a href="{{ route('reservasi.create') }}" class="btn icon icon-left btn-primary"><i data-feather="edit"></i> Reservasi</a>
            </div>
            <div class="mt-2">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover" id="table">
                    <thead>
                        <tr>
                            <th width="10px">#</th>
                            <th width="170px">Tanggal Reservasi</th>
                            <th>Nama Pengunjung</th>
                            <th>Nomor Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                            <th width="140px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @forelse ($reservasis as $reservasi)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $reservasi->created_at }}</td>
                                <td>{{ $reservasi->nama }}</td>
                                <td>{{ $reservasi->nomor_kamar }}</td>
                                <td>{{ $reservasi->tipe_kamar }}</td>
                                <td style="text-align: right">Rp.{{ number_format($reservasi->total_harga) }}</td>
                                <td>
                                    @php
                                        if ($reservasi->status_pembayaran == 0) {
                                            echo '<span class="badge bg-danger">Belum Lunas</span>';
                                        } else {
                                            echo '<span class="badge bg-success">Lunas</span>';
                                        }
                                        // echo $reservasi->status_pembayaran == 0 ? "belum_lunas" : "lunas"
                                    @endphp
                                </td>
                                <td>
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                        <a href="{{ route('reservasi.show', $reservasi->id) }}" class="btn btn-icon btn-info text-white">Detail</a>
                                        <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-icon btn-warning text-white">Edit</a>
                                        <a href="{{ route('reservasi.invoice', $reservasi->id) }}" class="btn btn-icon btn-light">Cetak</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
