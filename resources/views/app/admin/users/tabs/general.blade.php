<div class="tab-pane fade show active no-margin-last-paragraph" id="pills-general" role="tabpanel">

    <p>First Name: <span class="underline">{{ $user->first_name }}</span></p>
    <p>Last Name: <span class="underline">{{ $user->last_name }}</span></p>
    <p>Middle Name: <span class="underline">{{ $user->middle_name }}</span></p>
    <p>Nickname: <span class="underline">{{ $user->nickname }}</span></p>
    <p>Email Address:
        <span class="underline">
            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </span>
    </p>

</div>
