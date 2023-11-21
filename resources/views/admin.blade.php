<x-app-layout>
    <div class="relative overflow-hidden bg-cover bg-no-repeat bg-center absolute" style="background-image: url('storage/images/hero.png');">
        @include('layouts.navigation')
        <div class="max-w-7xl mx-auto relative pb-10">
            <div class="h-40 sm:h-80 md:h-96 text-[#FFCC01] uppercase font-extrabold text-2xl sm:text-3xl md:text-4xl lg:text-5xl grid grid-cols-1 sm:grid-cols-3 gap-4 content-end pb-8 sm:pb-12 md:pb-16">Admin Dashboard</div>
        </div>
    </div>



    <!-- Default Modal -->
    <div id="medium-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        EMPLOYEE AGREEMENT
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('upload-epmloyeeagreement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div>
                            <p>Upload EMPLOYEE AGREEMENT, Colour Scanned Copy (jpg or pdf)</p>
                            <div class="flex items-center justify-center w-full">
                                <label for="epmloyeeagreement" class="flex flex-col items-center justify-center w-full h-28 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">CLICK TO UPLOAD EMPLOYEE AGREEMENT</span> </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>

                                    <input id="epmloyeeagreement" type="file" class="hidden" name="epmloyeeagreement" />
                                </label>

                            </div>
                            <x-input-error :messages="$errors->get('passport_copy')" class="mt-2" />
                            <div id="passport_copy-name-display"></div>
                            <input type="text" id="model_id">
                            <p id="model_id">cv</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="medium-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload</button>
                        <button data-modal-hide="medium-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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
    </script>

    <div class="max-w-full mx-auto">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Whatsapp NO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Passport
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Police report
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CV
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Employee Agreement
                        </th>
                        <th scope="col" class="px-6 py-3">
                            T&C
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Visa Proof
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SC Number
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <p name="id" id="id" class="hidden" {{$user->id}}</p>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="https://th.bing.com/th/id/OIP.8we_VnkatphHL1dEHB8U-wHaJA?rs=1&pid=ImgDetMain" alt="Jese image">
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{$user->name}}</div>

                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{$user->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$user->whatsapp_number}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ Storage::url($user->passport_copy_path) }}" download="Passport">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</button>
                                </a>

                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ Storage::url($user->police_report_path) }}" download="police_report_path">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</button>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ Storage::url($user->cv_path) }}" download="CV">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</button>
                                </a>
                            </td>
                            <td class="px-6 py-4">

                                <div>
                                    <a href="{{ Storage::url($user->employee_agreement) }}" download="Employee Agreement">
                                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</button>
                                    </a>
                                </div>



                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ Storage::url($user->tc) }}" download="T&C">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</button>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ Storage::url($user->visa_proof) }}" download="Vsa Proof">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-4 py-2 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download</button>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{$user->sc}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if ($user->status === 'selected')
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>Completed
                                    @elseif ($user->status === 'interview')
                                    <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-2"></div> Interview
                                    @elseif ($user->status === 'process')
                                    <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-2"></div> Process
                                    @elseif ($user->status === 'reject')
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Rejected
                                    <!-- Handle other status values if needed -->
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/admin/users/{{ $user['id']}}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit Application</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

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