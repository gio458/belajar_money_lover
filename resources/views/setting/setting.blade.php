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

            <div class="profile-photo-wrapper">
                <div class="profile-photo">
                    <i class="fa fa-user"></i>
                </div>

                <button class="btn-primary">Change Photo</button>
            </div>

            <label>Username</label>
            <input type="text" class="input-box">

            <label>Email</label>
            <input type="email" class="input-box">

            <button class="btn-primary save-btn">Save Changes</button>
        </div>

        <!-- Security Box -->
        <div class="setting-card">
            <h3>Security</h3>

            <div class="security-icon">
                <i class="fa fa-lock"></i>
            </div>

            <label>Current Password</label>
            <input type="password" class="input-box">

            <label>New Password</label>
            <input type="password" class="input-box">

            <label>Confirm Password</label>
            <input type="password" class="input-box">

            <button class="btn-primary save-btn">Update Password</button>
        </div>

    </div>

</div>

@endsection
