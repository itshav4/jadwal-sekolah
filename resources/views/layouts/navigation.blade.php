<nav class="bg-white border-b border-gray-100">

```
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex justify-between h-16 items-center">

        <div>
            <a href="{{ route('dashboard') }}"
               class="text-xl font-bold text-blue-600">
                Jadwal Sekolah
            </a>
        </div>

        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Logout
                </button>
            </form>
        </div>

    </div>

</div>
```

</nav>
