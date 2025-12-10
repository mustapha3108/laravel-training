<?php

use Livewire\Component;
use App\Models\Anouncement;

new class extends Component
{
    public $announcement;
    public $an;

    public function mount(){
        $this->announcement = Anouncement::findOrFail(1);
    }

    public function announce(){
        $this->announcement->announcement = $this->an;
        $this->announcement->save();
        $this->dispatch('done');
    }

    public function delan(){
        $this->announcement->announcement = '';
        $this->announcement->save();
        $this->dispatch('done');
    }
};
?>

<div class="flex flex-col flex-wrap gap-3 justify-center items-center mt-8">
    
    <form wire:submit='announce' class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
        <div class="join w-full">
            <input type="text" class="input join-item" placeholder="10% off on Black Friday" wire:model='an'/>
            <button type="submit" class="btn btn-outline btn-primary join-item">save</button>
        </div>
    </form>

    <div class="divider">OR</div>

    <button class="btn btn-wide btn-error btn-outline" wire:click='delan'>
        delete announcement
    </button>

    <div class="divider"></div>

    <div>
        <h1 class='text-xl mb-4'>current announcement:</h1>
        <p class="text-primary"> {{ $announcement->announcement }} </p>
        @if ($announcement->announcement == '')
            <p class="text-error"> no announcements yet </p>
        @endif
    </div>

    <div x-on:Done.window='my_modal_5.showModal()'></div>

    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
      <div class="modal-box">

        <div class="flex flex-col justify-center items-center gap-8">
            <svg class="size-25 fill-success"
                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                <g><rect fill="none" height="24" width="24" y="0"/></g><g><g><g><polygon points="2,22 16,17 7,8"/><path d="M14.53,12.53L21,6.05l1.48,1.48l1.06-1.06L21,3.93l-7.53,7.53L14.53,12.53z"/><path d="M10.94,6L9.47,7.47l1.06,1.06l2.54-2.54l-2.54-2.53L9.47,4.53L10.94,6z"/><path d="M18.97,9.97l-3.5,3.5l1.06,1.06L19,12.06l2.5,2.49l1.06-1.06L18.97,9.97z"/><path d="M15.97,4.97l-4.5,4.5l1.06,1.06L18.07,5l-3.53-3.53l-1.06,1.06L15.97,4.97z"/></g></g></g></svg>
            <h3 class="text-lg font-bold">operation successful</h3>
        </div>

        <div class="modal-action">
          <form method="dialog">
            <button class="btn">Close</button>
          </form>
        </div>
      </div>
    </dialog>

</div>