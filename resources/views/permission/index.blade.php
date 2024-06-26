<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Permissions</h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-500">
                <thead class="bg-zinc-100 text-xs uppercase text-zinc-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="border-b bg-white">
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                <span class="{{ $badgeColorFormatter::format($permission->slug) }}">
                                    {{ $permission->name }}
                                </span>
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $permission->description }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
