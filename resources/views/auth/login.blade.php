@extends('layouts.auth')

@section('content')
<div class="row h-100 justify-content-center align-items-center" style="margin-top: 100px">
    <div class="col-lg-5 col-12">
        <div class="card text-center shadow-lg">
            <div class="card-body">
                <h1 class="auth-title">{{ __('Login') }}</h1>
                <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    {{-- Notifikasi --}}
                    <input type="hidden" id="fcmToken" class="form-control form-control-xl" value="AAAA05lw3R8:APA91bErlr6WcI2np1GxwaBXxYcam3j2TkObBUCRxgjO46q4qxP_MkFIlCHKjOdVJ3tGwEfml8qxYv23ifnep6LjQavRLFwQeqY7lG-r_6YjT6TuFVkKkixQWV32UwpmUgjxIKyE8byI">
                    <input type="hidden" id="deviceToken" class="form-control form-control-xl" value="fnBh1dChTGqe6J5LZEffdR:APA91bFfPg9JJOWDyuI6lR19iGbXyaMX4z34KG7WZWW2kFzbkGvfw-wDpIzICJPP1b9qcqO-hw-u_SEtwBvVK1UrVoomcEXHDRlB0K9Gs4xExSwS9U4hi_5k3bMLIoK-WSSzyXPJSLiA">
                    <input type="hidden" id="title" class="form-control form-control-xl" value="Hotel Reservation">
                    <input type="hidden" id="content" class="form-control form-control-xl" value="Seseorang login di dashboard Reservasi">
                    {{-- End Notifikasi --}}
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" onclick="sendNotification()">{{ __('Login') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
