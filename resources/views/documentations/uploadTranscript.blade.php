<x-app-layout>
    <div class="space-y-10 text-sm">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-document"></i>
                <span>Upload Transcript</span>
            </h1>
        </div>
        <p>Graduation အတွက်သုံးရန်ဖြစ်သည်။</p>
        <ul class="list-disc space-y-3 ps-5">
            <li class="">
                Download example CSV
                <a
                    href="{{ route("export.international-school.download", "GraduationExample.csv") }}"
                    class="text-sky-500"
                >
                    here
                </a>
                .
            </li>
            <li>CSV file ထဲရှိ header column များကိုပြင်လို့မရပါ။</li>
            <li class="space-y-3">
                <p>
                    Date များကိုထည့်ရာတွင်
                    <span class="badge-red">Day-Month-Year</span>
                    format အတိုင်းထည့်ရမည်။
                </p>
                <p>
                    <span>Example :</span>
                    <span class="badge-violet">05.03.2000</span>
                    <span class="badge-violet">05.Mar.2000</span>
                    <span class="badge-violet">05-Mar-2000</span>
                    <span class="badge-violet">05-03-2000</span>
                </p>
            </li>
            <li class="space-y-3">
                <p>
                    <span class="badge-green">Grade</span>
                    column တွင်သတိပြုပေးပါ။ column ထဲတွင် ထည့်ရမည့်အတန်းနာမည်များကလွဲလို့မရပါ။
                </p>
                <p class="">
                    <span class="badge-violet">Kindergarten</span>
                    <span class="badge-violet">Primary 1</span>
                    <span class="badge-violet">Primary 2</span>
                    <span class="badge-violet">Primary 3</span>
                    <span class="badge-violet">Primary 4</span>
                    <span class="badge-violet">Primary 5</span>
                    <span class="badge-violet">Primary 6</span>
                    <span class="badge-violet">Secondary 1</span>
                    <span class="badge-violet">Secondary 2</span>
                    <span class="badge-violet">Secondary 3</span>
                </p>
                <p class="">
                    <span class="text-red-500">အကြီးအသေး၊white space များကအစလွဲလို့မရပါ</span>
                    ။
                </p>
            </li>
            <li>
                <span class="badge-green">Program</span>
                column တွင်
                <span class="badge-violet">dual</span>
                <span class="badge-violet">cpc</span>
                <span class="badge-violet">cec</span>
                ပဲထည့်လို့ရပါတယ်။
            </li>
            <li>
                <span class="badge-green">Campus</span>
                column တွင်
                <span class="badge-violet">online</span>
                <span class="badge-violet">oncampus</span>
                နှစ်ခုပဲထည့်လို့ရပါတယ်။
            </li>
            <li>
                <span class="badge-sky">Main Subjects.</span>
                ပါသော column header များကို ဖျက်လို့ရပါတယ်။ ပြင်လို့တော့မရပါ။
                <span class="font-semibold">Absent</span>
                ဖြစ်တဲ့ကလေးများအတွက်
                <span class="badge-violet">-</span>
                ထည့်လို့ရပါတယ်။ အမှတ်တန်းထည့်လည်းရပါတယ်။ A,B,C,D,E,F ထည့်လည်းရပါတယ်။
            </li>
            <li>
                <span class="badge-green">Remark</span>
                column တွင် စာတိုတာကပိုအဆင်ပြေပါတယ်
            </li>
            <li>
                <span class="badge-green">Class Teacher Sign</span>
                column နှင့်
                <span class="badge-green">Dean Sign</span>
                column နှစ်ခုမှာ teacher list ထဲမှ
                <span class="badge-yellow">keyword</span>
                ကိုထည့်ပေးရမည်။
                <span class="badge-yellow">keyword</span>
                မရှိလျှင် create ကိုနှိပ်ပြီးထည့်နိုင်ပါတယ်။
            </li>
            <li>
                <span class="badge-green">Division</span>
                column သည်
                <span class="font-semibold">Dean</span>
                များအတွက်ဖြစ်ပါတယ်။ Lower primary dean အတွက်
                <span class="badge-violet">lower</span>
                upper primary dean အတွက်
                <span class="badge-violet">upper</span>
                secondary dean အတွက်
                <span class="badge-violet">secondary</span>
                လို့ထည့်ပေးရပါမယ်။
            </li>
        </ul>
    </div>
</x-app-layout>
