<div>
    @if ($photo)
        <img src="{{ $photo->temporaryUrl() }}" class="img-fluid mb-3">
    @endif

    <input type="file" wire:model="photo" class="form-control" name="image[]">
    <div wire:loading wire:target="photo">Uploading...</div>
</div>
