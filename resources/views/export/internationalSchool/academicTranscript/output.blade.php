@php
    use App\Helpers\AcademicTranscriptGradeFormatIS;
    use Carbon\Carbon;
@endphp

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ config("app.name", "Laravel") }}</title>
    <!-- Scripts -->
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body>
@foreach ($students as $student)
    <div
        class="mx-auto my-[20px] grid min-h-[29.7cm] grid-cols-3 grid-rows-10 rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none"
        style="background: url('{{ asset("images/graduationBackground/is_certificate.png") }}'); background-size: 100% auto">
        <h1 class="col-span-3 row-start-5 mb-3 mt-auto text-center font-medium text-[#9e7330]">{{ $student["Information"]["Name"] }}</h1>
        <h2 class="col-span-3 row-start-7 -mt-1 text-center text-2xl font-medium text-[#9e7330]">{{ $student["Information"]["Grade"] }}</h2>
        <h3 class="row-start-8 ml-auto mr-6 mt-16 font-medium text-[#9e7330]">{{ $student["Information"]["Issuance Date"] }}</h3>
    </div>
    <div
        class="mx-auto my-[20px] min-h-[29.7cm] rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
        <div class="h-[29cm] space-y-4 rounded-md border border-[#00223d] p-3">
            <section class="mx-auto flex w-[90%] items-center justify-between">
                <div class="h-fit rounded-xl border-2 border-[#00223d] px-3 py-4 text-center text-3xl">
                    <p>KBTC International School</p>
                    <p>Academic Transcript</p>
                </div>
                <div>
                    <img src="{{ asset("images/logos/islogo.jpg") }}" class="w-36" alt="InternationalSchoolLogo"/>
                </div>
            </section>
            <section>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($student["Information"] as $name => $info)
                        @if ($name != "Program" && $name != "Campus")
                            <p class="text-sm">
                                <span class="font-semibold">{{ $name }} :</span>
                                <span>{{ $info }}</span>
                            </p>
                        @endif
                    @endforeach
                </div>
            </section>
            <section class="space-y-1">
                <p class="text-sm font-medium">Total Guided Learning Hours and Grade of Main Subjects</p>
                <div>
                    <table class="w-full border-collapse border text-xs">
                        <thead class="bg-[#00223d] text-white">
                        <tr>
                            <th class="border px-6 py-1 text-white">Main Subjects</th>
                            <th class="border px-6 py-1 text-white">Total Guided Learning Hours</th>
                            <th class="border px-6 py-1 text-white">Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($student["Subjects"] as $subjectName => $mark)
                            <tr>
                                <td class="border px-6 py-1">{{ $subjectName }}</td>
                                <td class="border px-6 py-1">
                                    {{ $learningHours->where("grade", "=", $student["Information"]["Grade"])->where("program", "=", $student["Information"]["Program"])->where("campus", "=", $student["Information"]["Campus"])->where("subjectcategory", "=", "mainsubjects")->where("subjectname", "=", $subjectName)->first()->hour }}
                                </td>
                                <td class="border px-6 py-1">
                                    {{ AcademicTranscriptGradeFormatIS::format($mark["Mark"]) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="space-y-1">
                <p class="text-sm font-medium">Total Guided Learning Hours of Add-on Subjects</p>
                <div>
                    <table class="w-full border-collapse border text-xs">
                        <thead class="bg-[#00223d] text-white">
                        <tr>
                            <th class="border px-6 py-1 text-white">Add-on Subjects</th>
                            <th class="border px-6 py-1 text-white">Total Guided Learning Hours</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($learningHours->where("grade", "=", $student["Information"]["Grade"])->where("program", "=", $student["Information"]["Program"])->where("campus", "=", $student["Information"]["Campus"])->where("subjectcategory", "=", "addonsubjects") as $subject)
                            <tr>
                                <td class="border px-6 py-1">{{ $subject->subjectname }}</td>
                                <td class="border px-6 py-1">{{ $subject->hour }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
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
                        <img src="{{ asset("storage/signs/" . $sign . ".png") }}" class="size-44 object-contain"
                             alt="Signature"/>
                        <p class="w-32 text-wrap text-center text-xs font-bold">{{ $text }}</p>
                    </div>
                @endforeach
            </section>
        </div>
    </div>
    <div
        class="mx-auto my-[20px] rounded-md border border-gray-300 p-[12px] text-gray-900 shadow-md [min-height:29.7cm] [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
        <div class="h-[29cm] space-y-4 rounded-md border border-[#00223d] p-3">
            <section class="space-y-1">
                <h1 class="text-sm font-semibold">Explanatory Notes</h1>
                <div>
                    <table class="w-full border-collapse border text-xs">
                        <thead class="bg-[#00223d] uppercase text-white">
                        <tr>
                            <th class="border px-14 py-2 text-white">Grade</th>
                            <th class="border px-14 py-2 text-white">Mark</th>
                            <th class="border px-6 py-2 text-white">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border px-6 py-2">Genius (A*)</td>
                            <td class="border px-6 py-2">91 - 100</td>
                            <td class="border px-6 py-2">Candidate has superb performance and skills over this subject
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-6 py-2">Distinction (A)</td>
                            <td class="border px-6 py-2">80 - 90</td>
                            <td class="border px-6 py-2">Candidate demonstrated outstanding performance satisfying all
                                learning outcomes and significantly exceeding a number of them
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-6 py-2">Merit (B)</td>
                            <td class="border px-6 py-2">60 - 79</td>
                            <td class="border px-6 py-2">Candidate demonstrated strong performance satisfying all
                                learning outcomes and exceeding a number of them
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-6 py-2">Pass (C)</td>
                            <td class="border px-6 py-2">40 - 59</td>
                            <td class="border px-6 py-2">Candidate demonstrated competent performance satisfying all
                                learning outcomes
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-6 py-2">Fail (D)</td>
                            <td class="border px-6 py-2">20 - 39</td>
                            <td class="border px-6 py-2">Candidate did not satisfy all of the learning outcomes</td>
                        </tr>
                        <tr>
                            <td class="border px-6 py-2">Incomplete (E)</td>
                            <td class="border px-6 py-2">0 - 19</td>
                            <td class="border px-6 py-2">Candidate only has meagre and insufficient knowledge on this
                                subject
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-6 py-2">Absent (F)</td>
                            <td class="border px-6 py-2">-</td>
                            <td class="border px-6 py-2">Candidate has completed some component(s) of unit assessment
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="space-y-1">
                <h1 class="text-sm font-semibold">Conditions of Issue :</h1>
                <div>
                    <ol class="list-decimal space-y-2 ps-10 text-sm">
                        <li class="ps-3">
                            <span class="font-semibold">Fulfilment of Academic Requirements :</span>
                            The academic transcript will be issued upon successful completion of all academic
                            requirements for the specified program of study at KBTC International School. This includes
                            meeting credit hour requirements, passing required courses, and fulfilling any other
                            program-specific criteria.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Clearance of Financial Obligations :</span>
                            The academic transcript will only be released once all financial obligations, including
                            tuition fees, library fines, and any outstanding payments, have been settled in full.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Return of School Property :</span>
                            The student must return any school property, including library materials, and any other
                            items borrowed or leased, before the academic transcript can be issued.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Resolution of Outstanding Issues :</span>
                            If there are any outstanding issues or concerns related to academic performance, behaviour,
                            or other matters, those must be resolved before the academic transcript can be released.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Compliance with School Policies :</span>
                            The student must have complied with all school policies and regulations during their
                            enrolment at KBTC International School.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Request and Processing Time :</span>
                            The academic transcript will be processed within a reasonable timeframe after an official
                            request is submitted by the student or authorized party. The school may have a specific
                            procedure for transcript requests, and all required forms must be completed.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Confidentiality and Third-Party Requests :</span>
                            The academic transcript will be released in accordance with the school's policies on
                            confidentiality. Third-party requests for transcripts may require additional authorization
                            from the student.
                        </li>
                    </ol>
                </div>
            </section>
            <section class="pt-28">
                <img src="{{ asset("images/logos/brands.png") }}" class="h-full w-full object-cover" alt="brands"/>
            </section>
        </div>
    </div>
@endforeach
    </body>
</html>
