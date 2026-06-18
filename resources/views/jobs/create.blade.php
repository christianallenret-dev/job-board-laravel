<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Create Job
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Add a new job listing and start receiving applications.
            </p>
        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                <!-- Top Accent -->
                <div class="h-2 bg-gradient-to-r from-indigo-600 to-violet-600"></div>

                <div class="p-8 md:p-10">

                    <div class="mb-8">

                        <h3 class="text-xl font-semibold text-gray-900">
                            Job Information
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Fill in the details below to create a new job posting.
                        </p>

                    </div>

                    <form action="{{ route('jobs.store') }}"
                          method="POST"
                          class="space-y-6">

                        @csrf
                        <!-- Job Title -->
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" class="border p-2 w-full">
                        </div>

                        <div>
                            <label>Description</label>
                            <textarea name="description" class="border p-2 w-full"></textarea>
                        </div>

                        <div>
                            <label>Location</label>
                            <input type="text" name="location" class="border p-2 w-full">
                        </div>

                        <div>
                            <label>Salary</label>
                            <input type="number" name="salary" class="border p-2 w-full">
                        </div>

                        <div>
                            <label>Type</label>
                            <input type="text" name="type" class="border p-2 w-full">
                        </div>

                        <div>
                            <label>Company</label>
                            <input type="text" name="company" class="border p-2 w-full">
                        </div>

                        <div class="pt-6 border-t border-gray-100">

                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                                <a href="{{ route('jobs.index') }}"
                                   class="px-5 py-3 border border-gray-300 rounded-xl text-center text-gray-700 hover:bg-gray-50 transition">
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl transition shadow-sm">
                                    Save Job
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>