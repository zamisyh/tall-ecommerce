<div class="sticky inset-x-0 top-0 z-50 navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown" x-data="{ dropdown: false }">
            <label tabindex="0" class="btn btn-ghost btn-circle" @click="dropdown = !dropdown">
                <svg x-show="!dropdown" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                <svg x-show="dropdown" class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                </svg>
            </label>
            <ul x-show="dropdown" tabindex="0" class="p-2 mt-3 shadow-xl menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                <li><a>Homepage</a></li>
                <li><a>Portfolio</a></li>
                <li><a>About</a></li>
            </ul>
        </div>
    </div>
    <div class="navbar-center">
      <a class="text-xl normal-case btn btn-ghost">Z-Store</a>
    </div>
    <div class="navbar-end">
        <label for="my-modal-6" tabindex="0" class="btn btn-ghost btn-circle modal-button">
            <div class="indicator">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
              <span class="badge badge-sm indicator-item" data-theme="dark">8</span>
            </div>
        </label>
        <input type="checkbox" id="my-modal-6" class="modal-toggle" />
        @include('livewire.clients.components.product.cart.modal')
        <div class="dropdown dropdown-end" x-data="{ dropdownAuth: false }">
            <label tabindex="0" class="btn btn-ghost btn-circle" @click="dropdownAuth = !dropdownAuth">
                <svg class="w-6 h-6" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z" />
                </svg>
            </label>
            <ul x-show="dropdownAuth" tabindex="0" class="p-2 mt-3 shadow-lg menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                <li>
                    <a>Login</a>
                </li>
                <li>
                    <a>Register</a>
                </li>
                @auth
                    <li>
                        <a>Pesanan Saya</a>
                    </li>
                    <li>
                        <a>Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
