<x-app-layout>
    <div class="relative overflow-hidden bg-cover bg-no-repeat bg-center absolute" style="background-image: url('storage/images/hero.png');">
        @include('layouts.navigation')
        <div class="max-w-7xl mx-auto relative pb-10">
            <div class="h-40 sm:h-80 md:h-96 text-[#FFCC01] uppercase font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl grid grid-cols-1 sm:grid-cols-3 gap-4 content-end pb-8 sm:pb-12 md:pb-16">Register Now</div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-6">
        <div class="bg-[#FFCC01] items-center rounded-2xl p-2 sm:p-4 md:p-6 sm:mt-8 ">
            <div class="ps-3 sm:ps-5 font-black text-sm sm:text-xl">Your Total Cost to Reach Your Dream</div>
            <div class="ml-3 mt-2">
                <div class="ps-3 sm:ps-5 text-s font-medium">1. Word Permit - Euro 555 <br>
                    2. Processing & Administration Charges - Euro 1200</div>
                <div class="ps-3 sm:ps-5 text-s font-medium mt-2">Note: <br>
                    - The Visa Fee (Euro 135) you have to pay separately to the Romanian Embassy. <br>
                    - Flight Ticket to Romania, you need to purchase from given Online Platform in the Final Stage (Step 05) in the Registration Process.
                </div>
            </div>


        </div>
        <div class="py-4 sm:py-6 md:py-8 border-round">
            <div class="bg-[#FFCC01] inline-block flex items-center rounded-2xl p-2 sm:p-4 md:p-6 mt-4 sm:mt-8">
                <img src="{{ asset('storage/images/information-button.png') }}" class="w-8 sm:w-10 ps-2" alt="information button">
                <span class="ps-3 sm:ps-5 font-bold text-sm sm:text-xl">STEP 02 - Upload the valid documents as appear below</span>
            </div>

            <p class="py-2 sm:py-4 md:py-6 text-sm sm:text-base md:text-lg">
                Please follow the given instructions and upload the correct documents to avoid any delays in the registration process. We recommend you to
                arrange all the documents first and then start uploading.</p>

            <form action="{{ route('step-two') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 grid-cols-2">
                    <div>
                        <p class="font-medium">Upload Your Passport, Colour Scanned Copy (jpg or pdf)</p>

                        <div class="flex flex-col items-center justify-center border-black-100 border-2 rounded">
                            <img style="max-height: 300px;" class="py-2 max-h-[300px]" src="{{ asset('storage/images/Passport.jpg') }}" alt="">
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="passport_copy" class="flex flex-col items-center justify-center w-full h-12 border-2 border-gray-300  cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">UPLOAD YOUR PASSPORT COPY</span></p>
                                </div>
                                <input id="passport_copy" type="file" class="hidden" name="passport_copy" />
                            </label>

                        </div>
                        <x-input-error :messages="$errors->get('passport_copy')" class="mt-2" />
                        <div id="passport_copy-name-display"></div>
                    </div>

                    <div>
                        <p class="font-medium">Upload Passport Size Colour Photo of You</p>
                        <div class="flex flex-col items-center justify-center border-black-100 border-2 rounded">
                            <img style="max-height: 300px;" class="py-2 max-h-[300px]" src="{{ asset('storage/images/Passport Photo.jpg') }}" alt="">
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="photo" class="flex flex-col items-center justify-center w-full h-12 border-2 border-gray-300  cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">UPLOAD YOUR PHOTO</span></p>
                                </div>
                                <input id="photo" type="file" class="hidden" name="photo" />
                            </label>

                        </div>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        <div id="photo-name-display"></div>
                    </div>

                </div>
                <br><br>
                <p class="font-bold">Upload Sri Lanka Police Clearance Report</p>
                <p class="text-[#D4A900] font-medium pb-3">If you have not obtained the Police Clearance Report so far, please apply it online right now. Then take a screenshot with the Apply Reference
                    Number' and upload it here.</p>
                <div class="grid gap-4 grid-cols-2">
                    <div class="bg-[black] h-12 inline-block flex items-center">
                        <a href="https://www.police.lk/?page_id=3275" target="_blank" class="text-[#FFCC01] mx-auto w-fit  ">https://www.police.lk/?page_id=3275</a>
                    </div>

                    <div>

                        <div class="flex items-center justify-center w-full">
                            <label for="police_report" class="flex flex-col items-center justify-center w-full h-12 border-2 border-gray-300  cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">CLICK TO</span> UPLOAD THE SCREENSHOT</p>
                                </div>
                                <input id="police_report" type="file" class="hidden" name="police_report" />
                            </label>

                        </div>
                        <x-input-error :messages="$errors->get('police_report')" class="mt-2" />
                        <div id="police_report-name-display"></div>
                    </div>

                </div>

                <br>
                <p class="text-[#D4A900] font-medium pb-3">You need to download the CV Template, fill it & upload here.</p>
                <div class="grid gap-4 grid-cols-2">
                    <a href="{{ asset('storage/images/Men At Work CV Template.docx') }}" download>
                        <div class="bg-[black] h-12 inline-block flex items-center">
                            <p class="text-[#FFCC01] mx-auto w-fit  ">DOWNLOAD THE CV FORMAT</p>
                        </div>
                    </a>


                    <div>

                        <div class="flex items-center justify-center w-full">
                            <label for="CV" class="flex flex-col items-center justify-center w-full h-12 border-2 border-gray-300  cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">UPLOAD YOUR COMPLETED CV</span></p>
                                </div>
                                <input id="CV" type="file" class="hidden" name="CV" />
                            </label>

                        </div>
                        <x-input-error :messages="$errors->get('CV')" class="mt-2" />
                        <div id="CV-name-display"></div>
                    </div>

                </div>

                <div class="sm:col-span-6 w-2/5 mx-auto mt-10">
                    <button class="bg-[#FFCC01] w-full sm:w-[32rem] uppercase text-black-50 px-6 sm:px-12 py-2 sm:py-3 rounded-3xl text-sm sm:text-base" type="submit">SUBMIT THE DOCUMENTS FOR THE REVIEW</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('photo');
        const fileNameDisplay = document.getElementById('photo-name-display');

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

        const fileInput1 = document.getElementById('passport_copy');
        const fileNameDisplay1 = document.getElementById('passport_copy-name-display');

        fileInput1.addEventListener('change', function() {
            const file1 = this.files[0];

            if (file1) {
                // Display the file name
                fileNameDisplay1.textContent = "*****" + file1.name + "*****";
            } else {
                // Clear the display if no file selected
                fileNameDisplay1.textContent = '';
            }
        });

        const fileInput2 = document.getElementById('police_report');
        const fileNameDisplay2 = document.getElementById('police_report-name-display');

        fileInput2.addEventListener('change', function() {
            const file2 = this.files[0];

            if (file2) {
                // Display the file name
                fileNameDisplay2.textContent = "*****" + file2.name + "*****";
            } else {
                // Clear the display if no file selected
                fileNameDisplay2.textContent = '';
            }
        });
        const fileInput3 = document.getElementById('CV');
        const fileNameDisplay3 = document.getElementById('CV-name-display');

        fileInput3.addEventListener('change', function() {
            const file3 = this.files[0];

            if (file3) {
                // Display the file name
                fileNameDisplay3.textContent = "*****" + file3.name + "*****";
            } else {
                // Clear the display if no file selected
                fileNameDisplay3.textContent = '';
            }
        });
    </script>
    <div class="mt-4 sm:mt-6 md:mt-12">
        <img src="{{ asset('storage/images/footer.png') }}" alt="">
        <div class="max-w-7xl mx-auto">
            <img class="mx-auto w-40 sm:w-56 md:w-64" src="{{ asset('storage/images/footertwo.png') }}" alt="Footer Two Image">

            <p class="text-center pt-2 sm:pt-3 md:pt-4 text-sm sm:text-base md:text-lg">
                At Men At Work, our unwavering commitment is to connect the vibrant talent of Sri Lanka with captivating career openings in Romania's flourishing
                restaurant, hotel, and delivery service sectors. We proudly operate as , a registered company in Romania bearing the business registration number
                J40/2550/2023. Our expertise spans both Romania and Sri Lanka, where we specialize in facilitating foreign employment opportunities.

            </p>

            <div class="flex  mx-auto w-3/5 flex-col items-center justify-center mt-4 sm:flex-row sm:justify-between sm:mt-8 md:mt-12" id="navbar-user">
                <ul class=" mx-auto flex flex-col font-medium p-2 sm:p-0 mt-2 sm:mt-0 border-gray-100 rounded-lg md:flex-row md:space-x-4 md:border-0">
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 rounded md:bg-transparent -700 md:p-0" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 rounded md:bg-transparent -700 md:p-0" aria-current="page">About Us</a>
                    </li>
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 rounded md:bg-transparent -700 md:p-0" aria-current="page">Contact Us</a>
                    </li>
                    <li>
                        <a href="https://www.menatwork.com.ro/" class="text-black block py-2 pl-2 pr-3 rounded md:bg-transparent -700 md:p-0" aria-current="page">Register Now</a>
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
        <img src="{{ asset('storage/images/footer.png') }}" style="height: 10px; width:100%" alt="" class="mt-1">
    </div>
</x-app-layout>