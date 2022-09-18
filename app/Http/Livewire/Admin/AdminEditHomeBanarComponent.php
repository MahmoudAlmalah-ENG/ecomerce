<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banar1;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;

class AdminEditHomeBanarComponent extends Component
{
    public $link1;
    public $image1;
    public $status1;
    public $newimage1;
    public $banar_id;

    public function mount($banar_id)
    {
        $slider1 = Banar1::find($banar_id);
        $this->link1 = $slider1->link1;
        $this->image1 = $slider1->image1;
        $this->status1 = $slider1->status1;
        $this->banar_id = $slider1->id;
    }

    public function updateBanar()
    {
        $slider1 = HomeSlider::find($this->slider_id);
        $slider1->link = $this->link1;
        if($this->newimage1)
        {
            $imagename1 = Carbon::now()->timestamp. '.' . $this->newimage1->extension();
            $this->newimage1->storeAs('sliders1',$imagename1);
            $slider1->image1 = $imagename1;
        }
        $slider1->status1 = $this->status1;
        $slider1->save();
        session()->flash('message1','Slide has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-banar-component');
    }
}
