<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-users-alt"></i>
                <span>Users</span>
            </h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-500">
                <thead class="bg-zinc-100 text-xs uppercase text-zinc-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b bg-white">
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $user->name }}
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $user->email }}
                            </th>

                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                <span class="{{ $badgeColorFormatter::format($user->role->slug) }}">
                                    {{ $user->role->slug ?? "" }}
                                </span>
                            </th>

                            @can("view", $user)
                                <th class="flex gap-4 whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                    <a href="{{ route("users.edit", $user->id) }}" class="text-sky-500 transition-all duration-300 hover:text-sky-700">Edit</a>
                                    <a href="#" class="text-rose-500 transition-all duration-300 hover:text-rose-700">Delete</a>
                                </th>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
