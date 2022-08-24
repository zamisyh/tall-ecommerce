<div>
    @section('title', 'Admin Home')

    <div class="drawer-content" x-data="{ drawer: false }">

        @livewire('admin.components.navbar')
        @include('livewire.admin.components.drawer')


       <div class="px-5" :class="{ 'lg:mx-80 lg:p-5': drawer }">
          Home Admin
       </div>

    </div>
</div>
