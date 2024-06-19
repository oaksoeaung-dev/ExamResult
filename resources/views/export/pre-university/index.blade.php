<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex gap-2 items-center"><i class="fi fi-rr-apartment"></i><span>Pre-University</span></h1>
        </div>
        <div class="max-w-2xl">
            <a href="{{ route('export.pre-university.reportcard') }}" class="flex flex-col p-5 rounded-lg bg-zinc-100 shadow hover:bg-zinc-200 transition-all duration-300">
                <span class="text-xl flex items-center gap-3">
                    <i class="fi fi-rr-ballot"></i>
                    <span>Report Card</span>
                </span>
                <p class="pl-8 text-sm text-zinc-500">Create report card for test.</p>
            </a>
        </div>
    </div>
</x-app-layout>
