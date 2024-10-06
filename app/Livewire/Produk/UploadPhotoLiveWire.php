<?php

namespace App\Livewire\Produk;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhotoLiveWire extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $photo;

    public function render()
    {
        return view('livewire.produk.upload-photo-live-wire');
    }
}
