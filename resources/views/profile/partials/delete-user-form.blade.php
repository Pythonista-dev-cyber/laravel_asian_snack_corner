<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    {{-- Replace x-danger-button with Bootstrap --}}
    <button
        class="btn btn-danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        Delete Account
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
            </p>

            <div class="mt-4">
                {{-- KEEP your input components if you want, or replace with Bootstrap --}}
                <label for="password" class="form-label">{{ __('Password') }}</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control w-75"
                    placeholder="Password"
                >

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-4 d-flex justify-content-end">
                {{-- Cancel button --}}
                <button
                    type="button"
                    class="btn btn-secondary"
                    x-on:click="$dispatch('close')"
                >
                    Cancel
                </button>

                {{-- Delete confirm --}}
                <button type="submit" class="btn btn-danger ms-3">
                    Delete Account
                </button>
            </div>
        </form>
    </x-modal>
</section>
