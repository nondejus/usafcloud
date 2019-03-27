<div class="tab-pane fade no-margin-last-paragraph" id="pills-audit" role="tabpanel">
    <p>Created At: <span class="underline">{{ $user->created_at->diffForHumans() }}</span></p>
    <p>Updated At: <span class="underline">{{ $user->updated_at->diffForHumans() }}</span></p>
</div>
