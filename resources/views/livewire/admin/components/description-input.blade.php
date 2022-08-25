<div wire:ignore>
    <div class="form-control">
        <label class="label">
            <span class="label-text">Description <span class="text-error">*</span></span>
        </label>
        <textarea wire:model='description' name="description" id="description" rows="4" class="textarea textarea-bordered @error('description')
            textarea-error
        @enderror" placeholder="Masukkan deksripsi product"></textarea>
        @error('description')
            <span class="text-error">{{ $message }}</span>
        @enderror
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</div>
