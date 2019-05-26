<div class="tab-pane fade no-margin-last-paragraph" id="pills-organizations" role="tabpanel">

    @forelse ($user->organizations as $organization)

    <a href="{{ route('app.admin.organizations.show', $organization) }}" class="text-xl my-1 block">
        {{ $organization->name }}
    </a>

    @empty

    <p class="text-xl text-gray-darker">User not assigned to any organizations</p>

    @endforelse

    <hr>

    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUserToOrganization">
        Add to Organization
    </button>

</div>
