<nav class="fixed top-0 z-50 w-full border-b border-zinc-100 bg-white">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button
                    data-drawer-target="logo-sidebar"
                    data-drawer-toggle="logo-sidebar"
                    aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center rounded-lg p-2 text-sm text-zinc-500 hover:bg-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-200 sm:hidden"
                >
                    <span class="sr-only">Open sidebar</span>
                    <svg
                        class="h-6 w-6"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                        ></path>
                    </svg>
                </button>
                <a href="{{ route("dashboard") }}" class="ms-2 flex md:me-24">
                    <span class="self-center whitespace-nowrap text-base font-semibold text-zinc-800 md:text-2xl">
                        KBTC International School & Pre-University
                    </span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="ms-3 flex items-center">
                    <div>
                        <button
                            type="button"
                            class="flex rounded-full text-sm ring-offset-2 focus:ring-2 focus:ring-zinc-400"
                            aria-expanded="false"
                            data-dropdown-toggle="dropdown-user"
                        >
                            <span class="sr-only">Open user menu</span>
                            <img
                                class="size-12 rounded-full"
                                src="{{ asset("images/profiles/boy.png") }}"
                                alt="user photo"
                            />
                        </button>
                    </div>
                    <div
                        class="z-50 my-4 hidden list-none divide-y divide-zinc-100 rounded bg-white text-base shadow"
                        id="dropdown-user"
                    >
                        <div class="space-y-2 px-4 py-3" role="none">
                            <p class="text-sm text-zinc-900" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="truncate text-sm font-medium text-zinc-900" role="none">
                                {{ Auth::user()->email }}
                            </p>
                            <p class="truncate text-sm font-medium text-zinc-900" role="none">
                                <span class="badge-red">{{ Auth::user()->role->slug ?? "" }}</span>
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a
                                    href="{{ route("profile.edit") }}"
                                    class="block px-4 py-2 text-sm text-zinc-700 hover:bg-zinc-100"
                                    role="menuitem"
                                >
                                    Profile
                                </a>
                            </li>
                            <li>
                                <form action="{{ route("logout") }}" method="POST">
                                    @csrf
                                    <button
                                        class="w-full px-4 py-2 text-left text-sm text-zinc-700 hover:bg-zinc-100"
                                        role="menuitem"
                                    >
                                        Sign out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
