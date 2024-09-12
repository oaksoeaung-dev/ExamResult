<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Document</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])

        <style type="text/css">
            @page {
                size: A4;
                margin: 0;
            }

            body {
                font-family: 'Times New Roman', Times, serif;
            }
            body * {
                color: #a27433;
            }

            @media print {
                .forbtn {
                    display: none;
                }
            }

            .forbtn {
                position: fixed;
                right: 0;
                bottom: 0;
            }

            .print-btn {
                width: 80px;
                height: 80px;

                background-color: #00233b;
                border: none;
                border-radius: 10px;

                color: #fff;
                text-align: center;
            }

            .forbtn i {
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        @foreach ($students as $student)
            <div class="page1 mx-auto my-[20px] grid grid-rows-6 rounded-md border border-gray-300 bg-[length:100%_auto] bg-center bg-no-repeat p-[12px] shadow-md [min-height:29.7cm] [width:21cm] print:m-0 print:break-after-page print:rounded-none print:border-none print:shadow-none" style="background-image: url({{ asset("images/reportcardBackground/unigraduation.jpg") }})">
                <div class="relative row-start-3">
                    <div class="absolute right-1/2 top-[75%] translate-x-1/2">
                        <p class="text-2xl text-[#A27433]">{{ $student["Name"] }}</p>
                    </div>
                </div>

                @if ($student["Program"] == "preig")
                    <div class="row-start-4 space-y-4 pt-14 text-center text-xl text-[#A27433]">
                        <p class="text-[#A27433]">
                            successfully completed the
                            <span class="font-bold text-[#A27433]">Pre-IGCSE</span>
                        </p>
                        <p class="font-bold text-[#A27433]">(Pre-International General Certificate of Secondary Education)</p>
                        <p class="text-[#A27433]">
                            Program at KBTC Pre University in
                            <span class="text-[#A27433]">{{ $student["AcademicYear"] }}</span>
                            Academic Year.
                        </p>
                    </div>
                @elseif ($student["Program"] == "igcse")
                    <div class="row-start-4 space-y-4 pt-14 text-center text-xl text-[#A27433]">
                        <p class="text-[#A27433]">
                            successfully completed the
                            <span class="font-bold text-[#A27433]">IGCSE</span>
                        </p>
                        <p class="font-bold text-[#A27433]">(International General Certificate of Secondary Education)</p>
                        <p>
                            Program at KBTC Pre University in
                            <span>{{ $student["AcademicYear"] }}</span>
                            Academic Year.
                        </p>
                    </div>
                @elseif ($student["Program"] == "ncc")
                    <div class="row-start-4 space-y-1 pt-14 text-center text-xl text-[#A27433]">
                        <p>successfully completed the</p>
                        <p class="font-bold">NCC Education L3IFDHES (Level 3 International Foundation</p>
                        <p class="font-bold">Diploma for Higher Education Studies)</p>
                        <p>
                            Program at KBTC Pre University in
                            <span>{{ $student["AcademicYear"] }}</span>
                            Academic Year.
                        </p>
                    </div>
                @elseif ($student["Program"] == "ged")
                    <div class="row-start-4 space-y-4 pt-14 text-center text-xl text-[#A27433]">
                        <p>
                            successfully completed the
                            <span class="font-bold">GED</span>
                        </p>
                        <p class="font-bold">(General Educational Development)</p>
                        <p>
                            Program at KBTC Pre University in
                            <span>{{ $student["AcademicYear"] }}</span>
                            Academic Year.
                        </p>
                    </div>
                @endif
                <div class="row-start-5 grid grid-cols-7">
                    <div class="col-span-2 col-start-2 pt-28 text-center text-[#A27433]">
                        <p>{{ $student["Day"] }}-{{ $student["Month"] }}-{{ $student["Year"] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </body>
</html>
