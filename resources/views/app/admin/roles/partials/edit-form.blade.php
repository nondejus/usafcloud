<form action="{{ route('app.admin.acl.roles.update', $role) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="form-group">
        <label class="tw-mr-1">Display Name</label>
        <input class="form-control form-control-sm tw-mr-3" type="text" name="display_name"
            value="{{ $role->display_name }}" required>
        
        @error('display_name')
            @include('components.error')
        @enderror

    </div>

    <div class="form-group">
        <label class="tw-mr-1">Name</label>
        <input class="form-control form-control-sm tw-mr-2" type="text" name="name" value="{{ $role->name }}" required>
        
        @error('name')
            @include('components.error')
        @enderror

    </div>

    <div class="form-group">
        <label class="tw-mr-1">Description</label>
        <input class="form-control form-control-sm tw-mr-2" type="text" name="description" value="{{ $role->description }}"
            required>
        
        @error('description')
            @include('components.error')
        @enderror

    </div>

    <button type="submit" class="btn btn-primary btn-sm">Update</button>

</form>
