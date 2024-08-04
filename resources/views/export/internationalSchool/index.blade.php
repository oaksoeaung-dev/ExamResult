<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-school"></i>
                <span>International School</span>
            </h1>
        </div>

        <div class="max-w-2xl">
            <a href="{{ route("export.internationalSchool.academicTranscript.uploadFile") }}" class="flex flex-col rounded-lg bg-zinc-100 p-5 shadow transition-all duration-300 hover:bg-zinc-200">
                <span class="flex items-center gap-3 text-xl">
                    <i class="fi fi-rr-ballot"></i>
                    <span>Academic Transcript</span>
                </span>
                <p class="pl-8 text-sm text-zinc-500">This is for graduation.</p>
            </a>
        </div>

        <div class="max-w-2xl">
            <a href="{{ route("export.internationalSchool.reportCard.cambridge.uploadFile") }}" class="flex flex-col rounded-lg bg-zinc-100 p-5 shadow transition-all duration-300 hover:bg-zinc-200">
                <span class="flex items-center gap-3 text-xl">
                    <i class="fi fi-rr-mobile"></i>
                    <span>Cambridge Report Card</span>
                </span>
                <p class="pl-8 text-sm text-zinc-500">This is for cambridge monthly report card.</p>
            </a>
        </div>

        <div class="max-w-2xl">
            <a href="{{ route("export.internationalSchool.reportCard.government.uploadFile") }}" class="flex flex-col rounded-lg bg-zinc-100 p-5 shadow transition-all duration-300 hover:bg-zinc-200">
                <span class="flex items-center gap-3 text-xl">
                    <i class="fi fi-rr-mobile"></i>
                    <span>Government Report Card</span>
                </span>
                <p class="pl-8 text-sm text-zinc-500">This is for government monthly report card.</p>
            </a>
        </div>
    </div>
</x-app-layout>
