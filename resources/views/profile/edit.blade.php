@extends('layouts.frontend-master')

@section('contents')
<div class="container py-5">

    <h2 class="mb-4">My Profile</h2>

    {{-- UPDATE PROFILE INFORMATION --}}
    <div class="card mb-4">
        <div class="card-header">
            Update Profile Information
        </div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- UPDATE PASSWORD --}}
    <div class="card mb-4">
        <div class="card-header">
            Update Password
        </div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- DELETE USER --}}
    <div class="card mb-4">
        <div class="card-header">
            Delete Account
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</div>
@endsection
