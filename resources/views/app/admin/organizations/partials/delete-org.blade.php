<div class="card-footer">
    <form action="{{ route('app.admin.organizations.destroy', $organization) }}" method="post">
        @csrf
        @method('DELETE')
        <click-confirm placement="right" yes-class="btn btn-sm btn-danger m-1 px-3"
            no-class="btn btn-sm btn-secondary m-1 px-3">
            <button type="submit" class="btn btn-outline-danger btn-sm">Delete Organization</button>
        </click-confirm>
    </form>
</div>
