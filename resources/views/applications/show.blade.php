<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                Application Details
            </h2>

            <p class="text-sm text-slate-500 dark:text-slate-400">
                View full application information
            </p>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 dark:bg-slate-950 min-h-screen">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Main Card -->
            <div
                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl shadow-sm p-8 transition">

                <!-- Header -->
                <div class="flex items-start justify-between">

                    <div class="flex items-center gap-4">

                        <!-- Avatar -->
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-500 to-violet-500 text-white flex items-center justify-center font-bold text-lg">
                            {{ strtoupper(substr($application->last_name, 0, 1)) }}
                        </div>

                        <div>
                            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">
                                {{ $application->first_name }} {{ $application->last_name }}
                            </h1>

                            <p class="text-slate-500 dark:text-slate-400">
                                {{ $application->email }}
                            </p>
                        </div>

                    </div>

                    <span class="px-3 py-1 text-xs rounded-full bg-indigo-50 dark:bg-indigo-500/10 text-indigo-700 dark:text-indigo-300 border border-indigo-100 dark:border-indigo-500/20">
                        User #{{ $application->user_id }}
                    </span>

                </div>

                <!-- Applied Job -->
                <div class="mt-8">

                    <h2 class="text-sm uppercase tracking-wide text-slate-400">
                        Applied For
                    </h2>

                    <div class="mt-3 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">

                        <p class="text-lg font-semibold text-slate-900 dark:text-white">
                            {{ $application->job->title ?? 'Unknown Job' }}
                        </p>

                        <p class="text-slate-500 dark:text-slate-400 mt-1">
                            {{ $application->job->company ?? '' }}
                        </p>

                    </div>

                </div>

                <!-- Education -->
                <div class="mt-6">

                    <h2 class="text-sm uppercase tracking-wide text-slate-400">
                        Education
                    </h2>

                    <div class="mt-3 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">

                        <p class="font-semibold text-slate-900 dark:text-white">
                            🎓 {{ $application->degree }}
                        </p>

                        <p class="text-slate-500 dark:text-slate-400 mt-1">
                            {{ $application->university }}
                        </p>

                    </div>

                </div>

                <!-- Footer -->
                <div class="mt-10 flex flex-col sm:flex-row sm:justify-end gap-3">

                    <a href="{{ route('applications.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition text-center">
                        Back
                    </a>

                    <a href="{{ route('applications.edit', $application) }}"
                       class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-medium transition text-center">
                        Edit Application
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>