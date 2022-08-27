<div class="modal modal-bottom sm:modal-middle">
    <div class="relative modal-box">
        <label for="my-modal-6" class="absolute btn btn-sm btn-circle right-2 top-2">✕</label>
        <h3 class="text-lg font-bold">Keranjang Anda</h3>
        <p class="py-4">
            <div class="mt-2 mb-3 shadow-md card card-side bg-base-100">
                <div class="card-body">
                   @foreach ($cart as $item)
                    <div class="cart">
                        <h2 class="card-title">{{ $item->name }}</h2>
                        <h4 class="mb-3 font-bold card-description">Harga : {{ number_format($item->price) }}</h4>
                        <div class="flex gap-4">
                            <div>
                                <select class="" wire:model='size.{{ $item->rowId }}'>
                                    <option value="" selected>-- Ukuran --</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="xxl">XXL</option>
                                </select>
                            </div>
                            <div>
                                <button wire:click='decrement("{{ $item->rowId }}")' class="btn btn-ghost">-</button>
                                <span wire:model='qty'>{{ $item->qty }}</span>
                                <button wire:click='increment("{{ $item->rowId }}")' class="btn btn-ghost">+</button>
                            </div>
                        </div>
                        <div class="mt-3 description">
                            <textarea rows="2" class="w-full textarea textarea-bordered" placeholder="(Opsional) Masukkan detail produk yang ingin anda pesan ..."></textarea>
                        </div>
                        <div>
                            <h4 class="flex justify-end mt-4 font-bold card-description">Total : Rp. {{ number_format($item->subtotal) }}</h4>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </p>

        @if (Cart::count() > 0)
            <div class="mt-5 mb-3 total">
                <h1 class="font-bold">Total Harga : Rp. {{ Cart::total() }}</h1>
            </div>
        @endif

        <div class="modal-action">
            <a href="{{ route('client.product.checkout') }}" for="my-modal-6" class="btn">Checkout</a>
        </div>
    </div>
</div>
