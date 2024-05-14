@php use App\Helpers\AcademicTranscriptGradeFormatIS;use Carbon\Carbon; @endphp
@php
    /*foreach($records as $record){
        //echo AcademicTranscriptGradeFormatIS::format($record["Science"]);
        foreach ($record as $name => $column){
            echo $name."=>";
            echo $column;
            echo "<br/>";

        }

    }*/

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
        class="[width:21cm] min-h-[29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none text-gray-900">
        <div class="border border-[#00223d] p-3 h-[29cm] rounded-md space-y-4">
            <section class="flex justify-between items-center w-[90%] mx-auto">
                <div class="border-2 border-[#00223d] text-3xl h-fit px-3 py-4 rounded-xl text-center">
                    <p>KBTC International School</p>
                    <p>Academic Transcript</p>
                </div>
                <div>
                    <img src="{{ asset('images/logos/islogo.jpg') }}" class="w-36" alt="InternationalSchoolLogo"/>
                </div>
            </section>
            <section>
                <div class="grid grid-cols-3 gap-4">
                    <p class="text-sm">
                        <span class="font-semibold">Name : </span>
                        <span>{{ $student["Name"] }}</span>
                    </p>
                    <p class="text-sm">
                        <span class="font-semibold">Academic Year : </span>
                        <span>{{ $student["Academic Year"] }}</span>
                    </p>
                    <p class="text-sm">
                        <span class="font-semibold">Grade : </span>
                        <span>{{ $student["Grade"] }}</span>
                    </p>
                    <p class="text-sm">
                        <span class="font-semibold">Date Of Birth : </span>
                        <span>{{ Carbon::parse($student["Date Of Birth"])->format("d-M-Y") }}</span>
                    </p>
                    <p class="text-sm">
                        <span class="font-semibold">Student ID : </span>
                        <span>{{ $student["Student ID"] }}</span>
                    </p>
                    <p class="text-sm">
                        <span class="font-semibold">Issuance Date : </span>
                        <span>{{ Carbon::parse($student["Issuance Date"])->format("d-M-Y") }}</span>
                    </p>
                </div>
            </section>
            <section class="space-y-1">
                <p class="text-sm font-medium">Total Guided Learning Hours and Grade of Main Subjects</p>
                <div>
                    <table class="text-xs w-full border-collapse border">
                        <thead class=" bg-[#00223d] text-white">
                        <tr>
                            <th class="px-6 py-1 border text-white">Main Subjects</th>
                            <th class="px-6 py-1 border text-white">Total Guided Learning Hours</th>
                            <th class="px-6 py-1 border text-white">Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($student["MainSubjects"] as $subjectName => $mark)
                            <tr>
                                <td class="px-6 py-1 border">{{ $subjectName }}</td>
                                <td class="px-6 py-1 border">{{ $learningHours->where('grade','=',$student["Grade"])->where('program',"=",$student["Program"])->where('campus',"=",$student["Campus"])->where('subjectcategory',"=","mainsubjects")->where("subjectname","=",$subjectName)->first()->hour }}</td>
                                <td class="px-6 py-1 border">{{ AcademicTranscriptGradeFormatIS::format($mark) }}</td>
                            </tr>
                        @endforeach
                        {{--<tr>
                            <td class="px-6 py-1 border">Maths</td>
                            <td class="px-6 py-1 border">87.5</td>
                            <td class="px-6 py-1 border">A*</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-1 border">Science</td>
                            <td class="px-6 py-1 border">87.5</td>
                            <td class="px-6 py-1 border">A*</td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="space-y-1">
                <p class="text-sm font-medium">Total Guided Learning Hours of Add-on Subjects</>
                <div>
                    <table class="text-xs w-full border-collapse border">
                        <thead class=" bg-[#00223d] text-white">
                        <tr>
                            <th class="px-6 py-1 border text-white">Add-on Subjects</th>
                            <th class="px-6 py-1 border text-white">Total Guided Learning Hours</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($learningHours->where('grade','=',$student["Grade"])->where('program',"=",$student["Program"])->where('campus',"=",$student["Campus"])->where('subjectcategory',"=","addonsubjects") as $subject)
                            <tr>
                                <td class="px-6 py-1 border">{{ $subject->subjectname }}</td>
                                <td class="px-6 py-1 border">{{ $subject->hour }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="space-y-1">
                <h1 class="text-sm font-medium">Remark of the Class Teacher</h1>
                <div class="text-sm">
                    <p>{{ $student["Remark"] }}</p>
                </div>
            </section>
            <section class="flex justify-between">
                <div class="flex flex-col justify-center items-center gap-1">
                    <img src="{{ asset('storage/signs/'.$student["Class Teacher Sign"].".png") }}" class="h-20 w-20 object-cover" alt="SignatureOfClassTeacher">
                    <p class="text-xs font-bold">Signature of Class Teacher</p>
                </div>
                <div class="flex flex-col justify-center items-center gap-2">
                    <img src="{{ asset('storage/signs/'.$student["Dean Sign"].".png") }}" class="h-20 w-20 object-cover" alt="SignatureOfDean">
                    @switch(strtolower($student["Division"]))
                        @case("lower")
                            <p class="text-xs font-bold">Signature of Dean (Lower Primary)</p>
                            @break
                        @case("upper")
                            <p class="text-xs font-bold">Signature of Dean (Upper Primary)</p>
                            @break
                        @case("secondary")
                            <p class="text-xs font-bold">Signature of Dean (Upper Primary)</p>
                            @break
                        @default
                            <p class="text-xs font-bold">Error</p>
                    @endswitch
                </div>
            </section>
        </div>
    </div>
    <div
        class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none text-gray-900">
        <div class="border border-[#00223d] p-3 h-[29cm] rounded-md space-y-4">
            <section class="space-y-1">
                <h1 class="text-sm font-semibold">Explanatory Notes</h1>
                <div>
                    <table class="text-xs w-full border-collapse border">
                        <thead class=" bg-[#00223d] text-white uppercase">
                        <tr>
                            <th class="px-14 py-2 border text-white">
                                Grade
                            </th>
                            <th class="px-14 py-2 border text-white">
                                Mark
                            </th>
                            <th class="px-6 py-2 border text-white">
                                Description
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-6 py-2 border">
                                Genius (A*)
                            </td>
                            <td class="px-6 py-2 border">
                                91 - 100
                            </td>
                            <td class="px-6 py-2 border">
                                Candidate has superb performance and skills over this subject
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border">
                                Distinction (A)
                            </td>
                            <td class="px-6 py-2 border">
                                81 - 90
                            </td>
                            <td class="px-6 py-2 border">
                                Candidate demonstrated outstanding performance satisfying all learning outcomes and
                                significantly exceeding a number of them
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border">
                                Merit (B)
                            </td>
                            <td class="px-6 py-2 border">
                                61 - 80
                            </td>
                            <td class="px-6 py-2 border">
                                Candidate demonstrated strong performance satisfying all learning outcomes and exceeding
                                a number of them
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border">
                                Pass (C)
                            </td>
                            <td class="px-6 py-2 border">
                                41 - 60
                            </td>
                            <td class="px-6 py-2 border">
                                Candidate demonstrated competent performance satisfying all learning outcomes
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border">
                                Fail (D)
                            </td>
                            <td class="px-6 py-2 border">
                                21 - 40
                            </td>
                            <td class="px-6 py-2 border">
                                Candidate did not satisfy all of the learning outcomes
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border">
                                Incomplete (E)
                            </td>
                            <td class="px-6 py-2 border">
                                0 - 20
                            </td>
                            <td class="px-6 py-2 border">
                                Candidate only has meagre and insufficient knowledge on this subject
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border">
                                Absent (F)
                            </td>
                            <td class="px-6 py-2 border">
                                -
                            </td>
                            <td class="px-6 py-2 border">
                                Candidate has completed some component(s) of unit assessment
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="space-y-1">
                <h1 class="text-sm font-semibold">Conditions of Issue : </h1>
                <div>
                    <ol class="list-decimal text-sm ps-10 space-y-2">
                        <li class="ps-3">
                            <span class="font-semibold">Fulfilment of Academic Requirements : </span>The academic
                            transcript will be issued upon successful completion of all academic requirements for the
                            specified program of study at KBTC International School. This includes meeting credit hour
                            requirements, passing required courses, and fulfilling any other program-specific criteria.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Clearance of Financial Obligations : </span>The academic
                            transcript will only be released once all financial obligations, including tuition fees,
                            library fines, and any outstanding payments, have been settled in full.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Return of School Property : </span>The student must return any
                            school property, including library materials, and any other items borrowed or leased, before
                            the academic transcript can be issued.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Resolution of Outstanding Issues :  </span>If there are any
                            outstanding issues or concerns related to academic performance, behaviour, or other matters,
                            those must be resolved before the academic transcript can be released.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Compliance with School Policies :  </span>The student must have
                            complied with all school policies and regulations during their enrolment at KBTC
                            International School.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Request and Processing Time : </span>The academic transcript
                            will be processed within a reasonable timeframe after an official request is submitted by
                            the student or authorized party. The school may have a specific procedure for transcript
                            requests, and all required forms must be completed.
                        </li>
                        <li class="ps-3">
                            <span class="font-semibold">Confidentiality and Third-Party Requests : </span>The academic
                            transcript will be released in accordance with the school's policies on confidentiality.
                            Third-party requests for transcripts may require additional authorization from the student.
                        </li>
                    </ol>
                </div>
            </section>
            <section>
                <img src="{{ asset('images/logos/brands.png') }}" class="w-full h-full object-cover" alt="brands">
            </section>
        </div>
    </div>
@endforeach

</body>
</html>

