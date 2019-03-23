<form action="{{ route('app.admin.acl.permissions.update', $permission) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="form-group">
        <label class="mr-1">Display Name</label>
        <input class="form-control form-control-sm mr-3" type="text" name="display_name"
            value="{{ $permission->display_name }}" required>
    </div>

    <div class="form-group">
        <label class="mr-1">Name</label>
        <input class="form-control form-control-sm mr-2" type="text" name="name" value="{{ $permission->name }}"
            required>
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label class="mr-1">Description</label>
        <input class="form-control form-control-sm mr-2" type="text" name="description"
            value="{{ $permission->description }}" required>
        @if ($errors->has('description'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Update</button>

</form>
