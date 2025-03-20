<div class="card-body">
    <h2 class="card-title text-lg font-medium text-gray-900">
        {{ __('Informasi Profil') }}
    </h2>

    <p class="card-text mt-1 text-sm text-gray-600">
        {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
    </p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="mt-4">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nama')" />
                    <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="tempat_tanggal_lahir" :value="__('Tempat & Tanggal Lahir')" />
                    <x-text-input id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" type="text" class="form-control" :value="old('tempat_tanggal_lahir', $user->tempat_tanggal_lahir)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('tempat_tanggal_lahir')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                        <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="pendidikan_terakhir" :value="__('Pendidikan Terakhir')" />
                    <x-text-input id="pendidikan_terakhir" name="pendidikan_terakhir" type="text" class="form-control" :value="old('pendidikan_terakhir', $user->pendidikan_terakhir)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('pendidikan_terakhir')" />
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <div class="mb-3">
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <x-text-input id="alamat" name="alamat" type="text" class="form-control" :value="old('alamat', $user->alamat)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="no_hp" :value="__('Nomor Telepon')" />
                    <x-text-input id="no_hp" name="no_hp" type="text" class="form-control" :value="old('no_hp', $user->no_hp)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="nama_ayah" :value="__('Nama Ayah')" />
                    <x-text-input id="nama_ayah" name="nama_ayah" type="text" class="form-control" :value="old('nama_ayah', $user->nama_ayah)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_ayah')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="pekerjaan_ayah" :value="__('Pekerjaan Ayah')" />
                    <x-text-input id="pekerjaan_ayah" name="pekerjaan_ayah" type="text" class="form-control" :value="old('pekerjaan_ayah', $user->pekerjaan_ayah)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ayah')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="nama_ibu" :value="__('Nama Ibu')" />
                    <x-text-input id="nama_ibu" name="nama_ibu" type="text" class="form-control" :value="old('nama_ibu', $user->nama_ibu)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_ibu')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="pekerjaan_ibu" :value="__('Pekerjaan Ibu')" />
                    <x-text-input id="pekerjaan_ibu" name="pekerjaan_ibu" type="text" class="form-control" :value="old('pekerjaan_ibu', $user->pekerjaan_ibu)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_ibu')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="nama_wali" :value="__('Nama Wali')" />
                    <x-text-input id="nama_wali" name="nama_wali" type="text" class="form-control" :value="old('nama_wali', $user->nama_wali)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('nama_wali')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="pekerjaan_wali" :value="__('Pekerjaan Wali')" />
                    <x-text-input id="pekerjaan_wali" name="pekerjaan_wali" type="text" class="form-control" :value="old('pekerjaan_wali', $user->pekerjaan_wali)" required />
                    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan_wali')" />
                </div>
            </div>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        </div>
    </form>
</div>
