@extends('app.admin.layout.base')

@section('admin-page-content')

<div class="card">

    <div class="card-header flex justify-content-between align-items-center">
        <span class="text-xl">{{ $organization->name }}</span>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserToOrganizationModal">
                Add Member to Organization
            </button>
        </div>
    </div>

    <div class="card-body">

        ...

    </div>

</div>

<!-- Create New Organization Modal -->
<div class="modal fade" id="addUserToOrganizationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Member to Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                ...
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>

            </form>
        </div>
    </div>
</div>

@endsection
