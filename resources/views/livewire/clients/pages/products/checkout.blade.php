<div>
    @section('title', 'Checkout')
    @livewire('clients.components.navbar')

    <div class="flex-wrap-reverse gap-10 p-4 mb-20 lg:flex sm:block">
        <div class="flex-auto p-4 mx-auto rounded-lg shadow-xl lg:w-96 sm:w-full bg-base-100">
            <h1 class="mt-2 mb-4 text-lg font-bold">Info Akun</h1>
            <div class="form">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Cari / Masukkan Email" class="w-full input input-bordered" />
                    {{-- <label class="label">
                      <span class="label-text-alt">Alt label</span>
                    </label> --}}
                    <span class="mt-2 mb-2 text-sm text-blue-400" role="button">Sync data</span>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input type="text" placeholder="Masukkan nama lengkap" class="w-full input input-bordered" />
                    {{-- <label class="label">
                      <span class="label-text-alt">Alt label</span>
                    </label> --}}
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">No HP</span>
                    </label>
                    <input type="text" placeholder="Masukkan no handpohne" class="w-full input input-bordered" />
                    {{-- <label class="label">
                      <span class="label-text-alt">Alt label</span>
                    </label> --}}
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Provinsi</span>
                    </label>
                    <select class="select select-bordered" wire:model='selectedProvinsi'>
                        <option value="" selected>Pilih</option>
                        @foreach ($data_provinsi['provinsi'] as $key => $item)
                            <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                        @endforeach
                    </select>
                    {{-- <label class="label">
                      <span class="label-text-alt">Alt label</span>
                    </label> --}}

                    <span class="mt-2" wire:loading wire:target='selectedProvinsi' class="text-sm">Loading ...</span>
                </div>

                @if (!is_null($selectedProvinsi))
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kota / Kabupaten</span>
                        </label>
                        <select class="select select-bordered" wire:model='selectedKota'>
                            <option value="" selected>Pilih</option>
                            @foreach ($data_kota['kota_kabupaten'] as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        {{-- <label class="label">
                        <span class="label-text-alt">Alt label</span>
                        </label> --}}

                        <span class="mt-2" wire:loading wire:target='selectedKota' class="text-sm">Loading ...</span>
                    </div>
                @endif

                @if (!is_null($selectedKota))
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kecamatan</span>
                        </label>
                        <select class="select select-bordered" wire:model='selectedKecamatan'>
                            <option value="" selected>Pilih</option>
                            @foreach ($data_kecamatan['kecamatan'] as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        {{-- <label class="label">
                        <span class="label-text-alt">Alt label</span>
                        </label> --}}

                        <span class="mt-2" wire:loading wire:target='selectedKecamatan' class="text-sm">Loading ...</span>
                    </div>
                @endif

                @if (!is_null($selectedKecamatan))
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kecamatan</span>
                        </label>
                        <select class="select select-bordered" wire:model='selectedKelurahan'>
                            <option value="" selected>Pilih</option>
                            @foreach ($data_kelurahan['kelurahan'] as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </select>
                        {{-- <label class="label">
                        <span class="label-text-alt">Alt label</span>
                        </label> --}}
                    </div>
                @endif


                 <div class="form-control">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea rows="4" placeholder="Masukkan alamat lengkap" class="w-full textarea textarea-bordered"></textarea>
                    {{-- <label class="label">
                      <span class="label-text-alt">Alt label</span>
                    </label> --}}
                </div>
            </div>
        </div>
        <div class="flex-auto p-4 mt-5 lg:mt-0">
            <h1 class="mt-2 mb-4 text-lg font-bold">Detail Keranjang</h1>
            <div class="overflow-x-auto">
                <table class="table w-full table-compact table-zebra">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pulpen Standard</td>
                            <td>5</td>
                            <td>10.000</td>
                        </tr>
                        <tr>
                            <td>Kacamata Minus Photocromic</td>
                            <td>2</td>
                            <td>50.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-10 mb-5 text-right">
                <h4>Discount : 10.000</h4>
                <h4>Ongkir : 7.000</h4>
                <h4>Subtotal : 57.000 </h4>
            </div>
            <button class="btn btn-block btn-primary">PAY</button>
        </div>
    </div>

    @include('livewire.clients.components.footer')
</div>
