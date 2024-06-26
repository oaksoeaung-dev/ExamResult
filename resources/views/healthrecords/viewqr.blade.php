@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

<x-app-layout>
    <div class="w-[70%] rounded-xl border p-10 shadow-xl">
        <div id="capture-area" class="grid h-[500px] w-full grid-cols-2 bg-gray-900 p-12">
            <div class="flex items-center justify-center">
                <div class="rounded-xl bg-white p-5">
                    {{ QrCode::size(200)->color(17, 24, 39)->generate(env("APP_URL") . "/healthrecords/student/" . "{$stdId}?" . "stdKey=" . "{$stdKey}") }}
                </div>
            </div>
            <div class="flex items-center justify-center border-l-2">
                <h1 class="text-zinc-50">{{ $name }}</h1>
            </div>
        </div>
    </div>
    <button id="capture-btn" class="btn-zinc mt-10">Download</button>

    @section("scripts")
        <script src="{{ asset("lib/html2canvas.min.js") }}"></script>
        <script type="text/javascript">
            document.getElementById('capture-btn').addEventListener('click', function () {
                html2canvas(document.querySelector('#capture-area')).then((canvas) => {
                    let link = document.createElement('a');
                    link.download = '{{ $name }}';
                    link.href = canvas.toDataURL();
                    link.click();
                });
            });
        </script>
    @endsection
</x-app-layout>
