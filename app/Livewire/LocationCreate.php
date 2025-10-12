<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\UserLocation;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Create Location')]
// #[Layout('components.layouts.app')]
class LocationCreate extends Component
{
    // public $countries = [];
    public Collection $countries;
    #[Validate('required|min:3', onUpdate: false)]
    public string $location_name = '';
    #[Validate('required', onUpdate: false)]
    public string $location_country = '';
    #[Validate('required', onUpdate: false)]
    public string $location_city = '';

    public Collection $cities;
    public string $savedLocationName = '';

    public function mount()
    {
        $this->countries = Country::all();
        $this->cities = collect([]);
    }
    public function updated($property)
    {
        if ($property == 'location_country') {
            $this->cities = City::where('country_id', $this->location_country)->get();
            $this->location_city = $this->cities->first()?->id;
        }
    }
    public function render()
    {
        return view('livewire.location-create');
    }

    public function createLocation(): void
    {
        // dd($this->all());
        // dd($this->getErrorBag()->all());
        // $this->validate();

        try {
            $this->validate();
        } catch (ValidationException $e) {
            dd($e->errors()); // shows validation errors
        }

        UserLocation::create([
            'location_name' => $this->location_name,
            'user_id' => auth()->id(),
            'country_id' => $this->location_country,
            'city_id' => $this->location_city,
        ]);
        $this->savedLocationName = $this->location_name;
        $this->reset('location_name', 'location_country', 'location_city');
        $this->cities = collect([]);

    }
}
