<div>
    @section('title', 'Detail Product')
    @livewire('clients.components.navbar')
    <div class="px-5 py-5 mb-4">
        <div class="product-detail">
            <figure>
                <img loading="lazy" src="{{ asset('images/products/rachit-tank-2cFZ_FB08UM-unsplash.jpg') }}" alt="" class="w-full h-full bg-repeat rounded-xl" />
            </figure>
            <h2 class="mt-3 mb-4 text-xl font-bold">Jam Tangan Smart Watch 2022</h2>
            <h4 class="mt-5 mb-3 text-md">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, recusandae fugiat, vel itaque iste blanditiis corporis unde quisquam veritatis ullam, vitae tempore fugit! Provident, cum!
            </h4>
            <div class="mt-2 mb-2">
                <button class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
    @include('livewire.clients.components.footer')
</div>
