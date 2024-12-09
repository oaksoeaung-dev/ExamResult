@php
    use App\Helpers\ReportCardGradeFormatIS;
    use Carbon\Carbon;
    $defaultGrades = ["A", "B", "C", "D", "E"];
    $defaultSkills = ["5", "4", "3", "2", "1"];
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
            * {
                color: #00223d;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
            }
        </style>
    </head>
    <body>
        @foreach ($students as $student)
            <div class="mx-auto my-[20px] min-h-[29.7cm] rounded-md border border-gray-300 bg-cover bg-center bg-no-repeat p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
                <section class="flex items-center h-1/5">
                    <div class="flex flex-col items-center justify-center w-3/4">
                        <p class="text-3xl font-bold text-[#00223d]">KBTC International School</p>
                        <p class="text-3xl font-bold text-[#00223d]">Student Report Card</p>
                    </div>
                    <div class="w-1/5">
                        <img src="{{ asset("images/logos/islogo.png") }}" alt="logo" class="object-cover w-full h-auto" />
                    </div>
                </section>
                <section class="">
                    <div class="grid grid-cols-3 gap-3">
                        @foreach ($student["Information"] as $name => $info)
                            <p class="text-sm">
                                <span class="font-semibold text-[#00223d]">{{ $name }} :</span>
                                <span class="text-[#00223d]">{{ $info }}</span>
                            </p>
                        @endforeach
                    </div>
                </section>
                <section class="grid grid-cols-2 mt-3 text-xs gap-x-2">
                    <table class="w-full border border-collapse table-fixed h-fit">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="px-2 py-1 text-white border" colspan="7">Grade for Major Subjects & Add-on Subjects</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-2 py-1 text-xs font-bold text-center text-gray-800 border bg-amber-400">Grade A*</td>
                                <td class="px-2 py-1 text-xs font-bold text-center text-gray-800 border bg-amber-400">Grade A</td>
                                <td class="px-2 py-1 text-xs font-bold text-center text-gray-800 border bg-amber-400">Grade B</td>
                                <td class="px-2 py-1 text-xs font-bold text-center text-gray-800 border bg-amber-400">Grade C</td>
                                <td class="px-2 py-1 text-xs font-bold text-center text-gray-800 border bg-amber-400">Grade D</td>
                                <td class="px-2 py-1 text-xs font-bold text-center text-gray-800 border bg-amber-400">Grade E</td>
                                <td class="px-2 py-1 text-xs font-bold text-center text-gray-800 border bg-amber-400">Grade F</td>
                            </tr>
    
                            <tr>
                                <td class="px-1 py-1 text-xs font-semibold text-center text-gray-800 border h-14">91 - 100</td>
                                <td class="px-1 py-1 text-xs font-semibold text-center text-gray-800 border h-14">80 - 90</td>
                                <td class="px-1 py-1 text-xs font-semibold text-center text-gray-800 border h-14">60 - 79</td>
                                <td class="px-1 py-1 text-xs font-semibold text-center text-gray-800 border h-14">40 - 59</td>
                                <td class="px-1 py-1 text-xs font-semibold text-center text-gray-800 border h-14">20 -39</td>
                                <td class="px-1 py-1 text-xs font-semibold text-center text-gray-800 border h-14">0 - 19</td>
                                <td class="px-1 py-1 text-xs font-semibold text-center text-gray-800 border h-14">Absence</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="w-full border border-collapse table-fixed">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="px-2 py-1 text-white border" colspan="5">Academic Improvement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-2 py-1 font-bold text-center text-gray-800 border bg-amber-400">Progress 5</td>
                                <td class="px-2 py-1 font-bold text-center text-gray-800 border bg-amber-400">Progress 4</td>
                                <td class="px-2 py-1 font-bold text-center text-gray-800 border bg-amber-400">Progress 3</td>
                                <td class="px-2 py-1 font-bold text-center text-gray-800 border bg-amber-400">Progress 2</td>
                                <td class="px-2 py-1 font-bold text-center text-gray-800 border bg-amber-400">Progress 1</td>
                            </tr>
    
                            <tr>
                                <td class="h-14 border px-1 py-1 text-center text-[11px] font-semibold text-gray-800">Above Current Level</td>
                                <td class="h-14 border px-1 py-1 text-center text-[11px] font-semibold text-gray-800">Meets Current Level</td>
                                <td class="h-14 border px-1 py-1 text-center text-[11px] font-semibold text-gray-800">Progressing Towards Current Level</td>
                                <td class="h-14 border px-1 py-1 text-center text-[11px] font-semibold text-gray-800">Below Current Level</td>
                                <td class="h-14 border px-1 py-1 text-center text-[11px] font-semibold text-gray-800">Slow Progress</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="grid grid-cols-2 mt-3 text-xs gap-x-2">
                    <table class="border border-collapse table-fixed">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="h-14 w-[10%] border px-2 py-1 text-white">No</th>
                                <th class="h-14 w-[45%] border px-2 py-1 text-white">Major Subjects</th>
                                <th class="px-2 py-1 text-white border h-14 text-[11px]">Grade for Major Subjects & Academic Improvement </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($student["Subjects"]) < 4)
                                @foreach ($student["Subjects"] as $subName => $subjects)
                                    @foreach ($subjects as $name => $subject)
                                        <tr>
                                            <td class="text-xs text-center border">
                                                {{ $name == "Mark" ? $loop->parent->iteration : "" }}
                                            </td>
                                            <td class="px-2 text-xs border h-9">
                                                {{ $name != "Mark" ? $name : $subName }}
                                            </td>
                                            
                                            @if ($name == "Mark")
                                                <td class="text-center border">
                                                    {{ ReportCardGradeFormatIS::format($subject) }}
                                                </td>
                                            @else
                                                <td class="text-center border">
                                                    {{ $subject }}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                            @else
                                @foreach ($student["Subjects"] as $subName => $subjects)
                                    @if ($loop->iteration < 4)
                                        @foreach ($subjects as $name => $subject)
                                            <tr>
                                                <td class="text-xs text-center border">
                                                    {{ $name == "Mark" ? $loop->parent->iteration : "" }}
                                                </td>
                                                <td class="px-2 text-xs border h-9">
                                                    {{ $name != "Mark" ? $name : $subName }}
                                                </td>
                                                
                                                @if ($name == "Mark")
                                                    <td class="text-center border">
                                                        {{ ReportCardGradeFormatIS::format($subject) }}
                                                    </td>
                                                @else
                                                    <td class="text-center border">
                                                        {{ $subject }}
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        @break
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{-- Attendance --}}
                    <table class="border border-collapse table-fixed h-fit">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="py-1 text-white border" colspan="2">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #00223d">
                                <td class="w-1/2 py-1 text-center text-white border">Month</td>
                                <td class="w-1/2 py-1 text-center text-white border">Percentage</td>
                            </tr>
                            @foreach ($student["Attendance"] as $month => $percentage)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $month }}</td>
                                    <td class="px-4 py-2 border">{{ is_numeric($percentage) ? $percentage * 100 . "%" : $percentage }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="mx-auto my-[20px] rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [min-height:29.7cm] [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
                @if (count($student["Subjects"]) > 3)
                    <section class="grid grid-cols-2 text-xs gap-x-2">
                        <table class="border border-collapse table-fixed h-fit">
                            <tbody>
                                @foreach ($student["Subjects"] as $subName => $subjects)
                                    @if ($loop->iteration > 3)
                                        @foreach ($subjects as $name => $subject)
                                            <tr>
                                                <td class="w-[10%] text-xs border text-center">
                                                    {{ $name == "Mark" ? $loop->parent->iteration : "" }}
                                                </td>
                                                <td class="h-9 w-[45%] text-xs border px-2">
                                                    {{ $name != "Mark" ? $name : $subName }}
                                                </td>
                                                @if ($name == "Mark")
                                                    <td class="text-xs text-center border">
                                                        {{ ReportCardGradeFormatIS::format($subject) }}
                                                    </td>
                                                @else
                                                    <td class="text-xs text-center border">
                                                        {{ $subject }}
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="space-y-2">
                            @if (isset($student["Activity"]))
                                <table class="w-full border border-collapse table-fixed h-fit">
                                    <thead style="background-color: #00223d">
                                    <tr>
                                        <th class="py-1 text-white border" colspan="2">Grade for Add-on Subjects</th>
                                    </tr>
                                    <tr>
                                        <th class="w-1/2 py-1 text-white border">Add-on Subjects</th>
                                        <th class="w-1/2 py-1 text-white border">Grade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student["Activity"] as $name => $activity)
                                            <tr>
                                                <td class="px-4 py-2 border">{{ $name }}</td>
                                                <td class="px-4 py-2 text-center border">{{ ReportCardGradeFormatIS::format($activity) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <table class="w-full border border-collapse h-fit">
                                <thead style="background-color: #00223d">
                                <tr class="border">
                                    <th colspan="2" class="px-2 py-1 text-white">Grade for overall behaviour (A - Above 90, B - Between 80 and 90, C - Between 70 and 79, D - Between 60 and 69, E - Under 60)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($student["Behaviour"] as $name => $behaviour)
                                    <tr>
                                        <td class="w-3/4 px-4 border h-9">{{ $name }}</td>
                                        <td class="px-5 py-3 text-center border">{{ $behaviour }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                @endif
                <section class="mt-1 text-xs">
                    @foreach ($student["Review"] as $header => $remark)
                        <h5 class="font-semibold">{{ $header }}</h5>
                        <div class="mt-1">
                            {{ $remark }}
                        </div>
                    @endforeach
                </section>

                <section class="{{ count($student["Signs"]) == 1 ? "justify-end" : "justify-between" }} flex">
                    @foreach ($student["Signs"] as $text => $sign)
                        <div class="flex flex-col items-center justify-center gap-1">
                            <img src="{{ asset("storage/signs/" . $sign . ".png") }}" class="object-contain size-28" alt="Signature" />
                            <p class="w-32 text-xs font-bold text-center text-wrap">{{ $text }}</p>
                        </div>
                    @endforeach
                </section>
            </div>
        @endforeach
    </body>
</html>
