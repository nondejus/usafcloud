<div class="card">
    <div class="card-header">
        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addPermissionToRole">
            Add Permission
        </button>
    </div>
    <div class="card-body">
        @forelse ($role->permissions as $permission)
        <span class="badge badge-secondary font-light p-2 mb-1">{{ $permission->name }}</span>
        @empty
        No Permissions Attached
        @endforelse
    </div>
</div>
