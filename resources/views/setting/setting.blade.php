@extends('layouts.app')

@section('page_title_main', '')
@section('page_title_blue', 'Setting')
@section('page_description', 'Manage your profile and security settings.')

@section('content')

<div class="setting-wrapper">
    <div class="setting-grid">

        <!-- Profile Box -->
        <div class="setting-card">
            <h3>Profile</h3>

            <form method="POST" action="{{ route('setting.profile') }}" enctype="multipart/form-data">
                @csrf

                <div class="profile-photo-wrapper">
                    <div class="profile-photo">
                        @if(auth()->user()->photo)
                            <img src="{{ asset('storage/'.auth()->user()->photo) }}">
                        @else
                            <i class="fa fa-user"></i>
                        @endif
                    </div>

                    <input type="file" name="photo" id="photoInput" hidden>
                    <button type="button" class="btn-primary"
                        onclick="document.getElementById('photoInput').click()">
                        Change Photo
                    </button>
                </div>

                <label>Username</label>
                <input type="text" name="name" class="input-box"
                       value="{{ auth()->user()->name }}" required>

                <label>Email</label>
                <input type="email" name="email" class="input-box"
                       value="{{ auth()->user()->email }}" required>

                <button type="submit" class="btn-primary save-btn">
                    Save Changes
                </button>
            </form>
        </div>

                <!-- Security Box -->
        <div class="setting-card">
            <h3>Security</h3>

            <form method="POST" action="{{ route('setting.password') }}">
                @csrf

                <div class="security-icon">
                    <i class="fa fa-lock"></i>
                </div>

                <label>Current Password</label>
                <input type="password" name="current_password" class="input-box" required>

                <label>New Password</label>
                <input type="password" name="password" class="input-box" required>

                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="input-box" required>

                <button type="submit" class="btn-primary save-btn">
                    Update Password
                </button>
            </form>
        </div>

    </div>
</div>

@endsection

