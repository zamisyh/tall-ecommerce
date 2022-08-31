<div>
    @section('title', 'Signin')
    @livewire('clients.components.navbar')

    @auth
        <script>
            window.location.href='/dashboard'
        </script>
    @endauth

    <div class="flex justify-center mt-10 mb-5">
        <div class="shadow-xl card w-96 bg-base-100 ">
            <div class="card-body">
                <h2 class="text-xl card-title">Zami Shop | Signup Pages</h2>

                @if ($openFormNext)
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">First Name <span class="text-error">*</span></span>
                        </label>
                        <input type="text" wire:model.lazy='first_name' placeholder="Masukkan nama depan" class="input input-bordered @error('first_name')
                            input-error
                        @enderror">
                        @error('first_name')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Last Name <span class="text-error">*</span></span>
                        </label>
                        <input type="text" wire:model.lazy='last_name' placeholder="Masukkan nama belakang" class="input input-bordered @error('last_name')
                            input-error
                        @enderror">
                        @error('last_name')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Jenis Kelamin <span class="text-error">*</span></span>
                        </label>
                        <select name="gender" id="gender" wire:model='gender' class="select select-bordered @error('gender')
                            select-error
                        @enderror">
                            <option value="" selected>Pilih</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                        @error('gender')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">No Hp <span class="text-error">*</span></span>
                        </label>
                        <input type="number" wire:model.lazy='no_hp' placeholder="Masukkan no handphone" class="input input-bordered @error('no_hp')
                            input-error
                        @enderror">
                        @error('no_hp')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Alamat <span class="text-error">*</span></span>
                        </label>
                        <textarea placeholder="Masukkan alamat lengkap" rows="3" wire:model.lazy='address' class="textarea textarea-bordered @error('address')
                            textarea-error
                        @enderror"></textarea>
                        @error('address')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                @else
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Name <span class="text-error">*</span></span>
                        </label>
                        <input wire:model.lazy='name' type='name' placeholder="Masukan nama" class="input input-bordered @error('name')
                            input-error
                        @enderror" />
                        @error('name')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email <span class="text-error">*</span></span>
                        </label>
                        <input wire:model.lazy='email' type='email' placeholder="Masukan email" class="input input-bordered @error('email')
                            input-error
                        @enderror" />
                        @error('email')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password <span class="text-error">*</span></span>
                        </label>
                        <input wire:model.lazy='password' type='password' placeholder="Masukan password" class="input input-bordered @error('password')
                            input-error
                        @enderror" />
                        @error('password')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Confirm Password <span class="text-error">*</span></span>
                        </label>
                        <input wire:model.lazy='confirm_password' type='password' placeholder="Konfirmasi password" class="input input-bordered @error('confirm_password')
                            input-error
                        @enderror" />
                        @error('confirm_password')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <div class="mt-2 form-control">
                    <a href="{{ route('client.auth.signin') }}" class="text-sm text-blue-500" role="button">Already have an account ?</a>
                </div>
                <div class="card-actions">
                    @if ($openFormNext)
                        <div class="flex justify-between gap-5">
                            <button class="btn btn-primary" wire:click='$set("openFormNext", false)'>Previous</button>
                            <button wire:loading.remove class="btn btn-primary" wire:click='signup'>Signup</button>
                            <button wire:loading class="btn btn-primary" wire:target='signup' disabled>Loading ...</button>

                        </div>
                    @else
                        <button class="btn btn-primary btn-block" wire:click='$set("openFormNext", true)'>Next</button>
                    @endif
                </div>
            </>
        </div>
    </div>
</div>
