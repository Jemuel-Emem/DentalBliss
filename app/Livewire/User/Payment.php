<?php

namespace App\Livewire\User;

use App\Models\payment as Fee;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Payment extends Component
{
    use WithFileUploads;

    public $payments;
    public $amount;
    public $reference_number;
    public $method;
    public $selectedPayment;
    public $receipt;
    public $isModalOpen = false;

    public function mount()
    {

      $this->payments = Fee::where('appointment_id', Auth::id())->get();
    }


    public function openModal($paymentId)
    {
        $this->selectedPayment = Fee::find($paymentId);

        $payment = fee::find($paymentId);
        $this->amount = $payment->amount;
        $this->method = $payment->method;
        $this->reference_number = $payment->reference_number;
        $this->receipt = $payment->receipt;
        $this->isModalOpen = true;
    }


    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset(['selectedPayment', 'receipt']);
    }

   public function updatePayment()
    {
        // Check if receipt is being updated
        if ($this->receipt instanceof \Illuminate\Http\UploadedFile) {
            // Store the file and update the receipt path
            $filename = $this->receipt->getClientOriginalName();
            $this->receipt->storeAs('receipts', $filename, 'public');
            $this->selectedPayment->receipt = 'receipts/' . $filename;
        }

        // Update other payment details
        $this->selectedPayment->amount = $this->amount;
        $this->selectedPayment->method = $this->method;
        $this->selectedPayment->reference_number = $this->reference_number;

        $this->selectedPayment->save();

        $this->closeModal();
        $this->payments = Fee::where('appointment_id', auth()->id())->get();

        session()->flash('message', 'Payment updated successfully!');
    }


    public function render()
    {
        return view('livewire.user.payment');
    }
}
