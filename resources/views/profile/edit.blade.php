@extends('layouts.template_default')
@section('title', 'Halaman Profile')
@section('content')

@include('sweetalert::alert')

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="card mt-5">
                    @include('profile.partials.update-password-form')
                </div>

            </div>
        </div>
    </div>


@endsection
