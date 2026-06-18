<x-app-layout>
    <div class="min-h-screen py-10 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Job Header -->
            <div
                class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors">

                <!-- Gradient Top -->
                <div
                    class="h-32 bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600">
                </div>

                <div class="px-8 pb-8 -mt-12">

                    <div
                        class="w-24 h-24 rounded-3xl bg-white dark:bg-slate-800 shadow-lg flex items-center justify-center border border-slate-200 dark:border-slate-700">

                        <span class="text-3xl font-bold text-indigo-600">
                            {{ strtoupper(substr($job->company, 0, 1)) }}
                        </span>

                    </div>

                    <div
                        class="mt-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div>
                            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">
                                {{ $job->title }}
                            </h1>

                            <div class="flex flex-wrap gap-3 mt-4">

                                <span
                                    class="px-4 py-2 bg-indigo-100 dark:bg-indigo-500/20 text-indigo-700 dark:text-indigo-300 rounded-full text-sm font-semibold">
                                    {{ $job->company }}
                                </span>

                                <span
                                    class="px-4 py-2 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-full text-sm">
                                    📍 {{ $job->location }}
                                </span>

                                <span
                                    class="px-4 py-2 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 rounded-full text-sm font-semibold">
                                    💰 ${{ number_format($job->salary) }}
                                </span>

                            </div>
                        </div>

                        <div class="flex flex-col gap-3 items-end">

                            <span
                                class="inline-flex items-center px-4 py-2 bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-300 rounded-xl font-medium">
                                Active Job Posting
                            </span>

                            @auth
                                @if(!$job->applications->contains('user_id', auth()->id()))
                                    <form method="POST" action="{{ route('jobs.apply', $job->id) }}">
                                        @csrf

                                        <button type="submit"
                                            class="inline-flex items-center px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition">
                                            Apply for Job
                                        </button>
                                    </form>
                                @else
                                    <span class="text-green-600 font-semibold">
                                        You already applied
                                    </span>
                                @endif
                            @endauth

                        </div>

                    </div>

                    <!-- Description -->
                    <div class="mt-8 border-t border-slate-200 dark:border-slate-800 pt-8">

                        <h2 class="text-xl font-semibold text-slate-900 dark:text-white mb-4">
                            Job Description
                        </h2>

                        <p class="text-slate-600 dark:text-slate-300 leading-8">
                            {{ $job->description }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- Applicants Section -->
            <div class="mt-10">

                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 dark:text-white">
                            Applicants
                        </h2>

                        <p class="text-slate-500 dark:text-slate-400 mt-1">
                            Review and manage candidate applications
                        </p>
                    </div>

                    <span
                        class="inline-flex items-center px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-300 font-medium shadow-sm">
                        {{ $job->applications->count() }} Applicants
                    </span>

                </div>

                @forelse($job->applications as $application)

                    <div
                        class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl p-6 mb-4 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                        <div
                            class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                            <div class="flex items-center gap-4">

                                <!-- Avatar -->
                                <div
                                    class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-500 to-violet-500 text-white flex items-center justify-center font-bold text-lg">

                                   {{ strtoupper(substr($application->first_name, 0, 1)) }}

                                </div>

                                <div>

                                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                                        {{ $application->first_name }} {{ $application->last_name }}
                                    </h3>

                                    <p class="text-slate-500 dark:text-slate-400">
                                        {{ $application->email }}
                                    </p>

                                </div>

                            </div>

                            <span
                                class="inline-flex items-center px-3 py-1 bg-indigo-500/10 text-indigo-700 dark:text-indigo-300 rounded-full text-sm font-medium">
                                {{ $application->user?->name ?? 'Unknown User' }}
                            </span>

                        </div>

                        <!-- Education -->
                        <div class="mt-5">

                            <div
                                class="bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-4">

                                <div
                                    class="flex flex-wrap items-center gap-2 text-sm">

                                    <span
                                        class="font-semibold text-slate-800 dark:text-slate-200">
                                        🎓 {{ $application->degree }}
                                    </span>

                                    <span class="text-slate-400">•</span>

                                    <span class="text-slate-600 dark:text-slate-300">
                                        {{ $application->university }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div
                        class="bg-white dark:bg-slate-900 border border-dashed border-slate-300 dark:border-slate-700 rounded-3xl p-16 text-center">

                        <div class="text-6xl mb-5">
                            📄
                        </div>

                        <h3 class="text-xl font-semibold text-slate-900 dark:text-white">
                            No applicants yet
                        </h3>

                        <p class="text-slate-500 dark:text-slate-400 mt-2">
                            Applications from candidates will appear here once they
                            start applying.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>