<?php


namespace App\Livewire\Admin;

use App\Models\Prescription as Pres;
use Livewire\Component;

class Prescription extends Component
{
    public $prescriptions;
    public $isModalOpen = false;
    public $treatment;
    public $medicine;
    public $prescription_id;

    public function mount()
    {

        $this->prescriptions = Pres::with('appointment')->get();
    }


    public function openModal($prescription_id)
    {
        $prescription = Pres::find($prescription_id);


        if ($prescription) {
            $this->prescription_id = $prescription->id;
            $this->treatment = $prescription->treatment;
            $this->medicine = $prescription->medicine;
        }

        $this->isModalOpen = true;
    }


    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetForm();
    }


    public function updatePrescription()
    {

        $this->validate([
            'treatment' => 'required|string|max:255',
            'medicine' => 'required|string|max:255',
        ]);


        $prescription = Pres::find($this->prescription_id);
        if ($prescription) {
            $prescription->update([
                'treatment' => $this->treatment,
                'medicine' => $this->medicine,
            ]);
        }


        $this->closeModal();
        $this->mount();

        session()->flash('message', 'Prescription updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.prescription');
    }


    private function resetForm()
    {
        $this->treatment = '';
        $this->medicine = '';
        $this->prescription_id = null;
    }
}

