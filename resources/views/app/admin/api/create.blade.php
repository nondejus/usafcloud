@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card tw-mb-8">

    <div class="card-header tw-flex tw-justify-between tw-items-center">
        <span class="tw-text-2xl">Create New OAuth Application</span>
    </div>

    <form action="{{ route('app.admin.api.index') }}" method="POST" enctype="multipart/form-data">

        <div class="card-body">

            @csrf

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">App Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" required>
                    <small id="name_help" class="form-text text-muted">
                        Required. A name your users will recognize and trust.
                    </small>

                    @error('name')
                        @include('components.error')
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">App Description</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="description" name="description" required>
                    <small id="description_help" class="form-text text-muted">
                        Required. A short description of what your app is and why the user should approve it.
                    </small>

                    @error('description')
                        @include('components.error')
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="homepage_url" class="col-sm-3 col-form-label">Homepage Url</label>
                <div class="col-sm-9">
                    <input type="url" class="form-control" id="homepage_url" name="homepage_url">
                    <small id="homepage_url_help" class="form-text text-muted">
                        Required. The url to your application homepage, so users can easily access your app from thier
                        dashboard.
                    </small>

                    @error('homepage_url')
                        @include('components.error')
                    @enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="redirect" class="col-sm-3 col-form-label">Redirect Url</label>
                <div class="col-sm-9">
                    <input type="url" class="form-control" id="redirect" name="redirect">
                    <small id="redirect_help" class="form-text text-muted">
                        Required. The redirect URL is where the user will be redirected after approving or denying a
                        request for authorization.
                    </small>

                    @error('redirect')
                        @include('components.error')
                    @enderror

                </div>
            </div>

            <div class="form-group row mb-0">
                <label for="avatar" class="col-sm-3 col-form-label">App Avatar</label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                        <label class="custom-file-label" for="avatar">Choose image</label>
                    </div>
                    <small id="avatar_help" class="form-text text-muted">
                        Optional. Choose a avatar that your users will recognize.
                    </small>

                    @error('avatar')
                        @include('components.error')
                    @enderror

                </div>
            </div>

        </div>

        <div class="card-footer tw-flex tw-justify-end">
            <a href="{{ route('app.admin.api.index') }}" class="btn btn-outline-secondary tw-mr-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Create App</button>
        </div>

    </form>

</div>

@endsection
