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
                <h2 class="text-xl card-title">Zami Shop | Signin Pages</h2>
                @if (session()->has('message'))
                    <div class="mb-3 alert alert-warning">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="form-control">
                    <input wire:model.lazy='email' type='text' placeholder="Masukan email" class="input input-bordered @error('email')
                        input-error
                    @enderror" />
                    @error('email')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-5 form-control">
                    <input wire:model.lazy='password' type='password' placeholder="Masukan password" class="input input-bordered @error('password')
                        input-error
                    @enderror" />
                    @error('password')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2 form-control">
                    <a href="{{ route('client.auth.signup') }}" class="text-sm text-blue-500" role="button">Don't have any Account ?</a>
                </div>
                <div class="card-actions">
                    <button class="btn btn-primary btn-block" wire:click='signin'>Signin</button>
                </div>
            </>
        </div>
    </div>
</div>
