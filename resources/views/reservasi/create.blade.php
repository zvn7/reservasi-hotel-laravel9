@extends('layouts.main')
@section('content')
<section class="section mt-5">
    <div class="page-heading">
        <div class="page-title mt-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add Reservasi</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reservasi List</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Reservasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Reservasi</h4>
                                <form class="form form-vertical" method="POST" action="{{ route('reservasi.store') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicSelect">Nama Pengunjung</label>
                                                    <select class="form-select @error('id_pengunjung') is-invalid @enderror" id="basicSelect" name="id_pengunjung">
                                                        <option value="">--- Nama Pengunjung ---</option>
                                                        @php
                                                            foreach ($pengunjungs as $pengunjung) {
                                                                echo '<option value="' . $pengunjung->id . '">' . $pengunjung->nama . '</option>';
                                                            }
                                                        @endphp
                                                    </select>
                                                    @error('id_pengunjung')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicSelect">Kamar</label>
                                                    <select class="form-select @error('id_kamar') is-invalid @enderror" id="basicSelect" name="id_kamar">
                                                        <option value="">--- Nama Kamar ---</option>
                                                        @php
                                                            foreach ($kamars as $kamar) {
                                                                echo '<option value="' . $kamar->id . '">' . $kamar->nomor_kamar . ' - ' . $kamar->tipe_kamar . ' - Rp.' . number_format($kamar->harga) . '</option>';
                                                            }
                                                        @endphp
                                                    </select>
                                                    @error('id_kamar')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="checkin-id-vertical">Checkin</label>
                                                    <input type="date" id="checkin-id-vertical" class="form-control @error('checkin') is-invalid @enderror" name="checkin" value="{{ old('checkin') }}">
                                                    @error('checkin')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="checkout-id-vertical">Checkout</label>
                                                    <input type="date" id="checkin-id-vertical" class="form-control @error('checkout') is-invalid @enderror" name="checkout" value="{{ old('checkout') }}">
                                                    @error('checkout')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status-info-vertical">Status Pembayaran</label>
                                                    <select class="form-select @error('status_pembayaran') is-invalid @enderror" id="status-info-vertical" name="status_pembayaran">
                                                        <option value="">--- Pilih Status ---</option>
                                                        <option value="1">Lunas</option>
                                                        <option value="0">Belum Lunas</option>
                                                    </select>
                                                    @error('status_pembayaran')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Notifikasi --}}
                                            <input type="hidden" id="fcmToken" class="form-control form-control-xl" value="AAAA05lw3R8:APA91bErlr6WcI2np1GxwaBXxYcam3j2TkObBUCRxgjO46q4qxP_MkFIlCHKjOdVJ3tGwEfml8qxYv23ifnep6LjQavRLFwQeqY7lG-r_6YjT6TuFVkKkixQWV32UwpmUgjxIKyE8byI">
                                            <input type="hidden" id="deviceToken" class="form-control form-control-xl" value="fnBh1dChTGqe6J5LZEffdR:APA91bFfPg9JJOWDyuI6lR19iGbXyaMX4z34KG7WZWW2kFzbkGvfw-wDpIzICJPP1b9qcqO-hw-u_SEtwBvVK1UrVoomcEXHDRlB0K9Gs4xExSwS9U4hi_5k3bMLIoK-WSSzyXPJSLiA">
                                            <input type="hidden" id="title" class="form-control form-control-xl" value="Hotel Reservation">
                                            <input type="hidden" id="content" class="form-control form-control-xl" value="{{ Auth::user()->nama_lengkap }} membuat reservasi">
                                            {{-- End Notifikasi --}}

                                            <div class="col-12 d-flex justify-content-start">
                                                <button type="submit" class="btn btn-primary me-1 mb-1" name="submit" onclick="sendNotification()">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
<script>
    let fcmToken = document.getElementById("fcmToken");
    let deviceToken = document.getElementById("deviceToken");
    let title = document.getElementById("title");
    let content = document.getElementById("content");

    function sendNotification() {
        const fcmServerKey = fcmToken.value;
        const fcmEndpoinnt = "https://fcm.googleapis.com/fcm/send";

        const message = {
            to: deviceToken.value,
            notification: {
                title: title.value,
                body: content.value,
            },
            data: {
                key1: "value1",
                key2: "value2",
            },
        };

        fetch(fcmEndpoinnt, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Authorization: "key=" + fcmServerKey,
            },
            body: JSON.stringify(message),
        })
    }
</script>
@endsection
