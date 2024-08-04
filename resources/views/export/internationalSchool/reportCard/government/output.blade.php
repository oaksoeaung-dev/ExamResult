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
            <div class="mx-auto my-[20px] min-h-[29.7cm] rounded-md border border-gray-300 bg-cover bg-center bg-no-repeat p-[12px] text-gray-900 shadow-md [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none">
                <div class="mt-10">
                    <h1 class="font-semibold text-center">Student Report Card</h1>
                </div>
                <div class="mt-10">
                    <table class="">
                        @foreach ($student["Info"] as $header => $data)
                            @if($header != "Division" && $header != "Subjects" && $header != "Grade")
                                <tr>
                                    <td class="px-4 py-2 font-semibold">{{ $header }}</td>
                                    <td class="px-4 py-2">:</td>
                                    <td class="px-4 py-2">{{ $data }}</td>
                                </tr>
                            @elseif ($header == "Grade")
                                <tr>
                                    <td class="px-4 py-2 font-semibold">{{ $header }}</td>
                                    <td class="px-4 py-2">:</td>
                                    <td class="px-4 py-2">
                                        <p>{{ $data["Cambridge"] }} ({{ $data["Government"] }})</p>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
                <div class="mt-5 px-4">
                    @php
                        $division = strtolower($student["Info"]["Division"]);
                    @endphp
                    @if($division == "lower")
                        <table class="w-full">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <th class="text-white border py-2 text-xs font-semibold text-center" colspan="3">Grade Boundary Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="border text-xs text-zinc-800 py-2 bg-amber-400 text-center">Grade A</th>
                                    <th class="border text-xs text-zinc-800 py-2 bg-amber-400 text-center">Grade S</th>
                                    <th class="border text-xs text-zinc-800 py-2 bg-amber-400 text-center">Grade E</th>
                                </tr>
                                <tr>
                                    <td class="border text-xs text-zinc-800 py-2 text-center">75% to 100%</td>
                                    <td class="border text-xs text-zinc-800 py-2 text-center">40% to 74%</td>
                                    <td class="border text-xs text-zinc-800 py-2 text-center">0% to 39%</td>
                                </tr>
                            </tbody>
                        </table>
                    @elseif ($division == "upper" || $division == "secondary")
                    <table class="w-full">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <th class="text-white border py-2 text-xs font-semibold text-center" colspan="4">Grade Boundary Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="border text-xs text-zinc-800 py-2 bg-amber-400 text-center">Grade A</th>
                                <th class="border text-xs text-zinc-800 py-2 bg-amber-400 text-center">Grade B</th>
                                <th class="border text-xs text-zinc-800 py-2 bg-amber-400 text-center">Grade C</th>
                                <th class="border text-xs text-zinc-800 py-2 bg-amber-400 text-center">Grade D</th>
                            </tr>
                            <tr>
                                <td class="border text-xs text-zinc-800 py-2 text-center">80% to 100%</td>
                                <td class="border text-xs text-zinc-800 py-2 text-center">60% to 79%</td>
                                <td class="border text-xs text-zinc-800 py-2 text-center">40% to 59%</td>
                                <td class="border text-xs text-zinc-800 py-2 text-center">0% to 39%</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <table class="w-full">
                        <thead class="bg-[#00223d]">
                            <tr>
                                <th class="text-white border py-2 text-xs font-semibold text-center" colspan="3">Grade Boundary Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-zinc-800 border py-2 text-xs font-semibold text-center" colspan="3">Error</th>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="mt-5 px-4">
                    <table class="w-full">
                        <tr>
                            <th class="border text-xs text-zinc-800 py-2 text-center w-10">No</th>
                            <th class="border text-xs text-zinc-800 py-2 px-3 text-start">Subject</th>
                            @foreach (array_keys($student["Month"]) as $month)
                                <th class="border text-xs text-zinc-800 py-2 w-24 text-center">{{ $month }}</th>
                            @endforeach
                        </tr>
                        @php
                            $subjects = explode(",",$student["Info"]["Subjects"]);
                            $studentMarks = [];
                            foreach($student["Month"] as $month => $marks)
                            {
                                $subjectMarks = explode(",",$marks);
                                $markArray = [];
                                foreach($subjectMarks as $mark)
                                {
                                    $markArray[explode("=",$mark)[0]] = explode("=",$mark)[1];
                                }
                                $studentMarks[$month] = $markArray;
                            }
                        @endphp
                        @foreach ($subjects as $subject)
                        <tr>
                            <td class="border text-xs text-zinc-800 py-2 text-center w-10">{{ $loop->iteration }}</td>
                            <td class="border text-xs text-zinc-800 py-2 px-3">{{ $subject }}</td>
                            @foreach($studentMarks as $month => $mark)
                                <td class="border text-xs text-zinc-800 py-2 text-center w-10">
                                    {{ $mark[$subject] }}
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="mt-5 px-4">
                    <div class="flex {{ count($student["Sign"]) == 1 ? "justify-end" : "justify-between"  }}">
                        @foreach($student["Sign"] as $text => $sign)
                            <div class="flex flex-col items-center justify-center gap-1">
                                <img src="{{ asset("storage/signs/" . $sign . ".png") }}" class="h-20 w-20 object-cover" alt="Signature" />
                                <p class="text-xs font-bold">{{ $text }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </body>
</html>
