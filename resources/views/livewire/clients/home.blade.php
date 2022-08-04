<div>
    @section('title', 'Zami Ecommerce')
    @livewire('clients.components.navbar')
    <div class="px-5 py-5 mb-4">
        @livewire('clients.components.search')
    </div>
    @livewire('clients.components.product.lists')
    @include('livewire.clients.components.footer')
</div>
