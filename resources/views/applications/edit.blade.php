<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                Edit Application
            </h2>

            <p class="text-sm text-slate-500 dark:text-slate-400">
                Update applicant details
            </p>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 dark:bg-slate-950 min-h-screen">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl shadow-sm p-8">

                <form action="{{ route('applications.update', $application) }}"
                      method="POST"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <!-- Applicant Name -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                            Applicant Name
                        </label>

                        <input type="text"
                               name="applicant_name"
                               value="{{ old('applicant_name', $application->applicant_name) }}"
                               class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                      focus:border-indigo-500 focus:ring-indigo-500 transition">

                        @error('applicant_name')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', $application->email) }}"
                               class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                      focus:border-indigo-500 focus:ring-indigo-500 transition">

                        @error('email')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grid -->
                    <div class="grid md:grid-cols-2 gap-6">

                        <!-- Degree -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Degree
                            </label>

                            <input type="text"
                                   name="degree"
                                   value="{{ old('degree', $application->degree) }}"
                                   class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                          focus:border-indigo-500 focus:ring-indigo-500 transition">

                            @error('degree')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- University -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                University
                            </label>

                            <input type="text"
                                   name="university"
                                   value="{{ old('university', $application->university) }}"
                                   class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                          focus:border-indigo-500 focus:ring-indigo-500 transition">

                            @error('university')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">

                        <a href="{{ route('applications.show', $application) }}"
                           class="px-5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition text-center">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-sm transition">
                            Update Application
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>