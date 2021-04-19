<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\withpagination;
use App\Models\post;
class Filter extends Component
{
    use withpagination;
    public $serchTearm;
    public function render()
    {
        return view('livewire.filter',[
            'posts'=>post::where(function ($sub_query)
            {
                $sub_query::where('title','like','%'.$this
                        ->serchTearm.'%');

            })->paginate(3)
        ]);
    }
}
