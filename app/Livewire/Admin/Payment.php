<?php

namespace App\Livewire\Admin;

use App\Models\Payment as Fee;
use Livewire\Component;

class Payment extends Component
{

    public $payments;
    public $selectedPayment;
    public $receipt;
    public $amount;
    public $status;

    public $isModalOpen = false;

    public function mount()
    {
        // Fetch payments with related user data
        $this->payments = Fee::with('user')->get();
    }

    // Open the modal with the selected payment details
    public function openModal($paymentId)
    {
        $this->selectedPayment = Fee::find($paymentId);
        $this->isModalOpen = true;
    }

    // Close the modal
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset(['selectedPayment', 'receipt']);
    }

    // Update the payment details
    public function updatePayment()
    {
        if ($this->receipt) {
            // Store the uploaded receipt in the storage and get its path
            $this->receipt->storeAs('receipts', $this->receipt->getClientOriginalName(), 'public');
            $this->selectedPayment->receipt = 'receipts/' . $this->receipt->getClientOriginalName();
        }
        $this->selectedPayment->amount  = $this->amount;
      //  $this->selectedPayment->status  = $this->amount;
        // Save updated payment data
        $this->selectedPayment->save();

        // Close the modal and refresh the payments data
        $this->closeModal();
        $this->payments = Fee::with('user')->get();

        // Optionally, you can add a success message or session flash to confirm
        session()->flash('message', 'Payment updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.payment', [
            'payments' => $this->payments,
        ]);
    }
}
