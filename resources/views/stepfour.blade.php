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
                <span class="ps-3 sm:ps-5 font-bold text-sm sm:text-xl">STEP 04 - Get Your Offer Letter and Sign Employment Agreement</span>
            </div>

            <p class="py-2 flex sm:py-4 md:py-6 text-sm sm:text-base font-bold items-center justify-center md:text-lg">
                Congratulations! <br>
                You are qualified to become a courier rider in Romania for the Contract Period of 2 years. You can
                download your Offer Letter, make the Work Permit payment and proceed to the next step.
            </p>

            <div class="mx-auto">
                <a href="{{ Storage::url($user->offerletter) }}" download>
                    <div class="bg-[black] h-12 inline-block flex items-center">
                        <p class="text-[#FFCC01] mx-auto w-fit  ">Download Your Offer Letter</p>
                    </div>
                </a>
            </div>
            <!-- <p class="py-2 sm:py-4 md:py-6 text-sm sm:text-base md:text-lg text-[#D4A900] font-medium pb-3">
                Download the Employee/Employer Agreement, sign, scan and upload it below.
            </p>

            <div>
                <a href="{{ Storage::url($user->employee_agreement_user) }}" download>
                    <div class="bg-[black] h-12 inline-block flex items-center">
                        <p class="text-[#FFCC01] mx-auto w-fit  ">Download Employment Agreement</p>
                    </div>
                </a>
            </div> -->

            <form action="{{ route('session_two') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- <div class="py-4">
                    <div class="flex items-center justify-center w-full">
                        <div class="flex items-center justify-center w-full">
                            <label for="employee_agreement" class="flex flex-col items-center justify-center w-full h-12 border-2 border-gray-300  cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Upload the Signed Employee/Employer Agreement</span></p>
                                </div>
                                <input id="employee_agreement" type="file" class="hidden" name="employee_agreement" />
                            </label>

                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('employee_agreement')" class="mt-2" />
                    <div id="employee_agreement-name-display"></div>
                </div> -->

                <div class="flex flex-col items-center justify-center">
                    <img class="py-12 max-h-[500px]" src="{{ asset('storage/images/Sign.png') }}" alt="">
                </div>

                <p class="py-2 sm:py-4 md:py-6 text-sm sm:text-base md:text-lg font-medium pb-3">
                    For your work permit process, you have to pay Euro 555. Once you click below button, you will be redirected to the payment gateway where you
                    can make an online payment using your credit/debit card.
                </p>
                <br><br>


                <div class="sm:col-span-6 w-2/5 mx-auto mt-10">
                    <button class="bg-[#FFCC01] w-full sm:w-[32rem] uppercase text-black-50 px-6 sm:px-12 py-2 sm:py-3 rounded-3xl text-sm sm:text-base" type="submit">PAY NOW FOR YOUR WORK PERMIT PROCESS
                    </button>
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