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
    </head>
    <body>
        @foreach ($students as $student)
            <div class="mx-auto my-[20px] min-h-[29.7cm] rounded-md border border-gray-300 bg-cover bg-center bg-no-repeat p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none" style="background-image: url('{{ asset("images/reportcardBackground/is_rcbg.png") }}')">
                <section class="mt-48">
                    <div class="grid grid-cols-3 gap-3">
                        @foreach ($student["Information"] as $name => $info)
                            <p class="text-sm">
                                <span class="font-semibold">{{ $name }} :</span>
                                <span>{{ $info }}</span>
                            </p>
                        @endforeach
                    </div>
                </section>
                <section class="mt-3 grid grid-cols-2 gap-x-2 text-xs">
                    <table class="h-fit w-full table-fixed border-collapse border">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="border px-2 py-1 text-white" colspan="5">Grade For Subjects</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border bg-amber-400 py-1 text-center">Grade A</td>
                                <td class="border bg-amber-400 py-1 text-center">Grade B</td>
                                <td class="border bg-amber-400 py-1 text-center">Grade C</td>
                                <td class="border bg-amber-400 py-1 text-center">Grade D</td>
                                <td class="border bg-amber-400 py-1 text-center">Grade E</td>
                            </tr>

                            <tr>
                                <td class="h-14 border text-center">80 to 100</td>
                                <td class="h-14 border text-center">60 to 79</td>
                                <td class="h-14 border text-center">40 to 59</td>
                                <td class="h-14 border text-center">20 to 39</td>
                                <td class="h-14 border text-center">0 to 19</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="w-full table-fixed border-collapse border">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="border px-2 py-1 text-white" colspan="5">Academic Improvement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border bg-amber-400 py-1 text-center">Progress 5</td>
                                <td class="border bg-amber-400 py-1 text-center">Progress 4</td>
                                <td class="border bg-amber-400 py-1 text-center">Progress 3</td>
                                <td class="border bg-amber-400 py-1 text-center">Progress 2</td>
                                <td class="border bg-amber-400 py-1 text-center">Progress 1</td>
                            </tr>

                            <tr>
                                <td class="h-14 border text-center">Above Current Level</td>
                                <td class="h-14 border text-center">Meets Current Level</td>
                                <td class="h-14 border text-center">Progressing Towards Current Level</td>
                                <td class="h-14 border text-center">Below Current Level</td>
                                <td class="h-14 border text-center">Slow Progress</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="mt-3 grid grid-cols-2 gap-x-2 text-xs">
                    <table class="table-fixed border-collapse border">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="w-[10%] border px-2 py-1 text-white">No</th>
                                <th class="w-[45%] border px-2 py-1 text-white">Subjects</th>
                                <th class="w-[45%] border px-2 py-1 text-white" colspan="5">Grade For Subjects & Academic Improvement</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($student["Subjects"]) < 4)
                                @foreach ($student["Subjects"] as $subName => $subjects)
                                    @foreach ($subjects as $name => $subject)
                                        <tr>
                                            <td class="border text-center">
                                                {{ $name == "Mark" ? $loop->parent->iteration : "" }}
                                            </td>
                                            <td class="h-9 border px-2">
                                                {{ $name != "Mark" ? $name : $subName }}
                                            </td>
                                            @if ($name == "Mark")
                                                @foreach ($defaultGrades as $defaultGrade)
                                                    @if (ReportCardGradeFormatIS::format($subject) == $defaultGrade)
                                                        <td class="border bg-amber-400 text-center">
                                                            {{ $defaultGrade }}
                                                        </td>
                                                    @else
                                                        <td class="border text-center">{{ $defaultGrade }}</td>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($defaultSkills as $defaultSkill)
                                                    @if ($subject == $defaultSkill)
                                                        <td class="border bg-green-500 text-center">
                                                            {{ $defaultSkill }}
                                                        </td>
                                                    @else
                                                        <td class="border text-center">{{ $defaultSkill }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                            @else
                                @foreach ($student["Subjects"] as $subName => $subjects)
                                    @if ($loop->iteration < 4)
                                        @foreach ($subjects as $name => $subject)
                                            <tr>
                                                <td class="border text-center">
                                                    {{ $name == "Mark" ? $loop->parent->iteration : "" }}
                                                </td>
                                                <td class="h-9 border px-2">
                                                    {{ $name != "Mark" ? $name : $subName }}
                                                </td>
                                                @if ($name == "Mark")
                                                    @foreach ($defaultGrades as $defaultGrade)
                                                        @if (ReportCardGradeFormatIS::format($subject) == $defaultGrade)
                                                            <td class="border bg-amber-400 text-center">
                                                                {{ $defaultGrade }}
                                                            </td>
                                                        @else
                                                            <td class="border text-center">{{ $defaultGrade }}</td>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($defaultSkills as $defaultSkill)
                                                        @if ($subject == $defaultSkill)
                                                            <td class="border bg-green-500 text-center">
                                                                {{ $defaultSkill }}
                                                            </td>
                                                        @else
                                                            <td class="border text-center">{{ $defaultSkill }}</td>
                                                        @endif
                                                    @endforeach
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
                    <table class="h-fit table-fixed border-collapse border">
                        <thead style="background-color: #00223d">
                            <tr>
                                <th class="border py-1 text-white" colspan="2">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #00223d">
                                <td class="w-1/2 border py-1 text-center text-white">Month</td>
                                <td class="w-1/2 border py-1 text-center text-white">Percentage</td>
                            </tr>
                            @foreach ($student["Attendance"] as $month => $percentage)
                                <tr>
                                    <td class="border px-4 py-2">{{ $month }}</td>
                                    <td class="border px-4 py-2">{{ is_numeric($percentage) ? $percentage * 100 . "%" : $percentage }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="mx-auto my-[20px] rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [min-height:29.7cm] [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
                @if (count($student["Subjects"]) > 3)
                    <section class="grid grid-cols-2 gap-x-2 text-xs">
                        <table class="h-fit table-fixed border-collapse border">
                            <tbody>
                                @foreach ($student["Subjects"] as $subName => $subjects)
                                    @if ($loop->iteration > 3)
                                        @foreach ($subjects as $name => $subject)
                                            <tr>
                                                <td class="w-[10%] border text-center">
                                                    {{ $name == "Mark" ? $loop->parent->iteration : "" }}
                                                </td>
                                                <td class="h-9 w-[45%] border px-2">
                                                    {{ $name != "Mark" ? $name : $subName }}
                                                </td>
                                                @if ($name == "Mark")
                                                    @foreach ($defaultGrades as $defaultGrade)
                                                        @if (ReportCardGradeFormatIS::format($subject) == $defaultGrade)
                                                            <td class="border bg-amber-400 text-center">
                                                                {{ $defaultGrade }}
                                                            </td>
                                                        @else
                                                            <td class="border text-center">{{ $defaultGrade }}</td>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($defaultSkills as $defaultSkill)
                                                        @if($subject == $defaultSkill)
                                                            <td class="border bg-green-500 text-center">
                                                                {{ $defaultSkill }}
                                                            </td>
                                                        @else
                                                            <td class="border text-center">{{ $defaultSkill }}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="space-y-2">
                            @if (isset($student["Activity"]))
                                <table class="h-fit table-fixed border-collapse border w-full">
                                    <thead style="background-color: #00223d">
                                    <tr>
                                        <th class="border py-1 text-white" colspan="2">Grading For Activities Subjects</th>
                                    </tr>
                                    <tr>
                                        <th class="w-1/2 border py-1 text-white">Subjects</th>
                                        <th class="w-1/2 border py-1 text-white">Grade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student["Activity"] as $name => $activity)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $name }}</td>
                                                <td class="border px-4 py-2">{{ $activity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <table class="h-fit w-full border-collapse border">
                                <thead style="background-color: #00223d">
                                <tr class="border">
                                    <th colspan="6" class="py-1 px-2 text-white">Grade for overall behaviour (A - Above 90, B - Between 80 and 90, C - Between 70 and 79, D - Between 60 and 69, E - Under 60)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($student["Behaviour"] as $name => $behaviour)
                                    <tr>
                                        <td class="h-9 w-3/4 border px-4">{{ $name }}</td>
                                        @foreach ($defaultGrades as $defaultGrade)
                                            @if ($behaviour == $defaultGrade)
                                                <td class="border bg-amber-400 py-3 px-5 text-center">{{ $defaultGrade }}</td>
                                            @else
                                                <td class="border py-3 px-5 text-center">{{ $defaultGrade }}</td>
                                            @endif
                                        @endforeach
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
                            <img src="{{ asset("storage/signs/" . $sign . ".png") }}" class="size-32 object-contain" alt="Signature" />
                            <p class="w-32 text-wrap text-center text-xs font-bold">{{ $text }}</p>
                        </div>
                    @endforeach
                </section>
            </div>
        @endforeach
    </body>
</html>
