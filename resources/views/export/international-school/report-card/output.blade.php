@php
    use App\Helpers\ReportCardGradeFormatIS;
    use Carbon\Carbon;
    $defaultGrades = ['A', 'B', 'C', 'D', 'E'];
    $defaultSkills = ["5","4","3","2","1"];
@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@foreach($students as $student)
    <div
        class="[width:21cm] min-h-[29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none text-gray-900 bg-center bg-cover bg-no-repeat"
        style="background-image: url('{{ asset('images/reportcardBackground/is_rcbg.png') }}')">
        <section class="mt-48">
            <div class="grid grid-cols-3 gap-3">
                @foreach($student["Info"] as $name => $info)
                    <p class="text-sm">
                        <span class="font-semibold">{{ $name }} : </span>
                        <span>{{ strtotime($info) ? Carbon::parse($info)->format("d-M-Y") : $info }}</span>
                    </p>
                @endforeach
                {{--<p class="text-sm">
                    <span class="font-semibold">Name : </span>
                    <span>{{ $student["Name"]["Value"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">School Year : </span>
                    <span>{{ $student["School Year"]["Value"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Grade : </span>
                    <span>{{ $student["Grade"]["Value"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Term : </span>
                    <span>{{ $student["Term"]["Value"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Campus : </span>
                    <span>{{ $student["Campus"]["Value"] }}</span>
                </p>--}}
{{--                <p class="text-sm">--}}
{{--                    <span class="font-semibold">Date : </span>--}}
{{--                    <span>{{ Carbon::parse($student["Date"])->format("d-M-Y") }}</span>--}}
{{--                </p>--}}
            </div>
        </section>
        <section class="grid grid-cols-2 mt-3 text-xs gap-x-2">
            <table class="w-full table-fixed border border-collapse h-fit">
                <thead style="background-color: #00223d;">
                <tr>
                    <th class="border px-2 py-1 text-white" colspan="5">Grade For Subjects</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border py-1 bg-amber-400 text-center">Grade A</td>
                    <td class="border py-1 bg-amber-400 text-center">Grade B</td>
                    <td class="border py-1 bg-amber-400 text-center">Grade C</td>
                    <td class="border py-1 bg-amber-400 text-center">Grade D</td>
                    <td class="border py-1 bg-amber-400 text-center">Grade E</td>
                </tr>

                <tr>
                    <td class="border h-14 text-center">81 to 100</td>
                    <td class="border h-14 text-center">61 to 80</td>
                    <td class="border h-14 text-center">41 to 60</td>
                    <td class="border h-14 text-center">21 to 40</td>
                    <td class="border h-14 text-center">0 to 20</td>
                </tr>
                </tbody>
            </table>

            <table class="w-full table-fixed border border-collapse">
                <thead style="background-color: #00223d;">
                <tr>
                    <th class="border px-2 py-1 text-white" colspan="5">Academic Improvement</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border py-1 bg-amber-400 text-center">Progress 5</td>
                    <td class="border py-1 bg-amber-400 text-center">Progress 4</td>
                    <td class="border py-1 bg-amber-400 text-center">Progress 3</td>
                    <td class="border py-1 bg-amber-400 text-center">Progress 2</td>
                    <td class="border py-1 bg-amber-400 text-center">Progress 1</td>
                </tr>

                <tr>
                    <td class="border h-14 text-center">Above Current Level</td>
                    <td class="border h-14 text-center">Meets Current Level</td>
                    <td class="border h-14 text-center">Progressing Towards Current Level</td>
                    <td class="border h-14 text-center">Below Current Level</td>
                    <td class="border h-14 text-center">Slow Progress</td>
                </tr>
                </tbody>
            </table>
        </section>

        <section class="grid grid-cols-2 gap-x-2 text-xs mt-3">
            <table class="border border-collapse table-fixed">
                <thead style="background-color: #00223d;">
                    <tr>
                        <th class="border px-2 py-1 w-[10%] text-white">No</th>
                        <th class="border px-2 py-1 w-[45%] text-white">Subjects</th>
                        <th class="border px-2 py-1 w-[45%] text-white" colspan="5">Grade For Subjects & Academic Improvement</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($student["Subject"]) < 4)
                        @foreach($student["Subject"] as $subName => $subjects)
                            @foreach($subjects as $name => $subject)
                                <tr>
                                    <td class="border text-center">{{ ($name == "Mark") ? $loop->parent->iteration : "" }}</td>
                                    <td class="border px-2 h-9">
                                        {{ $name != "Mark" ? $name: $subName }}
                                    </td>
                                    @if($name == "Mark")
                                        @foreach($defaultGrades as $defaultGrade)
                                            @if(ReportCardGradeFormatIS::format($subject) == $defaultGrade)
                                                <td class="border text-center bg-amber-400">{{ $defaultGrade }}</td>
                                            @else
                                                <td class="border text-center">{{ $defaultGrade }}</td>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($defaultSkills as $defaultSkill)
                                            @if($subject == $defaultSkill)
                                                <td class="border text-center bg-green-500">{{ $defaultSkill }}</td>
                                            @else
                                                <td class="border text-center">{{ $defaultSkill }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        @foreach($student["Subject"] as $subName => $subjects)
                            @if($loop->iteration < 4)
                                @foreach($subjects as $name => $subject)
                                    <tr>
                                        <td class="border text-center">{{ ($name == "Mark") ? $loop->parent->iteration : "" }}</td>
                                        <td class="border px-2 h-9">
                                            {{ $name != "Mark" ? $name: $subName }}
                                        </td>
                                        @if($name == "Mark")
                                            @foreach($defaultGrades as $defaultGrade)
                                                @if(ReportCardGradeFormatIS::format($subject) == $defaultGrade)
                                                    <td class="border text-center bg-amber-400">{{ $defaultGrade }}</td>
                                                @else
                                                    <td class="border text-center">{{ $defaultGrade }}</td>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($defaultSkills as $defaultSkill)
                                                @if($subject == $defaultSkill)
                                                    <td class="border text-center bg-green-500">{{ $defaultSkill }}</td>
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
            <table class="border border-collapse table-fixed h-fit">
                <thead style="background-color: #00223d;">
                    <tr>
                        <th class="border py-1 text-white" colspan="2">Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color: #00223d;">
                        <td class="border w-1/2 text-center py-1 text-white">Month</td>
                        <td class="border w-1/2 text-center py-1 text-white">Percentage</td>
                    </tr>
                    @foreach($student["Month"] as $name => $month)
                        <tr>
                            <td class="border px-4 py-2">{{ $name }}</td>
                            <td class="border px-4 py-2">{{ $month }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m- print:border-none print:rounded-none print:break-after-page print:shadow-none text-gray-900">
        @if(count($student["Subject"]) > 3)
            <section class="grid grid-cols-2 gap-x-2 text-xs mt-3">
                <table class="border border-collapse table-fixed h-fit">
                    <tbody>
                    @foreach($student["Subject"] as $subName => $subjects)
                        @if($loop->iteration > 3)
                            @foreach($subjects as $name => $subject)
                                <tr>
                                    <td class="border text-center w-[10%]">{{ ($name == "Mark") ? $loop->parent->iteration : "" }}</td>
                                    <td class="border px-2 w-[45%] h-9">
                                        {{ $name != "Mark" ? $name: $subName }}
                                    </td>
                                    @if($name == "Mark")
                                        @foreach($defaultGrades as $defaultGrade)
                                            @if(ReportCardGradeFormatIS::format($subject) == $defaultGrade)
                                                <td class="border text-center bg-amber-400">{{ $defaultGrade }}</td>
                                            @else
                                                <td class="border text-center">{{ $defaultGrade }}</td>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($defaultSkills as $defaultSkill)
                                            @if($subject == $defaultSkill)
                                                <td class="border text-center bg-green-500">{{ $defaultSkill }}</td>
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
                @if(isset($student["Activity"]))
                    <table class="table-fixed h-fit border border-collapse">
                        <thead style="background-color: #00223d;">
                            <tr>
                                <th class="border py-1 text-white" colspan="2">Grading For Activities Subjects</th>
                            </tr>
                            <tr>
                                <th class="border py-1 text-white w-1/2">Subjects</th>
                                <th class="border py-1 text-white w-1/2">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student["Activity"] as $name => $activity)
                                <tr>
                                    <td class="border px-4 py-2">{{ $name }}</td>
                                    <td class="border px-4 py-2">{{ $activity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>
        @else
            @if(isset($student["Activity"]))
                <section class="text-xs mt-3">
                    <table class="border border-collapse table-fixed h-fit w-full">
                        <thead style="background-color: #00223d;">
                        <tr>
                            <th colspan="{{ count($student["Activity"]) }}" class="border py-1 text-white">Grading For Activities Subjects</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($student["Activity"] as $name => $activity)
                                <td style="background-color: #00223d;" class="border py-1 w-[14%] text-white text-center">{{ $name }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($student["Activity"] as $name => $activity)
                                <td class="border py-1 w-[14%] text-center">{{ $activity }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </section>
            @endif
        @endif

        <section class="mt-3 text-xs">
            <table class="border border-collapse w-full h-fit">
                <thead style="background-color: #00223d;">
                    <tr class="border">
                        <th colspan="6" class="py-1 text-white">Grade for overall behaviour (A - Above 90, B - Between 80 and 90, C - Between 70 and 79, D - Between 60 and 69, E - Under 60)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student["Behaviour"] as $name => $behaviour)
                        <tr>
                            <td class="border h-9 w-3/4 px-4">{{ $name }}</td>
                            @foreach($defaultGrades as $defaultGrade)
                                @if($behaviour == $defaultGrade)
                                    <td class="border py-2 text-center bg-amber-400">{{ $defaultGrade }}</td>
                                @else
                                    <td class="border py-2 text-center">{{ $defaultGrade }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="mt-3 text-xs">
            @foreach($student["Remark"] as $name => $remark)
                <h5 class="font-semibold">{{ $name }}</h5>
                <div class="mt-2">
                    {{ $remark }}
                </div>
            @endforeach
        </section>

        <section class="mt-5 text-xs">
            @if(count($student["Sign"]) > 1)
                <div class="flex justify-between">
                    @foreach($student["Sign"] as $name => $sign)
                        <div class="flex flex-col gap-2">
                            <img src="{{ asset('storage/signs/'.$sign.".png") }}" alt="sign" class="h-28 w-28 object-contain" />
                            <p class="w-32 text-center font-semibold">{{ $name }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex justify-end">
                    @foreach($student["Sign"] as $name => $sign)
                        <div class="flex flex-col gap-2">
                            <img src="{{ asset('storage/signs/'.$sign.".png") }}" alt="sign" class="h-28 w-28 object-contain" />
                            <p class="w-28 text-center font-semibold">{{ $name }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
@endforeach

</body>
</html>

