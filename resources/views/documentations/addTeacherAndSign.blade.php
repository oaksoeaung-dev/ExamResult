<x-app-layout>
    <div class="space-y-10 text-sm">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-document"></i>
                <span>How to add teacher and sign</span>
            </h1>
        </div>
        <ul class="list-disc space-y-3 ps-5">
            <li class="">
                Create လုပ်ရန်အတွက် <a class="text-sky-500" href="{{ route("teachers.create") }}" target="_blank">ဒီနေရာကိုနှိပ်ပါ။</a>
            </li>
            <li class="">
                <span class="badge-green">Name</span>
                နေရာတွင် ဆရာ/ဆရာမ နာမည်ထည့်ပေးရမည်။ (eg. Tr. Su Su)
            </li>
            <li>
                <span class="badge-green">Name</span>
                နေရာတွင် ဆရာ/ဆရာမ များအား KBTC မှ ပေးထားသော email ကိုထည့်ပေးရမည်။ (eg. susu@kbtc.edu.mm)
            </li>
            <li>
                ဆရာ/ဆရာမ များရဲ့ လက်မှတ်ပုံကိုတင်ရာတွင် ပုံဧ။် extension မှာ
                <span class="font-semibold text-red-500">png</span>
                ဖြစ်ရမည်။ Background ကိုလည်း ဖျက်ရမည် background ဖျက်ရန်
                <a class="text-sky-500" href="https://www.remove.bg/" target="_blank">ဒီကိုနှိပ်ပါ</a>
                ။
            </li>
            <li>
                လက်မှတ်ပုံ ရဲ့ file size သည်
                <span class="font-semibold text-red-500">2MB</span>
                မကျော်ရ။
            </li>
        </ul>
    </div>
</x-app-layout>
