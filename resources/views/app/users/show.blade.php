@extends('app.layouts.base')

@section('title')
My Account
@endsection

@section('page-content')

<div class="row justify-content-center mt-5">

    <div class="col-md-2">

        <aside>
            <h3 class="uppercase text-grey text-xl">My Profile</h3>
            <ul class="nav flex-column mb-4 list-reset">
                <li class="nav-item">
                    <a href="#" class="nav-link text-grey-darkest text-base font-semibold hover:text-blue">General</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-grey-darkest text-base font-semibold hover:text-blue">Contact
                        Info</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-grey-darkest text-base font-semibold hover:text-blue">Settings</a>
                </li>
            </ul>
        </aside>

    </div>

    <div class="col-md-8">

        <!-- General -->
        <div class="card mb-4">

            <div class="card-header">General</div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')

                    <div class="flex">
                        <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                            class="mb-4 w-32 rounded-full">
                    </div>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $user->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $user->last_name }}">
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            value="{{ $user->middle_name }}">
                    </div>

                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input type="text" class="form-control" id="nickname" name="nickname"
                            value="{{ $user->nickname }}" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label for="">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="card">

            <div class="card-header">Contact Info</div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('app.users.contact-info.update', $user) }}">

                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="first_name">Cell Phone</label>
                        <input type="phone" class="form-control" id="cell_phone" name="cell_phone"
                            value="{{ $user->contact->cell_phone }}">
                    </div>

                    <div class="form-group">
                        <label for="first_name">Personal Email</label>
                        <input type="text" class="form-control" id="personal_email" name="personal_email"
                            value="{{ $user->contact->personal_email }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>

    </div>

</div>

@endsection
