@extends('app.users.layouts.layout')

@section('title')
Account Settings
@endsection

@section('user-page-content')

<div class="container">
    <div class="row justify-content-center mt-5">

        <div class="col-md-8">

            <!-- General Info -->
            <form method="POST" enctype="multipart/form-data" class="mb-5 border border-solid p-4 rounded bg-white">

                <h3 class="text-lg mb-4 text-grey-darker">General Info</h3>

                @csrf
                @method('PATCH')

                <div class="form-group row mb-4">
                    <label for="first_name" class="col-sm-3 col-form-label text-grey-dark">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ auth()->user()->first_name }}">
                    </div>
                </div>

                <div class="form-group row my-4">
                    <label for="last_name" class="col-sm-3 col-form-label text-grey-dark">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ auth()->user()->last_name }}">
                    </div>
                </div>

                <div class="form-group row my-4">
                    <label for="middle_name" class="col-sm-3 col-form-label text-grey-dark">Middle Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            value="{{ auth()->user()->middle_name }}">
                    </div>
                </div>

                <div class="form-group row my-4">
                    <label for="nickname" class="col-sm-3 col-form-label text-grey-dark">Nickname</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nickname" name="nickname"
                            value="{{ auth()->user()->nickname }}">
                    </div>
                </div>

                <div class="form-group row my-4">
                    <label for="avatar" class="col-sm-3 col-form-label text-grey-dark">Avatar</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-4 mb-0">
                    <div class="col-sm-12 flex justify-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>

            <!-- Contact Info -->
            <form method="POST" enctype="multipart/form-data" class="mb-5 border border-solid p-4 rounded bg-white">

                <h3 class="text-lg mb-4 text-grey-darker">Contact Info</h3>

                @csrf
                @method('PATCH')

                <div class="form-group row mb-4">
                    <label for="cell_phone" class="col-sm-3 col-form-label text-grey-dark">Cell Phone</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" id="cell_phone" name="cell_phone"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ auth()->user()->contact->cell_phone }}">
                    </div>
                </div>

                <div class="form-group row my-4">
                    <label for="personal_email" class="col-sm-3 col-form-label text-grey-dark">Personal Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="personal_email" name="personal_email"
                            value="{{ auth()->user()->contact->personal_email }}">
                    </div>
                </div>

                <div class="form-group row mt-4 mb-0">
                    <div class="col-sm-12 flex justify-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>
@endsection
