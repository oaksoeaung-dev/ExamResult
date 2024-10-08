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
    </head>
    <body>
        @foreach ($students as $student)
            <div class="mx-auto my-[20px] min-h-[29.7cm] rounded-md border border-gray-300 bg-cover bg-center bg-no-repeat p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none" style="background-image: url('{{ asset("images/reportcardBackground/") }}{{ "/" }}{{ $student["Info"]["Background"] == "is" ? "is_rcbg.png" : "preuni_rcbg.png" }}')">
                <section class="mt-48">
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
                        <table class="w-full border-collapse border">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <td class="border py-1 text-center text-xs text-white" colspan="4">Grading System</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border py-1 text-center text-xs font-semibold">College Ready + Credit</td>
                                    <td class="border py-1 text-center text-xs font-semibold">College Ready</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Passing</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Below Passing</td>
                                </tr>
                                <tr>
                                    <td class="border py-1 text-center text-xs font-semibold">175 - 200</td>
                                    <td class="border py-1 text-center text-xs font-semibold">165 - 174</td>
                                    <td class="border py-1 text-center text-xs font-semibold">145 - 164</td>
                                    <td class="border py-1 text-center text-xs font-semibold">100 - 144</td>
                                </tr>
                            </tbody>
                        </table>
                    @elseif ($program == "igcse")
                        <table class="w-full border-collapse border">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <td class="border py-1 text-center text-xs font-semibold text-white" colspan="9">Grades Into Percentages</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade A*</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade A</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade B</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade C</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade D</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade E</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade F</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade G</td>
                                    <td class="border py-1 text-center text-xs font-semibold">Grade U</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">90% - 100%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">80% - 89%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">70% - 79%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">60% - 69%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">50% - 59%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">40% - 49%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">30% - 39%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">20% - 29%</td>
                                    <td class="whitespace-nowrap border py-1 text-center text-xs font-semibold">0% - 19%</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </section>
                <section class="mt-3 grid grid-cols-2 gap-3">
                    <table class="h-fit w-full border-collapse border">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="whitespace-nowrap border py-2 text-center text-xs text-white" colspan="3">Mark Percentage Grade</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap border py-2 text-center text-xs text-white">Subjects</td>
                                <td class="whitespace-nowrap border py-2 text-center text-xs text-white">Mark Percentage</td>
                                <td class="whitespace-nowrap border py-2 text-center text-xs text-white">Grade</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["Subject"] as $name => $mark)
                                <tr>
                                    <td class="whitespace-nowrap border px-6 py-2 text-xs">
                                        {{ $name }}
                                    </td>
                                    <td class="whitespace-nowrap border py-2 text-center text-xs">
                                        {{ $program == "igcse" ? (empty($mark) ? "" : $mark . "%") : $mark }}
                                    </td>
                                    <td class="whitespace-nowrap border py-2 text-center text-xs">
                                        {{ ReportCardGradeFormatPreUni::format($mark, $program) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="h-fit w-full border-collapse border">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="border py-2 text-center text-xs text-white" colspan="3">Monthly Attendance</td>
                            </tr>
                            <tr>
                                <td class="border py-2 text-center text-xs text-white">Month</td>
                                <td class="border py-2 text-center text-xs text-white">Percentage</td>
                                <td class="border py-2 text-center text-xs text-white">Remark</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["Month"] as $name => $percentage)
                                <tr>
                                    <td class="border px-6 py-2 text-xs">
                                        {{ $name }}
                                    </td>
                                    @if (Str::contains($percentage, ","))
                                        <td class="border py-2 text-center text-xs">
                                            {{ Str::before($percentage, ",") }}
                                        </td>
                                        <td class="border py-2 text-center text-xs">
                                            {{ Str::after($percentage, ",") }}
                                        </td>
                                    @else
                                        <td class="border py-2 text-center text-xs">
                                            {{ $percentage }}
                                        </td>
                                        <td class="border py-2 text-center text-xs"></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>

            <div class="mx-auto my-[20px] rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [min-height:29.7cm] [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
                <section>
                    <table class="h-fit w-full border-collapse border">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="border py-2 text-center text-xs text-white" colspan="5">Grade For Overall Behaviour</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border py-2 text-center text-xs">A - Above 90</td>
                                <td class="border py-2 text-center text-xs">B - Between 80 and 90</td>
                                <td class="border py-2 text-center text-xs">C - Between 70 and 79</td>
                                <td class="border py-2 text-center text-xs">D - Between 60 and 69</td>
                                <td class="border py-2 text-center text-xs">E - Under 60</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section class="mt-5">
                    <table class="h-fit w-full border-collapse border">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="border py-2 text-center text-xs text-white" colspan="6">Overall Behaviour</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["Behaviour"] as $name => $grade)
                                <tr>
                                    <td class="border px-6 py-2 text-xs">{{ $name }}</td>
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
                        <p class="mt-3 text-justify text-xs">
                            {{ $remark }}
                        </p>
                    @endforeach
                </section>

                <section class="mt-5 flex justify-end">
                    <div class="flex flex-col items-center justify-center gap-1">
                        @foreach ($student["Sign"] as $name => $sign)
                            <p class="text-xs font-bold">{{ $name }}</p>
                            <img src="{{ asset("storage/signs/" . $sign . ".png") }}" class="h-28 w-28 object-contain" alt="SignatureOfClassTeacher" />
                        @endforeach
                    </div>
                </section>
            </div>
        @endforeach
    </body>
</html>
