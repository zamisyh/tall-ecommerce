<div class="modal modal-bottom sm:modal-middle">
    <div class="relative modal-box">
        <label for="my-modal-6" class="absolute btn btn-sm btn-circle right-2 top-2">✕</label>
        <h3 class="text-lg font-bold">Keranjang Anda</h3>
        <p class="py-4">
            <div class="mt-2 mb-3 shadow-md card card-side bg-base-100">
                <div class="card-body">
                    <h2 class="card-title">Baju Training/Running N8 (GRS)</h2>
                    <h4 class="mb-3 font-bold card-description">Harga : Rp. 100,000</h4>
                    <div class="flex gap-4">
                        <div>
                            <select class="">
                                <option value="" selected>-- Ukuran --</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                            </select>
                        </div>
                        <div>
                            <select class="">
                                <option value="" selected>-- Qty --</option>
                                @for ($i = 1; $i <= 50; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="mt-3 description">
                        <textarea rows="2" class="w-full textarea textarea-bordered" placeholder="(Opsional) Masukkan detail produk yang ingin anda pesan ..."></textarea>
                    </div>
                    <div>
                        <h4 class="flex justify-end mt-4 font-bold card-description">Total : Rp. 150,000</h4>
                    </div>
                </div>
            </div>
        </p>
        <div class="modal-action">
            <label for="my-modal-6" class="btn">Bayar</label>
        </div>
    </div>
</div>
