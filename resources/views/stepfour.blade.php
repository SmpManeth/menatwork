<x-app-layout>
    <div class="relative overflow-hidden bg-cover bg-no-repeat bg-center absolute" style="background-image: url('storage/images/hero.png');">
        @include('layouts.navigation')
        <div class="max-w-7xl mx-auto relative pb-10">
            <div class="h-40 sm:h-80 md:h-96 text-[#FFCC01] uppercase font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl grid grid-cols-1 sm:grid-cols-3 gap-4 content-end pb-8 sm:pb-12 md:pb-16">Register Now</div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="py-4 sm:py-6 md:py-8 border-round">
            <div class="bg-[#FFCC01] inline-block flex items-center rounded-2xl p-2 sm:p-4 md:p-6 mt-4 sm:mt-8">
                <img src="{{ asset('storage/images/information-button.png') }}" class="w-8 sm:w-10 ps-2" alt="information button">
                <span class="ps-3 sm:ps-5 font-bold text-sm sm:text-xl">STEP 04 - Get the Work Permit and Apply for the Visa</span>
            </div>

            <p class="py-2 sm:py-4 md:py-6 text-sm sm:text-base md:text-lg">
                Once your work permit issued, we will upload the proof pf the work permit here. Stay in touch.
            </p>


            <p class="py-2 sm:py-4 md:py-6 text-sm sm:text-base md:text-lg">
                Proof of Your Work Permit
            </p>

            <iframe class="m-3 p-3" src="{{ Storage::url($user->workpormit) }}" width="100%" height="500px"></iframe>
            <div class="w-2/5 mx-auto">
                <a href="{{ Storage::url($user->workpormit) }}" download>
                    <div class="bg-[black] h-12 inline-block flex items-center">
                        <p class="text-[#FFCC01] mx-auto w-fit  ">Download Your Work Permit</p>
                    </div>
                </a>
            </div>


            <p class="py-2 sm:py-4 md:py-6 text-sm sm:text-base md:text-lg">
                Apply Your Visa Online
            </p>
            <div>

                <div class="bg-[black] h-12 inline-block flex items-center">
                    <p class="text-[#FFCC01] mx-auto w-fit  ">https://evisa.mae.ro/Home?lang=en-US</p>
                </div>
            </div>
            <p class="py-2 sm:py-4 md:py-6 text-sm sm:text-base md:text-lg">
                Upload Your Visa Application Proof and Add SC Number for the Registration
            </p>

            <form action="{{ route('stepfour') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 grid-cols-2">
                    <div>
                        <p>Upload Visa Application Proof</p>
                        <div class="flex items-center justify-center w-full">
                            <label for="visa_proof" class="flex flex-col items-center justify-center w-full h-28 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Upload Visa Application Proof</span></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="visa_proof" type="file" class="hidden" name="visa_proof" />
                            </label>

                        </div>
                        <x-input-error :messages="$errors->get('visa_proof')" class="mt-2" />
                        <div id="visa_proof-name-display"></div>
                    </div>

                    <div>
                        <p>Enter Your SC Number Here</p>

                        <div class="sm:col-span-6">
                            <div class="mt-1">
                                <input type="text" name="sc" id="sc" autocomplete="given-name" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <x-input-error :messages="$errors->get('sc')" class="mt-2" />
                            </div>
                        </div>

                    </div>

                </div>
                <br><br>


                <div class="sm:col-span-6 w-2/5 mx-auto mt-10">
                    <button class="bg-[#FFCC01] w-full sm:w-[32rem] uppercase text-black-50 px-6 sm:px-12 py-2 sm:py-3 rounded-3xl text-sm sm:text-base" type="submit">SUBMIT & COMPLETE THE REGISTRATION PROCESS</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('visa_proof');
        const fileNameDisplay = document.getElementById('visa_proof-name-display');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                // Display the file name
                fileNameDisplay.textContent = "*****" + file.name + "*****";
            } else {
                // Clear the display if no file selected
                fileNameDisplay.textContent = '';
            }
        });

       
    </script>
    <div class="mt-4 sm:mt-6 md:mt-12">
        <img src="{{ asset('storage/images/footer.png') }}" alt="">
        <div class="max-w-7xl mx-auto">
            <img class="mx-auto w-40 sm:w-56 md:w-64" src="{{ asset('storage/images/footertwo.png') }}" alt="Footer Two Image">

            <p class="text-center pt-2 sm:pt-3 md:pt-4 text-sm sm:text-base md:text-lg">
                At Men At Work, our unwavering commitment is to connect the vibrant talent of Sri Lanka with captivating career openings in Romania's flourishing restaurant, hotel, and delivery service sectors. We proudly operate as a registered company in Romania bearing the business registration number J40/2550/2023. Our expertise spans both Romania and Sri Lanka, where we specialize in facilitating foreign employment opportunities.
            </p>

            <div class="flex  mx-auto w-3/5 flex-col items-center justify-center mt-4 sm:flex-row sm:justify-between sm:mt-8 md:mt-12" id="navbar-user">
                <ul class=" mx-auto flex flex-col font-medium p-2 sm:p-0 mt-2 sm:mt-0 border-gray-100 rounded-lg md:flex-row md:space-x-4 md:border-0">
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 text-white rounded md:bg-transparent -700 md:p-0" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 text-white rounded md:bg-transparent -700 md:p-0" aria-current="page">About Us</a>
                    </li>
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 text-white rounded md:bg-transparent -700 md:p-0" aria-current="page">Contact Us</a>
                    </li>
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 text-white rounded md:bg-transparent -700 md:p-0" aria-current="page">Register Now</a>
                    </li>
                </ul>

            </div>
            <div class="sm:w-2/5 md:w-1/5 mx-auto">
                <div class="grid grid-cols-5 gap-1 pt-4 sm:pt-8">
                    <div>
                        <img src="{{ asset('storage/images/facebook_mono.png') }}" alt="Facebook">
                    </div>
                    <div>
                        <img src="{{ asset('storage/images/instagram_mono.png') }}" alt="Instagram">
                    </div>
                    <div>
                        <img src="{{ asset('storage/images/linkedin_mono.png') }}" alt="LinkedIn">
                    </div>
                    <div>
                        <img src="{{ asset('storage/images/telegram_mono.png') }}" alt="Telegram">
                    </div>
                    <div>
                        <img src="{{ asset('storage/images/twitter_mono.png') }}" alt="Twitter">
                    </div>
                </div>
            </div>

            <div class=" sm:w-2/5 md:w-2/5 mx-auto pt-2 sm:pt-4 md:pt-6">
                <div class="mx-auto text-center">
                    <p class="text-xs sm:text-sm md:text-base">Copyright © 2023. MEN AT WORK PVT S.R.L.</p>
                </div>
            </div>
        </div>
        <img src="{{ asset('storage/images/footer.png') }}" alt="">
    </div>



</x-app-layout>