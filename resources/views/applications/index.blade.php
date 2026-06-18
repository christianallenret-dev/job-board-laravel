<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                Applications
            </h2>

            <p class="text-sm text-slate-500 dark:text-slate-400">
                Manage all job applications in one place
            </p>

            <span class="text-sm text-indigo-600 dark:text-indigo-400 font-medium">
                Total: {{ $applications->count() }}
            </span>
        </div>
    </x-slot>

    <div class="bg-slate-50 dark:bg-slate-950 min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Grid -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                @forelse($applications as $application)

                    <div
                        class="group bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                        <!-- Header -->
                        <div class="flex items-start justify-between">

                            <div>
                                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                                    {{ $application->applicant_name }}
                                </h3>

                                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                                    {{ $application->email }}
                                </p>
                            </div>

                            <span
                                class="text-xs px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-500/10 text-indigo-700 dark:text-indigo-300 border border-indigo-100 dark:border-indigo-500/20">
                                ID {{ $application->user_id }}
                            </span>

                        </div>

                        <!-- Job Info -->
                        <div class="mt-5 p-4 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">

                            <p class="text-xs uppercase tracking-wide text-slate-400">
                                Applied for
                            </p>

                            <p class="mt-1 font-semibold text-slate-900 dark:text-white">
                                {{ $application->job->title ?? 'N/A' }}
                            </p>

                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                {{ $application->job->company ?? '' }}
                            </p>

                        </div>

                        <!-- Education -->
                        <div class="mt-4">

                            <div class="flex items-center justify-between text-sm">

                                <span class="text-slate-500 dark:text-slate-400">
                                    Education
                                </span>

                                <span class="text-indigo-600 dark:text-indigo-400 text-xs font-medium">
                                    Verified
                                </span>

                            </div>

                            <div
                                class="mt-2 text-sm text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-xl p-3">

                                🎓 {{ $application->degree }} • {{ $application->university }}

                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="mt-5 flex items-center justify-between">

                            <span class="text-xs text-slate-400">
                                Just now
                            </span>

                            <a href="{{ route('applications.show', $application) }}"
                               class="inline-flex items-center text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition">
                                View
                                <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full">

                        <div
                            class="bg-white dark:bg-slate-900 border border-dashed border-slate-300 dark:border-slate-700 rounded-3xl p-16 text-center">

                            <div class="text-6xl mb-4">📄</div>

                            <h3 class="text-xl font-semibold text-slate-900 dark:text-white">
                                No applications yet
                            </h3>

                            <p class="text-slate-500 dark:text-slate-400 mt-2">
                                Applications will appear here once candidates apply for jobs.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>