<aside
    id="logo-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-72 -translate-x-full border-r border-zinc-100 bg-white pt-20 transition-transform sm:translate-x-0"
    aria-label="Sidebar"
>
    <div class="relative h-full overflow-y-auto bg-white px-3 pb-4">
        <ul class="space-y-2 font-medium">
            {{-- Dashboard --}}
            <li>
                <x-nav-link
                    :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')"
                    icon="fi fi-rr-dashboard"
                >
                    <p>Dashboard</p>
                </x-nav-link>
            </li>

            {{-- Documentation --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('documentation.*')"
                    dropDownId="dropdown-documentation"
                    dropDownName="Documentation"
                    icon="fi fi-rr-document"
                >
                    <x-dropdown-link
                        :href="route('documentation.addTeacherAndSign')"
                        :active="request()->routeIs('documentation.addTeacherAndSign')"
                        class="pl-11"
                        icon="fi fi-rr-angle-small-right"
                    >
                        <p>Add Teacher & Sign</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('documentation.uploadTranscript')"
                        :active="request()->routeIs('documentation.uploadTranscript')"
                        class="pl-11"
                        icon="fi fi-rr-angle-small-right"
                    >
                        <p>Upload Transcript</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            <p class="border-t border-t-zinc-100 pt-3 text-xs">Users Management</p>
            {{-- Users --}}
            <li>
                <x-nav-link
                    :href="route('users.index')"
                    :active="request()->routeIs('users.*')"
                    icon="fi fi-rr-users-alt"
                >
                    <p>Users</p>
                </x-nav-link>
            </li>

            {{-- Role --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('role.*')"
                    dropDownId="dropdown-role"
                    dropDownName="Role"
                    icon="fi fi-rr-admin-alt"
                >
                    <x-dropdown-link
                        :href="route('role.index')"
                        :active="request()->routeIs('role.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Roles</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('role.create')"
                        :active="request()->routeIs('role.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            {{-- Permission --}}
            <li>
                <x-nav-link
                    :href="route('permission.index')"
                    :active="request()->routeIs('permission.*')"
                    icon="fi fi-rr-lock-open-alt"
                >
                    <p>Permission</p>
                </x-nav-link>
            </li>

            <p class="border-t border-t-zinc-100 pt-3 text-xs">Academic Management</p>
            {{-- Subjects --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('subjects.*')"
                    dropDownId="dropdown-subjects"
                    dropDownName="Subjects"
                    icon="fi fi-rr-diary-bookmark-down"
                >
                    <x-dropdown-link
                        :href="route('subjects.index')"
                        :active="request()->routeIs('subjects.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Subjects</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('subjects.create')"
                        :active="request()->routeIs('subjects.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            {{-- Activities --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('activities.*')"
                    dropDownId="dropdown-activities"
                    dropDownName="Activities"
                    icon="fi fi-rr-gym"
                >
                    <x-dropdown-link
                        :href="route('activities.index')"
                        :active="request()->routeIs('activities.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Activities</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('activities.create')"
                        :active="request()->routeIs('activities.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            {{-- Behaviours --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('behaviours.*')"
                    dropDownId="dropdown-behaviours"
                    dropDownName="Behaviours"
                    icon="fi fi-rr-house-laptop"
                >
                    <x-dropdown-link
                        :href="route('behaviours.index')"
                        :active="request()->routeIs('behaviours.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Behaviours</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('behaviours.create')"
                        :active="request()->routeIs('behaviours.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            {{-- Classes --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('classes.*')"
                    dropDownId="dropdown-classes"
                    dropDownName="Classes"
                    icon="fi fi-rr-workshop"
                >
                    <x-dropdown-link
                        :href="route('classes.index')"
                        :active="request()->routeIs('classes.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Classes</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('classes.create')"
                        :active="request()->routeIs('classes.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            <p class="border-t border-t-zinc-100 pt-3 text-xs">Teachers And Students</p>
            {{-- Students --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('students.*')"
                    dropDownId="dropdown-students"
                    dropDownName="Students"
                    icon="fi fi-rr-student"
                >
                    <x-dropdown-link
                        :href="route('students.index')"
                        :active="request()->routeIs('students.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Students</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('students.create')"
                        :active="request()->routeIs('students.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            {{-- Teachers --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('teachers.*')"
                    dropDownId="dropdown-teachers"
                    dropDownName="Teachers"
                    icon="fi fi-rr-lesson-class"
                >
                    <x-dropdown-link
                        :href="route('teachers.index')"
                        :active="request()->routeIs('teachers.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Teachers</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('teachers.create')"
                        :active="request()->routeIs('teachers.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            {{-- Health Record --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('healthrecords.*')"
                    dropDownId="dropdown-healthrecords"
                    dropDownName="Health Records"
                    icon="fi fi-rr-treatment"
                >
                    <x-dropdown-link
                        :href="route('healthrecords.index')"
                        :active="request()->routeIs('healthrecords.index')"
                        class="pl-11"
                        icon="fi fi-rr-rectangle-list"
                    >
                        <p>All Health Records</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('healthrecords.create')"
                        :active="request()->routeIs('healthrecords.create')"
                        class="pl-11"
                        icon="fi fi-rr-add"
                    >
                        <p>Create</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>

            <p class="border-t border-t-zinc-100 pt-3 text-xs">Others</p>
            {{-- Multiples Export --}}
            <li>
                <x-dropdown
                    :active="request()->routeIs('export.*')"
                    dropDownId="dropdown-export"
                    dropDownName="Multiples Export"
                    icon="fi fi-rr-move-to-folder"
                >
                    <x-dropdown-link
                        :href="route('export.pre-university.index')"
                        :active="request()->routeIs('export.pre-university.*')"
                        class="pl-11"
                        icon="fi fi-rr-apartment"
                    >
                        <p>Pre-University</p>
                    </x-dropdown-link>
                    <x-dropdown-link
                        :href="route('export.international-school.index')"
                        :active="request()->routeIs('export.international-school.*')"
                        class="pl-11"
                        icon="fi fi-rr-school"
                    >
                        <p>International School</p>
                    </x-dropdown-link>
                </x-dropdown>
            </li>
        </ul>
    </div>
</aside>
