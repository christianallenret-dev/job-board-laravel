<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <div class="text-gray-500 dark:text-gray-400 text-sm">Total Users</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ \App\Models\User::count() }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <div class="text-gray-500 dark:text-gray-400 text-sm">Total Jobs</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ \App\Models\Job::count() }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <div class="text-gray-500 dark:text-gray-400 text-sm">Applications</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ \App\Models\Application::count() }}
                    </div>
                </div>

            </div>

            <!-- Recent Applications -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Recent Applications
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="text-gray-500 dark:text-gray-400 border-b dark:border-gray-700">
                            <tr>
                                <th class="py-2">Applicant</th>
                                <th>Job</th>
                                <th>Email</th>
                                <th>Degree</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-900 dark:text-gray-100">
                            @foreach (\App\Models\Application::with('job')->latest()->take(5)->get() as $app)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="py-2">
                                        {{ $app->first_name }} {{ $app->last_name }}
                                    </td>

                                    <td>
                                        {{ $app->job?->title ?? 'No Job Assigned' }}
                                    </td>

                                    <td>
                                        {{ $app->email }}
                                    </td>

                                    <td>
                                        {{ $app->degree }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold">Welcome back!</h3>
                <p class="mt-1 text-sm opacity-90">
                    You currently have {{ \App\Models\Application::count() }} applications in the system.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>