<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Applications
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Manage all job applications in one place
            </p>
        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Stats / Header Row -->
            <div class="flex items-center justify-between mb-6">

                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        Recent Applications
                    </h3>
                    <p class="text-sm text-gray-500">
                        Total: {{ $applications->count() }}
                    </p>
                </div>

            </div>

            <!-- Applications Grid -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                @forelse($applications as $application)

                    <div
                        class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                        <!-- Header -->
                        <div class="flex items-start justify-between">

                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $application->applicant_name }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $application->email }}
                                </p>
                            </div>

                            <span
                                class="text-xs px-3 py-1 rounded-full bg-indigo-50 text-indigo-700">
                                ID {{ $application->user_id }}
                            </span>

                        </div>

                        <!-- Job Info -->
                        <div class="mt-4">

                            <div class="text-sm text-gray-600">
                                Applied for:
                            </div>

                            <div class="mt-1 font-semibold text-gray-900">
                                {{ $application->job->title ?? 'Unknown Job' }}
                            </div>

                            <div class="text-sm text-gray-500">
                                {{ $application->job->company ?? '' }}
                            </div>

                        </div>

                        <!-- Education -->
                        <div class="mt-4 bg-gray-50 rounded-xl p-3">

                            <div class="text-sm font-medium text-gray-700">
                                Education
                            </div>

                            <div class="text-sm text-gray-600 mt-1">
                                {{ $application->degree }} • {{ $application->university }}
                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="mt-5 flex items-center justify-between">

                            <span class="text-xs text-gray-400">
                                Submitted recently
                            </span>

                            <a href="{{ route('applications.show', $application) }}"
                               class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                View →
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full">

                        <div
                            class="bg-white border border-dashed border-gray-300 rounded-2xl p-12 text-center">

                            <div class="text-5xl mb-4">📄</div>

                            <h3 class="text-lg font-semibold text-gray-900">
                                No applications yet
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Applications will appear here once candidates apply for jobs.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>