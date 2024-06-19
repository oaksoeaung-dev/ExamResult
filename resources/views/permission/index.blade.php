<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Permissions</h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-zinc-500">
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr class="bg-white border-b">
                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                <span class="{{ $badgeColorFormatter::format($permission->slug) }}">{{ $permission->name }}</span>
                            </th>

                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                {{ $permission->description }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
