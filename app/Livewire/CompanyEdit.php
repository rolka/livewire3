<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CompanyEdit extends Component
{
    public Collection $countries;
    public Collection $cities;
    public Company $company;

    #[Validate('required|min:3', onUpdate: false)]
    public string $name = '';

    #[Validate('required', onUpdate: false)]
    public string $country = '';

    #[Validate('required', onUpdate: false)]
    public string $city = '';

    public string $savedName = '';

    public function mount(Company $company): void
    {
        $this->name = $company->name;
        $this->country = $company->country_id;
        $this->cities = City::where('country_id', $this->country)->get();
        $this->city = $company->city_id;
        $this->countries = Country::all();
    }

    public function updated($property): void
    {
        if ($property == 'country') {
            $this->cities = City::where('country_id', $this->country)->get();
            $this->city = $this->cities->first()->id;
        }
    }

    public function render(): View
    {
        return view('livewire.company-edit')->title('Edit Company ' . $this->name);
    }

    public function save(): void
    {
        $this->validate();
        $this->company->update([
            'name' => $this->name,
            'country_id' => $this->country,
            'city_id' => $this->city,
        ]);
        $this->savedName = $this->name;
    }

}
