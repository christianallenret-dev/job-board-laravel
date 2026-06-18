<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col gap-1">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                Edit Job
            </h2>

            <p class="text-sm text-slate-500 dark:text-slate-400">
                Update the details of this job listing
            </p>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 dark:bg-slate-950 min-h-screen">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl shadow-sm p-8">

                <form action="{{ route('jobs.update', $job) }}"
                      method="POST"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <!-- Grid Inputs -->
                    <div class="grid md:grid-cols-2 gap-6">

                        <!-- Job Title -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Job Title
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title', $job->title) }}"
                                   class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                          focus:border-indigo-500 focus:ring-indigo-500 transition">

                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Company -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Company
                            </label>

                            <input type="text"
                                   name="company"
                                   value="{{ old('company', $job->company) }}"
                                   class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                          focus:border-indigo-500 focus:ring-indigo-500 transition">

                            @error('company')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Location
                            </label>

                            <input type="text"
                                   name="location"
                                   value="{{ old('location', $job->location) }}"
                                   class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                          focus:border-indigo-500 focus:ring-indigo-500 transition">

                            @error('location')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Salary -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                                Salary
                            </label>

                            <input type="number"
                                   name="salary"
                                   value="{{ old('salary', $job->salary) }}"
                                   class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                          focus:border-indigo-500 focus:ring-indigo-500 transition">

                            @error('salary')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                            Job Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="w-full rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white
                                   focus:border-indigo-500 focus:ring-indigo-500 transition resize-none">{{ old('description', $job->description) }}</textarea>

                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">

                        <a href="{{ route('jobs.show', $job) }}"
                           class="px-5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition text-center">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-sm transition">
                            Update Job
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>