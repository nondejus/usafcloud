@extends('app.users.layouts.layout')

@section('title', 'Account Settings')

@section('user-page-content')

<div class="container">

    <div class="row tw-justify-center tw-mt-10">

        <div class="col-md-8">

            <!-- General Info -->
            <form method="POST" enctype="multipart/form-data" class="tw-mb-8 tw-border tw-border-solid tw-p-8 tw-rounded tw-bg-white">

                <h3 class="tw-text-2xl tw-mb-6 tw-text-gray-900">General Info</h3>

                @csrf
                @method('PATCH')

                <div class="form-group row tw-mb-6">
                    <label for="first_name" class="col-sm-3 col-form-label tw-text-gray-700">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ auth()->user()->first_name }}" required>
                    </div>
                </div>

                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mb-6">
                    <label for="last_name" class="col-sm-3 col-form-label tw-text-gray-700">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ auth()->user()->last_name }}" required>
                    </div>
                </div>

                @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mb-6">
                    <label for="middle_name" class="col-sm-3 col-form-label tw-text-gray-700">Middle Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                            value="{{ auth()->user()->middle_name }}">
                    </div>
                </div>

                @error('middle_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mb-6">
                    <label for="nickname" class="col-sm-3 col-form-label tw-text-gray-700">Nickname</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nickname" name="nickname"
                            value="{{ auth()->user()->nickname }}">
                    </div>
                </div>

                @error('nickname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mb-6">
                    <label for="avatar" class="col-sm-3 col-form-label tw-text-gray-700">

                        @if($user->avatar)
                            Change Avatar
                        @else
                            Upload Avatar
                        @endif

                    </label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">Choose file</label>
                        </div>
                    </div>
                </div>

                @error('avatar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mt-6 mb-0">
                    <div class="col-sm-12 tw-flex tw-justify-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>

            <!-- Contact Info -->
            <form method="POST" action="{{ route('app.users.account.settings.contact-info.update') }}"
                class="tw-mb-8 tw-border tw-border-solid tw-p-8 tw-rounded tw-bg-white">

                <h3 class="tw-text-2xl tw-mb-6 tw-text-gray-900">Contact Info</h3>

                @csrf
                @method('PATCH')

                <div class="form-group row tw-mb-6">
                    <label for="cell_phone" class="col-sm-3 col-form-label tw-text-gray-700">Cell Phone</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" id="cell_phone" name="cell_phone"
                            value="{{ ($user->contact->cell_phone) ? $user->contact->cell_phone : old('cell_phone') }}">
                    </div>
                </div>

                @error('cell_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mb-6">
                    <label for="personal_email" class="col-sm-3 col-form-label tw-text-gray-700">Personal Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="personal_email" name="personal_email"
                            value="{{ $user->contact->personal_email }}">
                    </div>
                </div>

                @error('personal_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mt-6 tw-mb-0">
                    <div class="col-sm-12 tw-flex tw-justify-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>

            <!-- Demographics Info -->
            <form method="POST" action="{{ route('app.users.account.settings.demographics.update') }}"
                class="tw-mb-8 tw-border tw-border-solid tw-p-8 tw-rounded tw-bg-white">

                <h3 class="tw-text-2xl tw-mb-6 tw-text-gray-900">Demographics Info</h3>

                @csrf
                @method('PATCH')

                <!-- Gender -->
                <div class="form-group row tw-mb-6">
                    <label for="gender_id" class="col-sm-3 col-form-label tw-text-gray-700">Gender</label>

                    <div class="col-sm-9">

                        <select name="gender_id" id="gender_id" class="form-control">

                            @if(!$user->gender)
                                <option disabled selected value> -- select an option -- </option>
                            @endif

                            @foreach ($genders as $gender)

                                <option value="{{ $gender->id }}"

                                    @if ($user->gender)
                                        {{ ($user->gender->id === $gender->id) ? 'selected' : '' }}
                                    @endif

                                    >
                                    {{ $gender->title }}
                                </option>

                            @endforeach

                        </select>
                    </div>
                </div>

                @error('gender_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group row tw-mb-6 mb-0">
                    <div class="col-sm-12 tw-flex tw-justify-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>

            <!-- Military Info -->
            @if(auth()->user()->military)

                <form method="POST" action="{{ route('app.users.account.settings.military.update') }}"
                    class="tw-mb-8 tw-border tw-border-solid tw-p-8 tw-rounded tw-bg-white">

                    <h3 class="tw-text-2xl tw-mb-6 tw-text-gray-900">Military Info</h3>

                    @csrf
                    @method('PATCH')

                    <div class="form-group row tw-mb-6">
                        <label for="branch_id" class="col-sm-3 col-form-label tw-text-gray-700">Branch</label>
                        <div class="col-sm-9">
                            <select name="branch_id" id="branch_id" class="form-control">

                                @if(!$user->military->branch_id)
                                    <option>Select your branch of service</option>
                                @endif

                                @foreach ($branches as $branch)

                                    <option value="{{ $branch->id }}"
                                        {{ ($user->military->branch_id && $user->military->branch_id === $branch->id) ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    @error('branch_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group row tw-mb-6">
                        <label for="rank_id" class="col-sm-3 col-form-label tw-text-gray-700">Rank</label>
                        <div class="col-sm-9">
                            <select name="rank_id" id="rank_id" class="form-control">

                                @if(!$user->military->rank_id)
                                    <option>Select your military rank</option>
                                @endif

                                @foreach ($ranks as $rank)

                                    <option value="{{ $rank->id }}"
                                        {{ ($user->military->rank_id && $user->military->rank_id === $rank->id) ? 'selected' : '' }}>
                                        {{ $rank->name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    @error('rank_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group row tw-mb-6 mb-0">
                        <div class="col-sm-12 tw-flex justify-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>

            @endif

            <!-- Security Info -->
            <form method="POST" action="{{ route('app.users.account.settings.password.update') }}"
                class="tw-mb-8 tw-border tw-border-solid tw-p-8 tw-rounded tw-bg-white">

                <h3 class="tw-text-2xl tw-mb-6 tw-text-gray-900">Change Password</h3>

                @csrf
                @method('PATCH')

                <div class="form-group row tw-mb-6">
                    <label for="password" class="col-sm-3 col-form-label tw-text-gray-700">Current Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>

                <div class="form-group row tw-mb-6">
                    <label for="new_password" class="col-sm-3 col-form-label tw-text-gray-700">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="new_password" id="new_password" class="form-control">
                    </div>
                </div>

                <div class="form-group row tw-mb-6">
                    <label for="new_password_confirmation" class="col-sm-3 col-form-label tw-text-gray-700">
                        Retype New Password
                    </label>
                    <div class="col-sm-9">
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="form-control">
                    </div>
                </div>

                <div class="form-group row tw-mb-6 mb-0">
                    <div class="col-sm-12 tw-flex tw-justify-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>
@endsection
