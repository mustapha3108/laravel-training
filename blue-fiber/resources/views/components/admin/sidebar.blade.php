<div class="drawer lg:drawer-open" >

  <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />

    <div class="drawer-content">

        <div class="fixed bottom-4 right-4 z-50">
            <label for="my-drawer-4" aria-label="open sidebar" class="lg:hidden btn btn-circle btn-dash flex justify-center items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M9 4v16"></path><path d="M14 10l2 2l-2 2"></path></svg>
            </label>
        </div>

        {{ $slot }}
    </div>

    <div class="drawer-side is-drawer-close:overflow-visible">

        <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>

        <div class="flex min-h-full flex-col items-start bg-base-200 is-drawer-close:w-18 is-drawer-open:w-64"> <!-- svg size + 10 -->

            <ul class="menu w-full grow"  >

                <li class="mb-2">
                  <x-malink route='admin' current="bg-neutral" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="Homepage">
                    <svg class="size-8 fill-white" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                        <g><rect fill="none" height="24" width="24"/></g><g><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z"/></g></svg>
                    <span class="is-drawer-close:hidden">Homepage</span>
                    </x-malink>
                </li>
            
                <li class="mb-2">
                  <x-malink route='upload' current="bg-neutral" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="upload products">
                    <svg class="size-8 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z"/></svg>
                    <span class="is-drawer-close:hidden">Upload products</span>
                  </x-malink>
                </li>

                <li class="mb-2">
                  <x-malink route='update' current="bg-neutral" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="update products">
                    <svg class="size-8 fill-white" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                      <g><rect fill="none" height="24" width="24"/></g><g><g><path d="M11,8v5l4.25,2.52l0.77-1.28l-3.52-2.09V8H11z M21,10V3l-2.64,2.64C16.74,4.01,14.49,3,12,3c-4.97,0-9,4.03-9,9 s4.03,9,9,9s9-4.03,9-9h-2c0,3.86-3.14,7-7,7s-7-3.14-7-7s3.14-7,7-7c1.93,0,3.68,0.79,4.95,2.05L14,10H21z"/></g></g></svg>
                    <span class="is-drawer-close:hidden">Update products</span>
                  </x-malink>
                </li>

                <li class="mb-2">
                  <x-malink route='announce' current="bg-neutral" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="make an announcement">
                    <svg class="size-8 fill-white" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                      <g><rect fill="none" height="24" width="24"/></g><path d="M18,11c0,0.67,0,1.33,0,2c1.2,0,2.76,0,4,0c0-0.67,0-1.33,0-2C20.76,11,19.2,11,18,11z"/><path d="M16,17.61c0.96,0.71,2.21,1.65,3.2,2.39c0.4-0.53,0.8-1.07,1.2-1.6c-0.99-0.74-2.24-1.68-3.2-2.4 C16.8,16.54,16.4,17.08,16,17.61z"/><path d="M20.4,5.6C20,5.07,19.6,4.53,19.2,4c-0.99,0.74-2.24,1.68-3.2,2.4c0.4,0.53,0.8,1.07,1.2,1.6 C18.16,7.28,19.41,6.35,20.4,5.6z"/><path d="M8,9H2v6h3v4h2v-4h1l5,3V6L8,9z"/><path d="M15.5,12c0-1.33-0.58-2.53-1.5-3.35v6.69C14.92,14.53,15.5,13.33,15.5,12z"/></svg>
                    <span class="is-drawer-close:hidden">Make an announcement</span>
                  </x-malink>
                </li>

                <li class="mb-2">
                  <x-malink route='orders' current="bg-neutral" class="is-drawer-close:tooltip is-drawer-close:tooltip-right" data-tip="view orders">
                    <svg class="size-8 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 8h-3V4H1v13h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm13.5-8.5l1.96 2.5H17V9.5h2.5zM18 18c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/></svg>
                    <span class="is-drawer-close:hidden">View Orders</span>
                  </x-malink>
                </li>


                <li class="mb-20  mt-auto">

                    <label for="my-drawer-4" aria-label="open sidebar" class="btn btn-square btn-ghost is-drawer-close:tooltip is-drawer-close:tooltip-right w-full flex justify-center items-center" data-tip="toggle sidebar">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-8"><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M9 4v16"></path><path d="M14 10l2 2l-2 2"></path></svg>
                    </label>

                </li>

            </ul>

        </div>

    </div>

</div>