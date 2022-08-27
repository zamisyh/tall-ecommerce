<div>
    @section('title', 'Checkout')
    @livewire('clients.components.navbar')

    @section('css')
        <link rel="stylesheet" href="{{ asset('library/select2/select2.min.css') }}">
    @endsection
    @section('js')
        <script src="{{ asset('library/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('library/select2/select2.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });

            $('#tujuan').on('change', function() {
                @this.destination = $(this).val();
            })
            $('#asal').on('change', function() {
                @this.origin = $(this).val();
            })
            $('#kurir').on('change', function() {
                @this.courier = $(this).val();
            })
        </script>


    @endsection

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
                        @foreach ($data['data_provinsi']['data'] as $key => $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
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
                            @foreach ($data_kota['data']['regencies'] as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
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
                            @foreach ($data_kecamatan['data']['districts'] as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
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
                            <span class="label-text">Kelurahan</span>
                        </label>
                        <select class="select select-bordered" wire:model='selectedKelurahan'>
                            <option value="" selected>Pilih</option>
                            @foreach ($data_kelurahan['data']['villages'] as $key => $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
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
            <div class="mt-5 mb-3">
                <h3 class="font-bold">Paketnya mau dikirim kemana ?</h3>
                <div wire:ignore>
                    <div class="mt-3 form-control">
                        <label class="label">
                            <span class="label-text">Kurir</span>
                        </label>

                        <select wire:model='courier' name="kurir" id="kurir" class="select select-bordered js-example-basic-single">
                            <option value="" selected>Pilih</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS Indonesia</option>
                            <option value="tiki">Tiki</option>
                        </select>
                    </div>
                    <div class="mt-3 form-control">
                        <label class="label">
                            <span class="label-text">Asal Pengiriman</span>
                        </label>
                        <select wire:model='origin' name="asal" id="asal" class="select select-bordered js-example-basic-single">
                            <option value="" selected>Pilih</option>
                            @foreach ($data['data_provinsi_ongkir']['rajaongkir']['results'] as $item)
                                <option value="{{ $item['city_id'] }}">
                                    @if ($item['type'] === 'Kabupaten')
                                        [KAB]
                                    @else
                                        [KOTA]
                                    @endif
                                    {{ $item['city_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3 form-control">
                        <label class="label">
                            <span class="label-text">Tujuan Pengiriman</span>
                        </label>
                        <select wire:model='destination' name="tujuan" id="tujuan" class="select select-bordered js-example-basic-single">
                            <option value="" selected>Pilih</option>
                            @foreach ($data['data_provinsi_ongkir']['rajaongkir']['results'] as $item)
                                <option value="{{ $item['city_id'] }}">
                                    @if ($item['type'] === 'Kabupaten')
                                        [KAB]
                                    @else
                                        [KOTA]
                                    @endif
                                    {{ $item['city_name'] }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <h3 class="mt-3 font-bold">Calculate Ongkir</h3>
                @if ($openCost)
                   <ul>
                    @foreach ($data['data_cost']['rajaongkir']['results'] as $item)
                        @foreach ($item['costs'] as $cost)
                            <li class="mt-2 mb-3">
                                <input type="radio" wire:model='ongkir' name="radio-2" class="radio" value="{{ $cost['cost'][0]['value'] }}" />
                                <span class="ml-4">
                                    [{{ $cost['service'] }}] [{{ $cost['description'] }}] [ {{ $cost['cost'][0]['etd'] }} Hari] [Rp. {{ number_format($cost['cost'][0]['value']) }}]
                                </span>
                            </li>
                        @endforeach
                    @endforeach
                   </ul>
                   <span wire:loading wire:target='ongkir'>Calculating ...</span>
                   <span>{{ $ongkir }}</span>
                @else
                    Pilih kurir, asal dan tujuan pengiriman terlebih dahulu
                @endif

            </div>
            <div class="mt-10 mb-5 text-right">
                <h4>Discount : 10.000</h4>
                <h4>Ongkir : 7.000</h4>
                <h4>Subtotal : 57.000 </h4>
            </div>
            @if ($isConfirmCheckout)
                <button wire:click="$emit('payment', '{{ $snapToken }}')" class="btn btn-primary btn-block">PAY</button>
                <script>
                    window.livewire.on('payment', function (snapToken) {
                        snap.pay(snapToken, {
                            // Optional
                            onSuccess: function (result) {
                               console.log(snapToken)
                            },
                            // Optional
                            onPending: function (result) {
                                location.reload();
                            },
                            // Optional
                            onError: function (result) {
                                location.reload();
                            }
                        });
                    });
                </script>
            @else
                <button wire:loading.remove class="btn btn-block btn-primary" {{ $openCost ? '' : 'disabled' }} wire:click='checkout'>Konfirmasi Pesanan</button>
                <button wire:loading wire:target='checkout' class="btn btn-block btn-primary" disabled>Loading ...</button>
            @endif
        </div>
    </div>

    @include('livewire.clients.components.footer')
</div>
