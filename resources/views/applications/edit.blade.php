<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Edit Application
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Update applicant details
            </p>
        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">

                <form action="{{ route('applications.update', $application) }}"
                      method="POST"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Applicant Name
                        </label>

                        <input type="text"
                               name="applicant_name"
                               value="{{ old('applicant_name', $application->applicant_name) }}"
                               class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        @error('applicant_name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', $application->email) }}"
                               class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Education Grid -->
                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Degree
                            </label>

                            <input type="text"
                                   name="degree"
                                   value="{{ old('degree', $application->degree) }}"
                                   class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                            @error('degree')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                University
                            </label>

                            <input type="text"
                                   name="university"
                                   value="{{ old('university', $application->university) }}"
                                   class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                            @error('university')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 pt-4">

                        <a href="{{ route('applications.show', $application) }}"
                           class="px-5 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                            Update Application
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>