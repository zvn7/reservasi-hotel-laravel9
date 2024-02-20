@extends('layouts.main')
@section('content')
<section class="section mt-5">
    <div class="page-heading">
        <div class="page-title mt-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Reservasi</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reservasi List</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Reservasi</li>
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
                                <h4 class="card-title">Edit Reservasi</h4>
                                <form class="form form-vertical" method="POST" action="{{ route('reservasi.update-payment-status', $reservasi->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="status-info-vertical">Status Pembayaran</label>
                                                <select class="form-select @error('status_pembayaran') is-invalid @enderror" id="status-info-vertical" name="status_pembayaran">
                                                    <option value="1" {{ $reservasi->status_pembayaran == 1 ? 'selected' : '' }}>Lunas</option>
                                                    <option value="0" {{ $reservasi->status_pembayaran == 0 ? 'selected' : '' }}>Belum Lunas</option>
                                                </select>
                                                @error('status_pembayaran')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Update Payment Status</button>
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
