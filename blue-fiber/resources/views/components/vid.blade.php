<div class="flex justify-center">

    <div class="relative w-screen h-[80vh] overflow-hidden">
        <!-- Video -->
        <video 
            src="/thread.mp4"
            autoplay
            muted
            loop
            playsinline
            class="absolute top-1/2 left-1/2 w-full h-full  transform -translate-x-1/2 -translate-y-1/2 object-cover mb-36"
        ></video>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- gradient blending -->
        <div class="absolute bottom-0 left-0 w-full h-56 bg-linear-to-b from-transparent to-base-100 pointer-events-none"></div>
        
        <!-- Text -->
        <div class="absolute inset-0 flex items-center justify-center">

            <div class="flex flex-col items-center justify-center gap-12 p-12 w-full">

                <div class="flex justify-center items-center w-full">
                    <div class="bg-base-200 flex justify-center items-center gap-2 rounded-2xl w-full sm:w-[50%] px-2">
                        <button class="link link-hover p-2 border-0 w-1/3">Men</button>
                        <button class="link link-hover p-2 border-0 w-1/3">Women</button>
                        <button class="link link-hover p-2 border-0 w-1/3">Children</button>
                    </div>
                </div>
            
                <div class="flex flex-col justify-center items-center md:mt-12 text-white text-center w-full">
                    <h1 class="herofont text-4xl md:text-7xl m-4 w-full  animate__animated animate__fadeIn slow-fadein">Blue Fiber</h1>
                    <h2 class="text-md sm:text-2xl mb-6 p-1 rounded highlight-animation">Where Comfort Meets Craft.</h2>
                    <div class="flex justify-center gap-15 md:gap-36 m-4 w-full">
                        <button class="btn btn-primary border-0 w-25 updown-animation">On Sale</button>
                        <button class="btn border-0 w-25">New</button>
                    </div>
                </div>
            
            </div>

        </div>

    </div>

</div>