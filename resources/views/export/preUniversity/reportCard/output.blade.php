@php
    use App\Helpers\ReportCardGradeFormatPreUni;
    use Carbon\Carbon;
    $defaultGrades = ["A", "B", "C", "D", "E"];
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ config("app.name", "Laravel") }}</title>
        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
        <style>
            @page {
                size: A4;
                margin: 0;
            }
        </style>
    </head>
    <body>
        @foreach ($students as $student)
            <div class="mx-auto my-[20px] min-h-[29.7cm] rounded-md border border-gray-300 bg-cover bg-center bg-no-repeat p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none" style="background-image: url('{{ asset("images/reportcardBackground/") }}{{ "/" }}{{ $student["Info"]["Background"] == "is" ? "is_rcbg.png" : "preuni_rcbg.png" }}')">
                <section class="mt-52">
                    <div class="grid grid-cols-3 gap-2">
                        @foreach ($student["Info"] as $name => $info)
                            @if ($name != "Background" && $name != "Program")
                                <p class="text-sm">
                                    <span class="font-semibold">{{ $name }} :</span>
                                    <span>{{ strtotime($info) ? Carbon::parse($info)->format("d-M-Y") : $info }}</span>
                                </p>
                            @endif
                        @endforeach
                    </div>
                </section>
                <section class="mt-3">
                    @php
                        $program = strtolower($student["Info"]["Program"]);
                    @endphp

                    @if ($program == "ged")
                        <table class="w-full border border-collapse">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <td class="py-1 text-xs text-center text-white border" colspan="4">Grading System</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1 text-xs font-semibold text-center border">College Ready + Credit</td>
                                    <td class="py-1 text-xs font-semibold text-center border">College Ready</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Passing</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Below Passing</td>
                                </tr>
                                <tr>
                                    <td class="py-1 text-xs font-semibold text-center border">175 - 200</td>
                                    <td class="py-1 text-xs font-semibold text-center border">165 - 174</td>
                                    <td class="py-1 text-xs font-semibold text-center border">145 - 164</td>
                                    <td class="py-1 text-xs font-semibold text-center border">100 - 144</td>
                                </tr>
                            </tbody>
                        </table>
                    @elseif ($program == "igcse" || $program == "startup")
                        <table class="w-full border border-collapse">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <td class="py-1 text-xs font-semibold text-center text-white border" colspan="9">Grades Into Percentages</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade A*</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade A</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade B</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade C</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade D</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade E</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade F</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade G</td>
                                    <td class="py-1 text-xs font-semibold text-center border">Grade U</td>
                                </tr>
                                <tr>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">90% - 100%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">80% - 89%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">70% - 79%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">60% - 69%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">50% - 59%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">40% - 49%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">30% - 39%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">20% - 29%</td>
                                    <td class="py-1 text-xs font-semibold text-center border whitespace-nowrap">0% - 19%</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </section>
                <section class="grid grid-cols-2 gap-3 mt-3">
                    <table class="w-full border border-collapse h-fit">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="py-2 text-xs text-center text-white border whitespace-nowrap" colspan="3">Mark Percentage Grade</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-xs text-center text-white border whitespace-nowrap">Subjects</td>
                                <td class="py-2 text-xs text-center text-white border whitespace-nowrap">Mark Percentage</td>
                                <td class="py-2 text-xs text-center text-white border whitespace-nowrap">Grade</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["Subject"] as $name => $mark)
                                <tr>
                                    <td class="p-2 text-xs border whitespace-nowrap">
                                        {{ $name }}
                                    </td>
                                    <td class="py-2 text-xs text-center border whitespace-nowrap">
                                        {{ $program == "igcse" ? (empty($mark) ? "" : $mark . "%") : $mark }}
                                    </td>
                                    <td class="py-2 text-xs text-center border">
                                        {{ ReportCardGradeFormatPreUni::format($mark, $program) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="w-full border border-collapse h-fit">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="py-2 text-xs text-center text-white border" colspan="3">Monthly Attendance</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-xs text-center text-white border">Month</td>
                                <td class="py-2 text-xs text-center text-white border">Percentage</td>
                                <td class="py-2 text-xs text-center text-white border">Remark</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["Month"] as $name => $percentage)
                                <tr>
                                    <td class="px-6 py-2 text-xs border">
                                        {{ $name }}
                                    </td>
                                    @if (Str::contains($percentage, ","))
                                        <td class="py-2 text-xs text-center border">
                                            {{ Str::before($percentage, ",") }}
                                        </td>
                                        <td class="py-2 text-xs text-center border">
                                            {{ Str::after($percentage, ",") }}
                                        </td>
                                    @else
                                        <td class="py-2 text-xs text-center border">
                                            {{ $percentage }}
                                        </td>
                                        <td class="py-2 text-xs text-center border"></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>

            <div class="mx-auto my-[20px] rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [min-height:29.7cm] [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
                <section>
                    <table class="w-full border border-collapse h-fit">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="py-2 text-xs text-center text-white border" colspan="5">Grade For Overall Behaviour</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 text-xs text-center border">A - Above 90</td>
                                <td class="py-2 text-xs text-center border">B - Between 80 and 90</td>
                                <td class="py-2 text-xs text-center border">C - Between 70 and 79</td>
                                <td class="py-2 text-xs text-center border">D - Between 60 and 69</td>
                                <td class="py-2 text-xs text-center border">E - Under 60</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section class="mt-5">
                    <table class="w-full border border-collapse h-fit">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="py-2 text-xs text-center text-white border" colspan="6">Overall Behaviour</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["Behaviour"] as $name => $grade)
                                <tr>
                                    <td class="px-6 py-2 text-xs border">{{ $name }}</td>
                                    @foreach ($defaultGrades as $defaultGrade)
                                        <td class="{{ $grade == $defaultGrade ? "bg-green-500" : "" }} border px-2 py-2 text-center text-xs">
                                            {{ $defaultGrade }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

                <section class="mt-5">
                    @foreach ($student["Remark"] as $name => $remark)
                        <h2 class="text-xs font-semibold">{{ $name }}</h2>
                        <p class="mt-3 text-xs text-justify">
                            {{ $remark }}
                        </p>
                    @endforeach
                </section>

                <section class="flex justify-end mt-5">
                    <div class="flex flex-col items-center justify-center gap-1">
                        @foreach ($student["Sign"] as $name => $sign)
                            <p class="text-xs font-bold">{{ $name }}</p>
                            <img src="{{ asset("storage/signs/" . $sign . ".png") }}" class="object-contain h-28 w-28" alt="SignatureOfClassTeacher" />
                        @endforeach
                    </div>
                </section>
            </div>
        @endforeach
    </body>
</html>
