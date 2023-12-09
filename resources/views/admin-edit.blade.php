<x-app-layout>
    <div class="relative overflow-hidden bg-cover bg-no-repeat bg-center absolute" style="background-image: url('{{ asset('storage/images/hero.png') }}');">
        @include('layouts.navigation')
        <div class="max-w-7xl mx-auto relative pb-10">
            <div class="h-40 sm:h-80 md:h-96 text-[#FFCC01] uppercase font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl grid grid-cols-1 sm:grid-cols-3 gap-4 content-end pb-8 sm:pb-12 md:pb-16">Admin Dashboard</div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto">

        <form action="{{ route('update_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4 sm:mt-6 md:mt-8 grid grid-cols-1 gap-4 sm:grid-cols-6 gap-x-2 gap-y-4 sm:gap-x-4 sm:gap-y-6">
                <input hidden type="text" name="id" id="id" value="{{$user->id}}">

                <div class="sm:col-span-6">
                    <label for="first_name" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Enter Your Name</label>
                    <div class="mt-1">
                        <input type="text" name="first_name" id="first_name" autocomplete="given-name" value="{{$user->name}}" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="whatsapp_number" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Enter Your WhatsApp Number</label>
                    <div class="mt-1">
                        <input type="text" name="whatsapp_number" id="whatsapp_number" autocomplete="given-name" value="{{$user->whatsapp_number}}" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-2" />
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="email" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Enter Your Email Address</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" value="  {{$user->email}}" autocomplete="email" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="date" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Date</label>
                    <div class="mt-1">
                        <input id="date" name="date" type="date" value="{{ \Carbon\Carbon::parse($user->date)->format('Y-m-d') }}" autocomplete="date" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>
                </div>


                <div class="sm:col-span-6">
                    <label for="time" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Time</label>
                    <div class="mt-1">
                        <input id="time" name="time" type="time" value="{{ \Carbon\Carbon::parse($user->time)->format('H:i') }}" autocomplete="time" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('time')" class="mt-2" />
                    </div>
                </div>




                <div class="sm:col-span-6">
                    <label for="employee_agreement_user" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Upload Employee Agreement</label>
                    <div class="mt-1">
                        <input id="employee_agreement_user" name="employee_agreement_user" type="file" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('employee_agreement_user')" class="mt-2" />
                        <label for="offerletter" class="text-xs text-gray-900">Old File -{{$user->employee_agreement_user}}</label>
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="workpormit" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Upload  Work Permit</label>
                    <div class="mt-1">
                        <input id="workpormit" name="workpormit" type="file" autocomplete="workpormit" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('workpormit')" class="mt-2" />
                        <label for="offerletter" class="text-xs text-gray-900">Old File - {{$user->workpormit}}</label>
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="offerletter" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Upload Offer Letter</label>
                    <div class="mt-1">
                        <input id="offerletter" name="offerletter" type="file" autocomplete="offerletter" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('offerletter')" class="mt-2" />
                        <label for="offerletter" class="text-xs text-gray-900">Old File -{{$user->offerletter}}</label>

                    </div>
                </div>

                <input type="text" hidden name="offerletter_old" value="{{$user->offerletter}}">
                <input type="text" hidden name="workpormit_old" value="{{$user->workpormit}}">
                <input type="text" hidden name="employee_agreement_user_old" value="{{$user->employee_agreement_user}}">

                <div class="sm:col-span-6">
                    <label for="status" class="block text-sm sm:text-base font-medium leading-6 text-gray-900">Change Status</label>
                    <div class="mt-1">
                        <select name="status" id="" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="process" @if($user->status == 'process') selected @endif>Processing</option>
                            <option value="Interview" @if($user->status == 'Interview') selected @endif>Interview Scheduled</option>
                            <option value="selected" @if($user->status == 'selected') selected @endif>Selected (Completed)</option>
                        </select>
                    </div>
                </div>
            </div>



            <div class="sm:col-span-6 w-2/5 mx-auto mt-10">
                <button class="bg-[#FFCC01] w-full sm:w-[32rem] uppercase text-black-50 px-6 sm:px-12 py-2 sm:py-3 rounded-3xl text-sm sm:text-base" type="submit">Update</button>
            </div>

        </form>



    </div>

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