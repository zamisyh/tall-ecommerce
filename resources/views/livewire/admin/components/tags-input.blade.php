<div>
    <div class="form-control" wire:ignore>
        <label class="label">
            <span class="label-text">Tags <span class="text-error">*</span></span>
        </label>
        <select wire:model='tag' name="tag" id="tag" multiple="multiple" class="select select-bordered @error('tag')
            select-error
        @enderror">
            <option value="" selected>Pilih</option>
            @foreach ($data_tag as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('tag')
            <span class="text-error">{{ $message }}</span>
        @enderror
    </div>
    <script>
        $('#tag').select2({
            theme: "classic"
        });

        $('#tag').on('change', function() {
            @this.tag = $(this).val();
        })
    </script>
</div>
