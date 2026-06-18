```blade
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Edit Job
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Update the details of this job listing
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">

                <form action="{{ route('jobs.update', $job) }}"
                      method="POST"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <!-- Job Title -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Job Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $job->title) }}"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        @error('title')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Company -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Company
                        </label>

                        <input
                            type="text"
                            name="company"
                            value="{{ old('company', $job->company) }}"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        @error('company')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Location
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location', $job->location) }}"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        @error('location')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Salary
                        </label>

                        <input
                            type="number"
                            name="salary"
                            value="{{ old('salary', $job->salary) }}"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        @error('salary')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $job->description) }}</textarea>

                        @error('description')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 pt-4">

                        <a href="{{ route('jobs.show', $job) }}"
                           class="px-5 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-medium transition">
                            Update Job
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
```
