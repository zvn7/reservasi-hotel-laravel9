@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<section class="section mt-5">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Dashboard') }}</h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2><i class="bi bi-calendar"></i> Total Reservations</h2>
                            <h1>{{ $totalReservations }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2><i class="bi bi-calendar-check"></i> Upcoming Reservations</h2>
                            <h1>{{ $upcomingReservations }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2><i class="bi bi-calendar-check"></i> Completed Reservations</h2>
                            <h1>{{ $completedReservations }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent Reservations</h2>
                        </div>
                        <div class="card-body">
                            @if($recentReservations->count() > 0)
                                <ul class="list-group">
                                    @foreach($recentReservations as $reservasi)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $reservasi->nama_pengunjung }} - {{ $reservasi->nomor_kamar }} - {{ $reservasi->tanggal_checkin }} - {{ $reservasi->tanggal_checkout }}
                                            <a href="{{ route('reservasi.show', $reservasi->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No recent reservations found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
