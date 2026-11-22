<section>
    <header>
        <h2 class="card-title">@lang('Delete Account')</h2>
        <p class="text-sm">
            @lang('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.')
        </p>
    </header>

    <button class="btn btn-error mt-4" onclick="confirm_user_deletion.showModal()">@lang('Delete Account')</button>

    <dialog id="confirm_user_deletion" class="modal" @if ($errors->userDeletion->isNotEmpty()) open @endif>
        <div class="modal-box">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h3 class="text-lg font-bold">@lang('Are you sure you want to delete your account?')</h3>
                <p class="text-sm">
                    @lang('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.')
                </p>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input name="password" type="password" placeholder="{{ __('Password') }}"
                        class="input w-full @error('password', 'userDeletion') input-error @enderror" />
                    @error('password', 'userDeletion')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="modal-action">
                    <button type="button" class="btn" onclick="confirm_user_deletion.close()">@lang('Cancel')</button>
                    <button class="btn btn-error">@lang('Delete Account')</button>
                </div>
            </form>
        </div>
    </dialog>
</section>
