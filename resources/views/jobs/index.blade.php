<x-app-layout>

    @if (auth()->user()->role === 'admin')
        <x-slot name="header">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                        Jobs
                    </h2>

                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                        Browse and manage available job listings
                    </p>
                </div>

                <a href="{{ route('jobs.create') }}"
                   class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-sm transition">
                    + Create Job
                </a>

            </div>
        </x-slot>
    @endif

    <div class="py-10 bg-slate-50 dark:bg-slate-950 min-h-screen transition-colors">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                @forelse($jobs as $job)

                    <div
                        class="group bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                        <!-- Header -->
                        <div class="flex items-start justify-between">

                            <div>
                                <h3 class="text-xl font-semibold text-slate-900 dark:text-white group-hover:text-indigo-500 transition">
                                    {{ $job->title }}
                                </h3>

                                <p class="mt-1 text-slate-500 dark:text-slate-400">
                                    {{ $job->company }}
                                </p>
                            </div>

                            <span
                                class="bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 text-sm font-semibold px-3 py-1 rounded-full">
                                ${{ number_format($job->salary) }}
                            </span>

                        </div>

                        <!-- Location -->
                        <div class="mt-4 flex items-center text-sm text-slate-500 dark:text-slate-400">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4 mr-2 text-slate-400"
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

                        <!-- Footer -->
                        <div class="mt-6 pt-5 border-t border-slate-100 dark:border-slate-800 flex gap-3">

                            <a href="{{ route('jobs.show', $job) }}"
                               class="flex-1 text-center px-4 py-2 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 text-indigo-700 dark:text-indigo-300 hover:bg-indigo-100 dark:hover:bg-indigo-500/20 transition">
                                View
                            </a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('jobs.edit', $job) }}"
                                   class="flex-1 text-center px-4 py-2 rounded-xl bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-300 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition">
                                    Edit
                                </a>
                            @endif
                        </div>
                    </div>
                @empty

                    <div class="col-span-full">
                        <div class="bg-white dark:bg-slate-900 border border-dashed border-slate-300 dark:border-slate-700 rounded-3xl p-16 text-center">

                            <div class="text-6xl mb-4">💼</div>

                            <h3 class="text-xl font-semibold text-slate-900 dark:text-white">
                                No jobs found
                            </h3>

                            <p class="mt-2 text-slate-500 dark:text-slate-400">
                                Create your first job listing to get started.
                            </p>

                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('jobs.create') }}"
                                   class="inline-flex mt-6 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition">
                                    Create Job
                                </a>
                            @endif
                        </div>
                    </div>

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>