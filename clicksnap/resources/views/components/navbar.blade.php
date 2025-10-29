
<!------------------------------ desktop navbar ------------------------------>
<div class="hidden md:flex justify-between items-center mb-20">
  <div>
    <a style="font-family: 'Poppins', sans-serif;" class="text-md sm:text-3xl"
    href="{{ route('welcome') }}">ClickSnap</a>
  </div>
  <div class="flex justify-end items-center gap-3">
      <!--categories dropdow-->
      <div class="dropdown dropdown-center">
        <div tabindex="0" role="button" class="btn m-1 bg-base-100 border-0 btn-xs md:btn-md">Categories↓</div>
        <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
          <li><a>landscape</a></li>
          <li><a>nature</a></li>
          <li><a>architecture</a></li>
          <li><a>fashion</a></li>
        </ul>
      </div>
      <!-- -->
      <a href="#" class="text-xs">Help center</a>
     @guest
     <!-- Open the modal using ID.showModal() method -->
      <button class="btn btn-dash" onclick="my_modal_1.showModal()">signup or log in</button>
      <dialog id="my_modal_1" class="modal">
        <div class="modal-box border-1 border-gray-400">
          <!-- livewire class here -->
          <livewire:signup/>
          <div class="modal-action">
            <form method="dialog">
              <!-- if there is a button in form, it will close the modal -->
              <button class="btn">Cancel</button>
            </form>
          </div>
        </div>
      </dialog>
      @endguest 
     @auth
      <div class="dropdown dropdown-center">
        <div tabindex="0" role="button" class="btn m-1 brn-xs/6 text-sm/3 md:btn-md">account</div>
        <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">

          <li><a class="flex justify-between w-8/10">
            <p>pload pictures</p> 
            <x-fas-upload class="w-5"/>
          </a></li>

          <li><a href="{{ route('account') }}" class="flex justify-between w-8/10">
            <p>account</p> 
            <x-codicon-account class="w-5" />
          </a></li>

          <livewire:logout/>
        </ul>
      </div>
      @endauth
  </div>
</div>

<!----------------------------------phone navbar-------------------------------->

<div class="md:hidden flex justify-between items-center mb-12">
  <div>
    <a style="font-family: 'Poppins', sans-serif;" class="text-xl"
    href="{{ route('welcome') }}">ClickSnap</a>
  </div>

  <div class="flex items-center">
    @guest

      <!-- signup/login -->
      <button class="btn btn-dash btn-xs" onclick="my_modal_5.showModal()">login or sign up</button>
      <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">

        <div class="modal-box">

          <livewire:signup/>

          <div class="modal-action">
            <form method="dialog">
              <button class="btn">Close</button>
            </form>
          </div>

        </div>

      </dialog>

      <!-- menu -->
      <div class="drawer drawer-end">
        <input id="my-drawer-5" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
          <!-- Page content here -->
          <label for="my-drawer-5" class="drawer-button btn btn-ghost btn-xs"><x-css-menu /></label>
        </div>
        <div class="drawer-side">
          <label for="my-drawer-5" aria-label="close sidebar" class="drawer-overlay"></label>
          <ul class="menu bg-base-200 min-h-full w-80 p-4">
            <!-- Sidebar content here -->
            <li><label for="my-drawer-5" aria-label="close sidebar" 
            class="drawer-overlay btn">close menu</label></li>
            <li><a>Categories</a></li>
            <li><a>help center</a></li>
          </ul>
        </div>
      </div>
    @endguest
    @auth
      <a href="{{ route('upload') }}" wire:navigate class="btn btn-xs btn-dash border-success">upload <x-fas-upload class="w-2"/></a>

      <div class="drawer drawer-end">
        <input id="my-drawer-5" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
          <!-- replace with profile picture -->
          <label for="my-drawer-5" class="drawer-button btn btn-ghost btn-xs"><x-css-menu /></label>
        </div>
        <div class="drawer-side">
          <label for="my-drawer-5" aria-label="close sidebar" class="drawer-overlay"></label>
          <ul class="menu bg-base-200 min-h-full w-80 p-4">
            <!-- Sidebar content here -->

            <li><label for="my-drawer-5" aria-label="close sidebar" 
            class="drawer-overlay btn right-2"><x-css-close-o /></label></li>

          <li><a href="{{ route('upload') }}" wire:navigate>upload pictures</a></li>
          <li><a href="{{ route('account') }}" wire:navigate>account</a></li>
          <livewire:logout/>
          </ul>
        </div>
      </div>
    @endauth
  </div>
</div>