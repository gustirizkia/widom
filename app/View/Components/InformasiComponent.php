<?php

namespace App\View\Components;

use App\Models\Informasi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InformasiComponent extends Component
{
    public $tag = null;

    public function __construct($tag = null)
    {
        $this->tag = $tag;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $informasi = Informasi::query();

        if ($this->tag) {
            $informasi->where("tag", "like", "%$this->tag%");
        }

        return view('components.informasi-component', [
            'informasi' => $informasi->limit(6)->get()
        ]);
    }
}
