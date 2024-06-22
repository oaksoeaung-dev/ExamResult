<x-app-layout>
    
    <div class="p-10 border rounded-xl w-[70%] shadow-xl">
        <div id="capture-area" class="bg-gray-900 grid grid-cols-2 p-12 w-full h-[500px]">
            <div class="flex items-center justify-center">
                <img src="{{ asset('storage/healthrecordqrcodes/'.$qrcode->qrcode_path) }}" class="p-5 bg-white rounded-xl" />
            </div>
            <div class="border-l-2 flex items-center justify-center">
                <h1 class="text-zinc-50">{{ $name }}</h1>
            </div>
        </div>
    </div>
    <button id="capture-btn" class="btn-zinc mt-10">Download</button>
    
    @section('scripts')
        <script src="{{ asset('lib/html2canvas.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/screenshotqrcode.js') }}"></script>
    @endsection
    
</x-app-layout>
