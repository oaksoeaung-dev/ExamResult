<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex gap-2 items-center"><i class="fi fi-rr-school"></i><span>International School</span></h1>
        </div>
        <div class="max-w-2xl">
            <a href="{{ route('export.international-school.academic-transcript') }}" class="flex flex-col p-5 rounded-lg bg-gray-100 shadow hover:bg-gray-200 transition-all duration-300">
                <span class="text-xl flex items-center gap-3">
                    <i class="fi fi-rr-ballot"></i>
                    <span>Academic Transcript</span>
                </span>
                <p class="pl-8 text-sm text-gray-500">This is for graduation.</p>
            </a>
        </div>

        <div class="max-w-2xl">
            <a href="{{ route('export.international-school.report-card') }}" class="flex flex-col p-5 rounded-lg bg-gray-100 shadow hover:bg-gray-200 transition-all duration-300">
                <span class="text-xl flex items-center gap-3">
                    <i class="fi fi-rr-mobile"></i>
                    <span>Report Card</span>
                </span>
                <p class="pl-8 text-sm text-gray-500">This is for monthly report card.</p>
            </a>
        </div>
    </div>
</x-app-layout>
