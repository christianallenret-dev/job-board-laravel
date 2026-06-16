<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Create Job
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded-xl p-8">

                <form action="{{ route('jobs.store') }}"
                      method="POST">

                    @csrf

                    @include('jobs.partials.form')

                    <div class="mt-8">
                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">
                            Save Job
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>