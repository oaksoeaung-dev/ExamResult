<x-app-layout>
    <div class="space-y-10 text-sm">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-document"></i>
                <span>How to Create Certificate and Transcript for International School's Graduation</span>
            </h1>
        </div>
        <div class="space-y-5">
            <h2 class="text-2xl">Example Of Government CSV File</h2>
            <div class="relative overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-500">
                    <thead class="text-xs">
                        <tr>
                            <th scope="col" colspan="8" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-rose-500">Information</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-gray-600">English</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-gray-600">Maths</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-gray-600">Science</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-gray-600">Social Studies</th>
                            <th scope="col" class="whitespace-nowrap bg-gray-100 px-6 py-3 text-center font-extrabold text-rose-500">Review</th>
                            <th scope="col" colspan="2" class="whitespace-nowrap bg-indigo-100 px-6 py-3 text-center font-extrabold text-rose-500">Signs</th>
                        </tr>
                        <tr class="">
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-gray-600">Name</th>
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-gray-600">Academic Year</th>
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-rose-500">Grade</th>
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-gray-600">Date of Birth</th>
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-gray-600">Student ID</th>
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-gray-600">Issuance Date</th>
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-rose-500">Program</th>
                            <th scope="col" class="whitespace-nowrap bg-rose-100 px-6 py-3 text-center font-extrabold text-rose-500">Campus</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-rose-500">Mark</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-rose-500">Mark</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-rose-500">Mark</th>
                            <th scope="col" class="whitespace-nowrap bg-sky-100 px-6 py-3 text-center font-extrabold text-rose-500">Mark</th>
                            <th scope="col" class="whitespace-nowrap bg-gray-100 px-6 py-3 font-extrabold text-gray-600">Remark of the Class Teacher</th>
                            <th scope="col" class="whitespace-nowrap bg-indigo-100 px-6 py-3 font-extrabold text-gray-600">Class Teacher Sign</th>
                            <th scope="col" class="whitespace-nowrap bg-indigo-100 px-6 py-3 font-extrabold text-gray-600">Center Head (Waizayantar Campus)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cursor-pointer border-b bg-white transition-all duration-300 hover:bg-zinc-50">
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">Oak Soe Aung</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">2024 - 2025</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">Primary 6</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">05-Mar-2000</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">KBTC-IS-0001</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">1-Nov-2024</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">dual</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">online</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">90</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">80</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">90</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">100</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">He consistently demonstrates a strong work ethic and a genuine passion for learning.</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">zawlinkyaw</th>
                            <th class="whitespace-nowrap px-6 py-4 text-center font-normal text-zinc-700">zawlinkyaw</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="">
                <p class="text-lg font-semibold">
                    Download example XLSX
                    <a href="{{ route("export.internationalSchool.download", "graduation_example.xlsx") }}" class="text-sky-500">here.</a>
                </p>
            </div>
            <hr />
        </div>
        <div class="space-y-5">
            <h2 class="text-2xl">Data Format in XLSX File</h2>
            <table class="text-sm">
                <thead>
                    <tr>
                        <th class="border border-gray-400 bg-sky-200 px-6 py-2 text-gray-700">Column</th>
                        <th class="border border-gray-400 bg-sky-200 px-6 py-2 text-gray-700">Data Format</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-400 px-6 py-2 font-bold text-gray-700">Grade</td>
                        <td class="border border-gray-400 px-6 py-2 text-gray-700">
                            <span class="badge-sky">Kindergarten</span>
                            <span class="badge-sky">Primary 1</span>
                            <span class="badge-sky">Primary 2</span>
                            <span class="badge-sky">Primary 3</span>
                            <span class="badge-sky">Primary 4</span>
                            <span class="badge-sky">Primary 5</span>
                            <span class="badge-sky">Primary 6</span>
                            <span class="badge-sky">Secondary 1</span>
                            <span class="badge-sky">Secondary 2</span>
                            <span class="badge-sky">Secondary 3</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-6 py-2 font-bold text-gray-700">Date of Birth</td>
                        <td class="border border-gray-400 px-6 py-2 text-gray-700">
                            <span class="badge-sky">05-Mar-2000</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-6 py-2 font-bold text-gray-700">Issuance Date</td>
                        <td class="border border-gray-400 px-6 py-2 text-gray-700">
                            <span class="badge-sky">1-Nov-2024</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-6 py-2 font-bold text-gray-700">Program</td>
                        <td class="border border-gray-400 px-6 py-2 text-gray-700">
                            <span class="badge-sky">dual</span>
                            <span class="badge-sky">cpc</span>
                            <span class="badge-sky">cec</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 px-6 py-2 font-bold text-gray-700">Campus</td>
                        <td class="border border-gray-400 px-6 py-2 text-gray-700">
                            <span class="badge-sky">online</span>
                            <span class="badge-sky">oncampus</span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <hr />
        </div>
        <div class="space-y-5">
            <h2 class="text-2xl">Adding Data and Customizing the XLSX File</h2>
            <p class="font-extrabold text-red-500">Data Format in XLSX File ထဲက column များကို သတ်မှတ်ထားတဲ့ format အတိုင်းထည့်ပေးရပါမည်။</p>
            <p class="font-extrabold text-red-500">အနီ နဲ့ ရေးထားသောစာလုံးများကိုဖျက်လို့မရပါ။ ပြင်လို့မရပါ။</p>
            <p>မပါတဲ့ subject column များကိုဖျက်လို့ရပါသည်။</p>
            <p>
                Subject အမှတ်များကိုထည့်ရတွင် number ပဲထည့်ပေးပါ။ absent ဖြစ်တဲ့ subject များအတွက်
                <span class="badge-sky">-</span>
                dashed ထည့်ရင်ရပါတယ်။ space များမပါစေရန်သတိပြုပါ။
            </p>
            <p>Remark of the Class Teacher တွင် စာလုံးရည်တတ်နိုင်သလောက်အများကြီးမသုံးပါနှင့်။</p>
            <p>Signs column အောက်က Center Head အနောက်က campus နေရာတွင် သက်ဆိုင်ရာ campus နာမည်ကိုထည့်ပေးရပါမည်။</p>
        </div>
    </div>
</x-app-layout>
