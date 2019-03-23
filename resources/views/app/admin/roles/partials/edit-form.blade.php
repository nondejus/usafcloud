<form action="{{ route('app.admin.acl.roles.update', $role) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="form-group">
        <label class="mr-1">Display Name</label>
        <input class="form-control form-control-sm mr-3" type="text" name="display_name"
            value="{{ $role->display_name }}" required>
    </div>

    <div class="form-group">
        <label class="mr-1">Name</label>
        <input class="form-control form-control-sm mr-2" type="text" name="name" value="{{ $role->name }}" required>
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label class="mr-1">Description</label>
        <input class="form-control form-control-sm mr-2" type="text" name="description" value="{{ $role->description }}"
            required>
        @if ($errors->has('description'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Update</button>

</form>
