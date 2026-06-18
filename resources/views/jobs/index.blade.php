<x-app-layout>
    @if (auth()->user()->role === 'admin')
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Jobs
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Browse and manage available job listings
                    </p>
                </div>

                <a href="{{ route('jobs.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl transition">
                    Create Job
                </a>
            </div>
        </x-slot>       
    @endif

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                @forelse($jobs as $job)

                    <div
                        class="group bg-white border border-gray-200 rounded-2xl p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                        <div class="flex items-start justify-between">
                            <div>
                                <h3
                                    class="text-xl font-semibold text-gray-900 group-hover:text-indigo-600 transition">
                                    {{ $job->title }}
                                </h3>

                                <p class="mt-1 text-gray-500">
                                    {{ $job->company }}
                                </p>
                            </div>

                            <span
                                class="bg-green-50 text-green-700 text-sm font-semibold px-3 py-1 rounded-full">
                                ${{ number_format($job->salary) }}
                            </span>
                        </div>

                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4 mr-2"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            {{ $job->location }}
                        </div>

                        <div class="mt-6 pt-5 border-t border-gray-100 flex gap-3">

                            <a href="{{ route('jobs.show', $job) }}"
                               class="flex-1 text-center px-4 py-2 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition">
                                View
                            </a>

                            <a href="{{ route('jobs.edit', $job) }}"
                               class="flex-1 text-center px-4 py-2 bg-amber-50 text-amber-700 rounded-lg hover:bg-amber-100 transition">
                                Edit
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full">
                        <div
                            class="p-12 text-center">
                            <h3 class="text-lg font-semibold text-gray-300">
                                No jobs found
                            </h3>

                            <p class="mt-2 text-gray-500">
                                Create your first job listing to get started.
                            </p>
                        </div>
                    </div>

                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>