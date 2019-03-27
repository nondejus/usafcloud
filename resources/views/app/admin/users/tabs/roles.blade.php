<div class="tab-pane fade no-margin-last-paragraph" id="pills-roles" role="tabpanel">
    <p>
        Roles:
        @forelse ($user->roles as $role)
        <span class="badge badge-secondary">{{ $role->name }}</span>
        @empty
        @endforelse
    </p>
</div>
