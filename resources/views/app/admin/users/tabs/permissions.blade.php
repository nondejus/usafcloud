<div class="tab-pane fade no-margin-last-paragraph" id="pills-permissions" role="tabpanel">
    <p>
        Stand Alone Permissions:
        @forelse ($user->permissions as $permission)
        <span class="badge badge-secondary">{{ $permission->name }}</span>
        @empty
        @endforelse
    </p>
</div>
