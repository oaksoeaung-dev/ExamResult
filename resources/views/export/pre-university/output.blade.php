@php
    use App\Helpers\ReportCardGradeFormatPreUni;
    use Carbon\Carbon;
    $defaultGrades = ['A', 'B', 'C', 'D', 'E'];
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
        style="background-image: url('{{ asset('images/reportcardBackground/preuni_rcbg.png') }}')">
        <section class="mt-48">
            <div class="grid grid-cols-3 gap-2">
                <p class="text-sm">
                    <span class="font-semibold">Name : </span>
                    <span>{{ $student["Name"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">School Year : </span>
                    <span>{{ $student["School Year"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Grade : </span>
                    <span>{{ $student["Grade"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Term : </span>
                    <span>{{ $student["Term"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Campus : </span>
                    <span>{{ $student["Campus"] }}</span>
                </p>
                <p class="text-sm">
                    <span class="font-semibold">Date Of Birth : </span>
                    <span>{{ Carbon::parse($student["Date"])->format("d-M-Y") }}</span>
                </p>
            </div>
        </section>
        <section class="mt-3">
            @if($marks == "80marks")
                <table class="w-full border-collapse border">
                    <thead class="bg-[#00223d]">
                    <tr>
                        <td class="text-xs text-white text-center py-1 border" colspan="4">Academic Progress</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">Grade A</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">Grade B</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">Grade C</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">Grade D</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">61 - 80</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">41 - 60</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">21 - 40</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">0 - 20</td>
                    </tr>
                    </tbody>
                </table>
            @elseif($marks == "50marks")
                <table class="w-full border-collapse border">
                    <thead class="bg-[#00223d]">
                    <tr>
                        <td class="text-xs text-white text-center py-1 font-semibold border" colspan="3">Academic
                            Progress
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">Grade A</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">Grade B</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">Grade C</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">50 - 31</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">30 - 16</td>
                        <td class="px-6 py-1 text-xs font-semibold border text-center">15 - 0</td>
                    </tr>
                    </tbody>
                </table>
            @endif
        </section>
        <section class="mt-3 grid grid-cols-2 gap-3">
            <table class="w-full h-fit border border-collapse">
                <thead class="bg-[#00223d]">
                <tr>
                    <td class="text-xs text-white text-center py-2 border" colspan="3">Marks And Grade</td>
                </tr>
                <tr>
                    <td class="text-xs text-white text-center py-2 border">Subjects</td>
                    <td class="text-xs text-white text-center py-2 border">Marks</td>
                    <td class="text-xs text-white text-center py-2 border">Grade</td>
                </tr>
                </thead>
                <tbody>
                @foreach($student["subjects"] as $name => $mark)
                    <tr>
                        <td class="text-xs px-6 py-2 border">
                            {{ $name }}
                        </td>
                        <td class="text-xs text-center py-2 border">
                            {{ $mark }}
                        </td>
                        <td class="text-xs text-center py-2 border">
                            {{ ReportCardGradeFormatPreUni::format($mark,$marks) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="w-full h-fit border border-collapse">
                <thead class="bg-[#00223d]">
                    <tr>
                        <td class="text-xs text-white text-center py-2 border" colspan="3">Monthly Attendance</td>
                    </tr>
                    <tr>
                        <td class="text-xs text-white text-center py-2 border">Month</td>
                        <td class="text-xs text-white text-center py-2 border">Percentage</td>
                        <td class="text-xs text-white text-center py-2 border">Remark</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($student["months"] as $name => $percentage)
                    <tr>
                        <td class="text-xs px-6 py-2 border">
                            {{ $name }}
                        </td>
                        @if(Str::contains($percentage, ','))
                            <td class="text-xs text-center py-2 border">
                                {{ Str::before($percentage,',') }}
                            </td>
                            <td class="text-xs text-center py-2 border">
                                {{ Str::after($percentage,',') }}
                            </td>
                        @else
                            <td class="text-xs text-center py-2 border">
                                {{ $percentage }}
                            </td>
                            <td class="text-xs text-center py-2 border">

                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none text-gray-900">
        <section>
            <table class="w-full h-fit border border-collapse">
                <thead class="bg-[#00223d]">
                    <tr>
                        <td class="text-xs text-white text-center py-2 border" colspan="5">Grade For Overall Behaviour</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-xs text-center py-2 border">A - Above 90</td>
                        <td class="text-xs text-center py-2 border">B - Between 80 and 90</td>
                        <td class="text-xs text-center py-2 border">C - Between 70 and 79</td>
                        <td class="text-xs text-center py-2 border">D - Between 60 and 69</td>
                        <td class="text-xs text-center py-2 border">E - Under 60</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="mt-5">
            <table class="w-full h-fit border border-collapse">
                <thead class="bg-[#00223d]">
                    <tr>
                        <td class="text-xs text-white text-center py-2 border" colspan="6">Overall Behaviour</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student["behaviour"] as $name => $grade)
                        <tr>
                            <td class="text-xs px-6 py-2 border">{{ $name }}</td>
                            @foreach($defaultGrades as $defaultGrade)
                                <td class="px-2 py-2 border text-center text-xs {{ ($grade == $defaultGrade) ? 'bg-green-500' : '' }}">{{ $defaultGrade }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="mt-5">
            <h2 class="text-sm font-semibold">Feedback Of The Class Teacher</h2>
            <p class="mt-3 text-sm text-justify">
                {{ $student["Feedback Of The Class Teacher"] }}
            </p>
        </section>

        <section class="mt-5 flex justify-end">
            <div class="flex flex-col justify-center items-center gap-1">
                <p class="text-xs font-bold">Class Teacher's Sign</p>
                <img src="{{ asset('storage/signs/'.$student["Class Teacher Sign"].".png") }}" class="h-28 w-28 object-cover" alt="SignatureOfClassTeacher">
            </div>
        </section>
    </div>
@endforeach

</body>
</html>

