<div class="min-h-screen bg-slate-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Job Header -->
        <div
            class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

            <!-- Gradient Top -->
            <div
                class="h-32 bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600">
            </div>

            <div class="px-8 pb-8 -mt-12">

                <div
                    class="w-24 h-24 rounded-3xl bg-white shadow-lg flex items-center justify-center border border-slate-200">

                    <span class="text-3xl font-bold text-indigo-600">
                        {{ strtoupper(substr($job->company, 0, 1)) }}
                    </span>

                </div>

                <div
                    class="mt-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>
                        <h1 class="text-4xl font-bold text-slate-900">
                            {{ $job->title }}
                        </h1>

                        <div class="flex flex-wrap gap-3 mt-4">

                            <span
                                class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold">
                                {{ $job->company }}
                            </span>

                            <span
                                class="px-4 py-2 bg-slate-100 text-slate-700 rounded-full text-sm">
                                📍 {{ $job->location }}
                            </span>

                            <span
                                class="px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold">
                                💰 ${{ number_format($job->salary) }}
                            </span>

                        </div>
                    </div>

                    <div>
                        <span
                            class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-xl font-medium">
                            Active Job Posting
                        </span>
                    </div>

                </div>

                <!-- Description -->
                <div class="mt-8 border-t border-slate-200 pt-8">

                    <h2 class="text-xl font-semibold text-slate-900 mb-4">
                        Job Description
                    </h2>

                    <p class="text-slate-600 leading-8">
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
                    <h2 class="text-3xl font-bold text-slate-900">
                        Applicants
                    </h2>

                    <p class="text-slate-500 mt-1">
                        Review and manage candidate applications
                    </p>
                </div>

                <span
                    class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl text-slate-700 font-medium shadow-sm">
                    {{ $job->applications->count() }} Applicants
                </span>

            </div>

            @forelse($job->applications as $application)

                <div
                    class="bg-white border border-slate-200 rounded-2xl p-6 mb-4 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                    <div
                        class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="flex items-center gap-4">

                            <!-- Avatar -->
                            <div
                                class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-500 to-violet-500 text-white flex items-center justify-center font-bold text-lg">

                                {{ strtoupper(substr($application->applicant_name, 0, 1)) }}

                            </div>

                            <div>

                                <h3
                                    class="text-lg font-semibold text-slate-900">
                                    {{ $application->applicant_name }}
                                </h3>

                                <p class="text-slate-500">
                                    {{ $application->email }}
                                </p>

                            </div>

                        </div>

                        <span
                            class="inline-flex items-center px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-sm font-medium">
                            User #{{ $application->user_id }}
                        </span>

                    </div>

                    <!-- Education -->
                    <div class="mt-5">

                        <div
                            class="bg-slate-50 border border-slate-200 rounded-xl p-4">

                            <div
                                class="flex flex-wrap items-center gap-2 text-sm">

                                <span
                                    class="font-semibold text-slate-800">
                                    🎓 {{ $application->degree }}
                                </span>

                                <span class="text-slate-400">•</span>

                                <span class="text-slate-600">
                                    {{ $application->university }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div
                    class="bg-white border border-dashed border-slate-300 rounded-3xl p-16 text-center">

                    <div class="text-6xl mb-5">
                        📄
                    </div>

                    <h3 class="text-xl font-semibold text-slate-900">
                        No applicants yet
                    </h3>

                    <p class="text-slate-500 mt-2">
                        Applications from candidates will appear here once they
                        start applying.
                    </p>

                </div>

            @endforelse

        </div>

    </div>
</div>