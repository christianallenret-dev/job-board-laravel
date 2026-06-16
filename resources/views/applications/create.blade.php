<x-app-layout>
    @php($hideNavigation = true)

    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

                {{-- HEADER --}}
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-white">
                    <h1 class="text-2xl font-bold">Job Application</h1>
                    <p class="text-sm text-white/80 mt-1">
                        Fill out your details carefully before submitting your application
                    </p>
                </div>

                {{-- BODY --}}
                <div class="p-8">

                    {{-- ERRORS --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg">
                            <ul class="list-disc ml-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('applications.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- GRID INPUTS --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- First Name --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    First Name
                                </label>
                                <input type="text" name="first_name"
                                    value="{{ old('first_name') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm p-3"
                                    placeholder="John">
                            </div>

                            {{-- Last Name --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Last Name
                                </label>
                                <input type="text" name="last_name"
                                    value="{{ old('last_name') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm p-3"
                                    placeholder="Doe">
                            </div>

                            {{-- Email --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Email Address
                                </label>
                                <input type="email" name="email"
                                    value="{{ old('email') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm p-3"
                                    placeholder="john@example.com">
                            </div>

                            {{-- Degree --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Degree
                                </label>
                                <input type="text" name="degree"
                                    value="{{ old('degree') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm p-3"
                                    placeholder="BS Information Technology">
                            </div>

                            {{-- University --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    University
                                </label>
                                <input type="text" name="university"
                                    value="{{ old('university') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm p-3"
                                    placeholder="Your University">
                            </div>

                        </div>

                        {{-- ACTIONS --}}
                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">

                            <a href="{{ route('jobs.index') }}"
                               class="text-gray-600 hover:text-gray-900 transition">
                                ← Back to Jobs
                            </a>

                            <button type="submit"
                                class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] transition">
                                Submit Application
                            </button>

                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>