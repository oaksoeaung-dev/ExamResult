<form action="">
    <div class="flex justify-end">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <i class="fi fi-rr-search"></i>
            </div>
            <input type="text" name="search" value="{{ request('search') }}" class="bg-white border-gray-300 border-y border-s text-gray-900 text-sm rounded-l-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5"/>
        </div>
        <button class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-e-lg text-sm px-5 py-2.5">Search</button>
    </div>
</form>
