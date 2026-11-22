<section>
    <header>
        <h2 class="card-title">@lang('Profile Information')</h2>
        <p class="text-sm">@lang("Update your account's profile information and email address.")</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Name')</legend>
            <input name="name" value="{{ old('name', $user->name) }}" type="text"
                class="input w-full @error('name') input-error @enderror" required autofocus autocomplete="name" />
            @error('name')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Email')</legend>
            <input name="email" value="{{ old('email', $user->email) }}" type="email"
                class="input w-full @error('email') input-error @enderror" required autocomplete="username" />
            @error('email')
                <p class="label text-error">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="label">
                    @lang('Your email address is unverified.')
                    <button form="send-verification" class="btn btn-link btn-sm">
                        @lang('Click here to re-send the verification email.')
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="label text-success">
                        @lang('A new verification link has been sent to your email address.')
                    </p>
                @endif
            @endif
        </fieldset>

        <div class="flex items-center gap-4 mt-4">
            <button class="btn btn-primary">@lang('Save')</button>

            @if (session('status') === 'profile-updated')
                <p class="text-success">@lang('Saved.')</p>
            @endif
        </div>
    </form>
</section>
