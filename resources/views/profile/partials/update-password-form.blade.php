<div class="card-body">
    <h2 class="card-title text-lg font-medium text-gray-900">
        {{ __('Perbarui Kata Sandi') }}
    </h2>

    <p class="card-text mt-1 text-sm text-gray-600">
        {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.') }}
    </p>

    <form method="post" action="{{ route('password.update') }}" class="mt-4 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" />
            <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mb-3 d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        </div>
    </form>
</div>
