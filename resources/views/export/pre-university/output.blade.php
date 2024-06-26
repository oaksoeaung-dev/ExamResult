@php
    use App\Helpers\ReportCardGradeFormatPreUni;
    use Carbon\Carbon;
    $defaultGrades = ["A", "B", "C", "D", "E"];
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ config("app.name", "Laravel") }}</title>
        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        @foreach ($students as $student)
            <div
                class="mx-auto my-[20px] min-h-[29.7cm] rounded-md border border-gray-300 bg-cover bg-center bg-no-repeat p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none"
                style="background-image: url('{{ asset("images/reportcardBackground/preuni_rcbg.png") }}')"
            >
                <section class="mt-48">
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-sm">
                            <span class="font-semibold">Name :</span>
                            <span>{{ $student["Name"] }}</span>
                        </p>
                        <p class="text-sm">
                            <span class="font-semibold">School Year :</span>
                            <span>{{ $student["School Year"] }}</span>
                        </p>
                        <p class="text-sm">
                            <span class="font-semibold">Grade :</span>
                            <span>{{ $student["Grade"] }}</span>
                        </p>
                        <p class="text-sm">
                            <span class="font-semibold">Term :</span>
                            <span>{{ $student["Term"] }}</span>
                        </p>
                        <p class="text-sm">
                            <span class="font-semibold">Campus :</span>
                            <span>{{ $student["Campus"] }}</span>
                        </p>
                        <p class="text-sm">
                            <span class="font-semibold">Date :</span>
                            <span>{{ Carbon::parse($student["Date"])->format("d-M-Y") }}</span>
                        </p>
                    </div>
                </section>
                <section class="mt-3">
                    @if ($marks == "80marks")
                        <table class="w-full border-collapse border">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <td class="border py-1 text-center text-xs text-white" colspan="4">
                                        Academic Progress
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">Grade A</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">Grade B</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">Grade C</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">Grade D</td>
                                </tr>
                                <tr>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">61 - 80</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">41 - 60</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">21 - 40</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">0 - 20</td>
                                </tr>
                            </tbody>
                        </table>
                    @elseif ($marks == "50marks")
                        <table class="w-full border-collapse border">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <td class="border py-1 text-center text-xs font-semibold text-white" colspan="3">
                                        Academic Progress
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">Grade A</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">Grade B</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">Grade C</td>
                                </tr>
                                <tr>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">50 - 31</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">30 - 16</td>
                                    <td class="border px-6 py-1 text-center text-xs font-semibold">15 - 0</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </section>
                <section class="mt-3 grid grid-cols-2 gap-3">
                    <table class="h-fit w-full border-collapse border">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="border py-2 text-center text-xs text-white" colspan="3">Marks And Grade</td>
                            </tr>
                            <tr>
                                <td class="border py-2 text-center text-xs text-white">Subjects</td>
                                <td class="border py-2 text-center text-xs text-white">Marks</td>
                                <td class="border py-2 text-center text-xs text-white">Grade</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["subjects"] as $name => $mark)
                                <tr>
                                    <td class="border px-6 py-2 text-xs">
                                        {{ $name }}
                                    </td>
                                    <td class="border py-2 text-center text-xs">
                                        {{ $mark }}
                                    </td>
                                    <td class="border py-2 text-center text-xs">
                                        {{ ReportCardGradeFormatPreUni::format($mark, $marks) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="h-fit w-full border-collapse border">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="border py-2 text-center text-xs text-white" colspan="3">
                                    Monthly Attendance
                                </td>
                            </tr>
                            <tr>
                                <td class="border py-2 text-center text-xs text-white">Month</td>
                                <td class="border py-2 text-center text-xs text-white">Percentage</td>
                                <td class="border py-2 text-center text-xs text-white">Remark</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["months"] as $name => $percentage)
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
            <div
                class="mx-auto my-[20px] rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [min-height:29.7cm] [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none"
            >
                <section>
                    <table class="h-fit w-full border-collapse border">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <td class="border py-2 text-center text-xs text-white" colspan="5">
                                    Grade For Overall Behaviour
                                </td>
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
                                <td class="border py-2 text-center text-xs text-white" colspan="6">
                                    Overall Behaviour
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student["behaviour"] as $name => $grade)
                                <tr>
                                    <td class="border px-6 py-2 text-xs">{{ $name }}</td>
                                    @foreach ($defaultGrades as $defaultGrade)
                                        <td
                                            class="{{ $grade == $defaultGrade ? "bg-green-500" : "" }} border px-2 py-2 text-center text-xs"
                                        >
                                            {{ $defaultGrade }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

                <section class="mt-5">
                    <h2 class="text-sm font-semibold">Feedback Of The Class Teacher</h2>
                    <p class="mt-3 text-justify text-sm">
                        {{ $student["Feedback Of The Class Teacher"] }}
                    </p>
                </section>

                <section class="mt-5 flex justify-end">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <p class="text-xs font-bold">Class Teacher's Sign</p>
                        <img
                            src="{{ asset("storage/signs/" . $student["Class Teacher Sign"] . ".png") }}"
                            class="h-28 w-28 object-contain"
                            alt="SignatureOfClassTeacher"
                        />
                    </div>
                </section>
            </div>
        @endforeach
    </body>
</html>
