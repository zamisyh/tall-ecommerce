<div class="mt-5 mb-3">
    <h3 class="font-bold">Paketnya mau dikirim kemana ?</h3>
    <div wire:ignore>
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
        Opened cost form
    @else
        Pilih asal dan tujuan pengiriman terlebih dahulu
    @endif

</div>
