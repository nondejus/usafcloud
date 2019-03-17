@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">Manage Organizations</span>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNewOrganizationModal">
                Create Organzation
            </button>
        </div>
    </div>

    <div class="p-4 border-b border-grey-light border-solid">
        <input type="text" placeholder="Search organizations..." class="form-control">
    </div>

    <div class="card-body">

        ...

    </div>

</div>

<!-- Create New Organization Modal -->
<div class="modal fade" id="createNewOrganizationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

@endsection
