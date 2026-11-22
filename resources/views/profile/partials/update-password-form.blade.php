<section>
    <header>
        <h2 class="card-title">@lang('Update Password')</h2>
        <p class="text-sm">@lang('Ensure your account is using a long, random password to stay secure.')</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Current Password')</legend>
            <input name="current_password" type="password"
                class="input w-full @error('current_password', 'updatePassword') input-error @enderror" autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('New Password')</legend>
            <input name="password" type="password"
                class="input w-full @error('password', 'updatePassword') input-error @enderror" autocomplete="new-password" />
            @error('password', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Confirm Password')</legend>
            <input name="password_confirmation" type="password"
                class="input w-full @error('password_confirmation', 'updatePassword') input-error @enderror" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <div class="flex items-center gap-4 mt-4">
            <button class="btn btn-primary">@lang('Save')</button>

            @if (session('status') === 'password-updated')
                <p class="text-success">@lang('Saved.')</p>
            @endif
        </div>
    </form>
</section>
