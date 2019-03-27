<div class="tab-pane fade no-margin-last-paragraph" id="pills-gsuite" role="tabpanel">

    <p>Enabled: <span class="underline">{{ ($user->gsuite_user) ? 'Yes' : 'No' }}</span></p>

    @if($user->gsuite_user)

    <p>Email: <span class="underline">{{ $user->gsuite_email }}</span></p>
    <p>Account Created At: <span class="underline">{{ $user->gsuite_created_at }}</span></p>
    <p>Account Finished Provisioning: <span
            class="underline">{{ ($user->gsuite_finished_provisioning) ? 'Yes' : 'No' }}</span></p>

    @endif

</div>
