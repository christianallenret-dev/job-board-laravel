<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Jobs
            </h2>

            <a href="{{ route('jobs.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                Create Job
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                @foreach($jobs as $job)

                    <div class="bg-white rounded-xl shadow p-6">

                        <h3 class="text-xl font-bold">
                            {{ $job->title }}
                        </h3>

                        <p class="text-gray-500 mt-2">
                            {{ $job->company }}
                        </p>

                        <p class="mt-3 text-sm text-indigo-600">
                            {{ $job->location }}
                        </p>

                        <p class="mt-4 font-semibold text-green-600">
                            ${{ number_format($job->salary) }}
                        </p>

                        <div class="flex gap-2 mt-6">

                            <a href="{{ route('jobs.show', $job) }}"
                               class="text-indigo-600">
                                View
                            </a>

                            <a href="{{ route('jobs.edit', $job) }}"
                               class="text-yellow-600">
                                Edit
                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>