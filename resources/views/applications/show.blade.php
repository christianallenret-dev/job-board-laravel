<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Application Details
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                View full application information
            </p>
        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Main Card -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">

                <!-- Applicant Header -->
                <div class="flex items-start justify-between">

                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">
                            {{ $application->applicant_name }}
                        </h1>

                        <p class="text-gray-500 mt-1">
                            {{ $application->email }}
                        </p>
                    </div>

                    <span class="px-3 py-1 text-xs rounded-full bg-indigo-50 text-indigo-700">
                        User #{{ $application->user_id }}
                    </span>

                </div>

                <!-- Job Info -->
                <div class="mt-8 border-t border-gray-100 pt-6">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Applied For
                    </h2>

                    <div class="mt-2">
                        <p class="text-gray-900 font-medium">
                            {{ $application->job->title ?? 'Unknown Job' }}
                        </p>

                        <p class="text-gray-500">
                            {{ $application->job->company ?? '' }}
                        </p>
                    </div>

                </div>

                <!-- Education -->
                <div class="mt-6 border-t border-gray-100 pt-6">

                    <h2 class="text-lg font-semibold text-gray-900">
                        Education
                    </h2>

                    <div class="mt-2 bg-gray-50 rounded-xl p-4">
                        <p class="font-medium text-gray-900">
                            {{ $application->degree }}
                        </p>
                        <p class="text-gray-600">
                            {{ $application->university }}
                        </p>
                    </div>

                </div>

                <!-- Footer -->
                <div class="mt-8 flex justify-end gap-3">

                    <a href="{{ route('applications.edit', $application) }}"
                       class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                        Edit
                    </a>

                    <a href="{{ route('applications.index') }}"
                       class="px-5 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition">
                        Back
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>