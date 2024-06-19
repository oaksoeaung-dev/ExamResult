<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Users</h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-zinc-500">
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user)
                        <tr class="bg-white border-b">
                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                {{ $user->name }}
                            </th>

                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                {{ $user->email }}
                            </th>

                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                                {{ $user->role->slug ??  "" }}
                            </th>

                            <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap flex gap-4">
                                <a href="#" class="text-sky-500 hover:text-sky-700 transition-all duration-300">Edit</a>
                                <a href="#" class="text-rose-500 hover:text-rose-700 transition-all duration-300">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
