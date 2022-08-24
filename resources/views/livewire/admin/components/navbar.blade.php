<div>
    <div class="mb-2 shadow-lg navbar bg-neutral text-neutral-content">
        <div class="flex-none lg:flex">
          <input id="my-drawer" type="checkbox" class="drawer-toggle">
          <label for="my-drawer" @click="drawer = !drawer" class="btn btn-square btn-ghost drawer-button">
            <svg x-show="!drawer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg x-show="drawer" style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
            </svg>
          </label>
        </div>
        <div class="flex-1 px-2 mx-2 lg:flex">
          <span class="text-lg font-bold">
                Zami E-Shop
          </span>
        </div>
        <div class="flex-none">
          <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
          </button>
        </div>
        <div class="flex-none dropdown dropdown-left" x-data="{ nav : false }">
          <button class="btn btn-square btn-ghost" @click="nav = !nav">
            <div class="avatar">
                <div class="w-10 h-10 m-1 rounded-full">
                    <img class="text-white" src="{{ asset('avatar.svg') }}">
                </div>
              </div>
          </button>
          <ul x-show="nav" tabindex="0" class="p-2 mt-20 text-black shadow menu dropdown-content bg-base-100 rounded-box w-52">
            <li>
              <a wire:click='$set("isLogout", true)'>Logout</a>
            </li>
          </ul>
        </div>
      </div>

      @if ($isLogout)
        {{ Auth::logout() }}
        <script>
            window.location.href="{{ route('client.auth.signin') }}"
        </script>
      @endif
</div>
