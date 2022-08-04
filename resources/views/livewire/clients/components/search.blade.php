<div>
    <div class="flex justify-between">
        <div class="search">
            <input type="text" class="input input-bordered" placeholder="Cari Produk ... ">
        </div>
        <div class="filter">
            <div>
                <select class="select select-bordered">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
    </div>
    <div class="flex justify-between mt-3 mb-5" x-data="{ dropdownFilter: false }">
        <div class="dropdown dropdown-right">
            <label @click="dropdownFilter = !dropdownFilter" tabindex="0" class="btn">Filter <svg xmlns="http://www.w3.org/2000/svg" class="ml-1" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
              </svg></label>
            <ul x-show="dropdownFilter" tabindex="0" class="p-2 shadow dropdown-content menu bg-base-100 rounded-box w-52">
                <div @click="dropdownFilter = false">
                    <li>
                        <a>Latest (DESC)</a>
                    </li>
                    <li>
                        <a>Oldest (ASC)</a>
                    </li>
                    <li @click="$wire.openCategory()">
                        <a>Kategori</a>
                    </li>
                    <li @click="$wire.openTanggal()">
                        <a>Tanggal</a>
                    </li>
                </div>
            </ul>
        </div>
        <div>
            @if ($category)
                <select class="select select-bordered">
                    <option value="" selected>-- Pilih Kategori --</option>
                    <option value="Baju">Baju</option>
                    <option value="Celana">Celana</option>
                    <option value="Pakaian Dalam">Pakaian Dalam</option>
                    <option value="Elektronik">Elektronik</option>
                </select>
            @endif
        </div>
    </div>

    @if ($tanggal)
        <div class="mb-5">
            <input type="date" class="input input-bordered"> to <input type="date" class="input input-bordered">
        </div>
    @endif
</div>
