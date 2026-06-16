<h2>{{ $job->title }}</h2>

<p>{{ $job->company }} - {{ $job->location }}</p>
<p>{{ $job->description }}</p>

<hr>

<h3>Applicants</h3>

@forelse($job->applications as $application)
    <div style="margin-bottom: 15px;">
        <strong>{{ $application->applicant_name }}</strong><br>
        {{ $application->email }}<br>
        {{ $application->degree }} - {{ $application->university }}<br>
        <small>Applied by user ID: {{ $application->user_id }}</small>
    </div>
    <hr>
@empty
    <p>No applicants yet.</p>
@endforelse