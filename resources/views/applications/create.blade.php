@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                    <h2 class="mb-1 fw-bold">Apply for a Job</h2>
                    <p class="mb-0 opacity-75">Complete the form below to submit your application.</p>
                </div>

                <div class="card-body p-5">

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('applications.store') }}" method="POST">
                        @csrf

                        <!-- Job ID -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Job ID</label>
                            <input
                                type="number"
                                name="job_id"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('job_id') }}"
                                placeholder="Enter Job ID"
                                required>
                        </div>

                        <!-- Applicant Name -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Applicant Name</label>
                            <input
                                type="text"
                                name="applicant_name"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('applicant_name') }}"
                                placeholder="John Doe"
                                required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('email') }}"
                                placeholder="john@example.com"
                                required>
                        </div>

                        <!-- Degree -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Degree</label>
                            <input
                                type="text"
                                name="degree"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('degree') }}"
                                placeholder="Bachelor of Science in Information Technology"
                                required>
                        </div>

                        <!-- University -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">University</label>
                            <input
                                type="text"
                                name="university"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('university') }}"
                                placeholder="University Name"
                                required>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ route('applications.index') }}"
                               class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                Back
                            </a>

                            <button type="submit"
                                    class="btn btn-primary px-5 py-2 rounded-3 shadow-sm">
                                Submit Application
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4ecfb 100%);
        min-height: 100vh;
    }

    .card {
        overflow: hidden;
    }

    .form-control {
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13,110,253,.15);
    }

    .btn-primary {
        background: linear-gradient(45deg, #0d6efd, #3b82f6);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        transition: 0.3s;
    }

    .card-header {
        background: linear-gradient(45deg, #0d6efd, #3b82f6) !important;
    }
</style>
@endsection