<div class="tab-pane fade no-margin-last-paragraph" id="pills-actions" role="tabpanel">

    <form action="{{ route('app.admin.users.destroy', $user) }}" method="POST">

        @csrf

        @method('DELETE')

        <click-confirm placement="right" yes-class="btn btn-sm btn-danger m-1 px-3"
            no-class="btn btn-sm btn-secondary m-1 px-3">
            <button type="submit" class="btn btn-outline-danger btn-sm">Delete
                User</button>
        </click-confirm>
    </form>

</div>
