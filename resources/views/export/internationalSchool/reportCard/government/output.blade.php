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
                    <h1 class="text-center font-semibold">Student Report Card</h1>
                </div>
                <div class="mt-10">
                    <table class="">
                        @foreach ($student["Info"] as $header => $data)
                            @if ($header != "Division" && $header != "Subjects" && $header != "Grade")
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

                    @if ($division == "lower")
                        <table class="w-full">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <th class="border py-2 text-center text-xs font-semibold text-white" colspan="3">Grade Boundary Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="border bg-amber-400 py-2 text-center text-xs text-zinc-800">Grade A</th>
                                    <th class="border bg-amber-400 py-2 text-center text-xs text-zinc-800">Grade S</th>
                                    <th class="border bg-amber-400 py-2 text-center text-xs text-zinc-800">Grade E</th>
                                </tr>
                                <tr>
                                    <td class="border py-2 text-center text-xs text-zinc-800">75% to 100%</td>
                                    <td class="border py-2 text-center text-xs text-zinc-800">40% to 74%</td>
                                    <td class="border py-2 text-center text-xs text-zinc-800">0% to 39%</td>
                                </tr>
                            </tbody>
                        </table>
                    @elseif ($division == "upper" || $division == "secondary")
                        <table class="w-full">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <th class="border py-2 text-center text-xs font-semibold text-white" colspan="4">Grade Boundary Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="border bg-amber-400 py-2 text-center text-xs text-zinc-800">Grade A</th>
                                    <th class="border bg-amber-400 py-2 text-center text-xs text-zinc-800">Grade B</th>
                                    <th class="border bg-amber-400 py-2 text-center text-xs text-zinc-800">Grade C</th>
                                    <th class="border bg-amber-400 py-2 text-center text-xs text-zinc-800">Grade D</th>
                                </tr>
                                <tr>
                                    <td class="border py-2 text-center text-xs text-zinc-800">80% to 100%</td>
                                    <td class="border py-2 text-center text-xs text-zinc-800">60% to 79%</td>
                                    <td class="border py-2 text-center text-xs text-zinc-800">40% to 59%</td>
                                    <td class="border py-2 text-center text-xs text-zinc-800">0% to 39%</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <table class="w-full">
                            <thead class="bg-[#00223d]">
                                <tr>
                                    <th class="border py-2 text-center text-xs font-semibold text-white" colspan="3">Grade Boundary Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="border py-2 text-center text-xs font-semibold text-zinc-800" colspan="3">Error</th>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="mt-5 px-4">
                    <table class="w-full">
                        <tr>
                            <th class="w-10 border py-2 text-center text-xs text-zinc-800">No</th>
                            <th class="border px-3 py-2 text-start text-xs text-zinc-800">Subject</th>
                            @foreach (array_keys($student["Month"]) as $month)
                                <th class="w-24 border py-2 text-center text-xs text-zinc-800">{{ $month }}</th>
                            @endforeach
                        </tr>
                        @php
                            $subjects = explode(",", $student["Info"]["Subjects"]);
                            $studentMarks = [];
                            foreach ($student["Month"] as $month => $marks) {
                                if (! empty($marks)) {
                                    $subjectMarks = explode(",", $marks);
                                    $markArray = [];
                                    foreach ($subjectMarks as $mark) {
                                        $markArray[explode("=", $mark)[0]] = explode("=", $mark)[1];
                                    }
                                    $studentMarks[$month] = $markArray;
                                } else {
                                    $studentMarks[$month] = "";
                                }
                            }
                        @endphp

                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="w-10 border py-2 text-center text-xs text-zinc-800">{{ $loop->iteration }}</td>
                                <td class="border px-3 py-2 text-xs text-zinc-800">{{ $subject }}</td>
                                @foreach ($studentMarks as $month => $mark)
                                    <td class="w-10 border py-2 text-center text-xs text-zinc-800">
                                        {{ ! empty($mark[$subject]) ? $mark[$subject] : "" }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="mt-5 px-4">
                    <div class="{{ count($student["Sign"]) == 1 ? "justify-end" : "justify-between" }} flex">
                        @foreach ($student["Sign"] as $text => $sign)
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
