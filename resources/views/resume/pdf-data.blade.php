<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resume - {{ $data['first_name'] ?? '' }} {{ $data['last_name'] ?? '' }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #333;
            padding: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #2563eb;
        }
        .header h1 {
            font-size: 24pt;
            font-weight: bold;
            margin-bottom: 5px;
            color: #1e293b;
        }
        .header .job-title {
            font-size: 14pt;
            color: #64748b;
            margin-bottom: 15px;
        }
        .header .contact {
            font-size: 10pt;
            color: #64748b;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 14pt;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e2e8f0;
        }
        .summary {
            text-align: justify;
            margin-bottom: 20px;
        }
        .employment-item, .education-item {
            margin-bottom: 20px;
        }
        .employment-item h3, .education-item h3 {
            font-size: 12pt;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 5px;
        }
        .employment-item .company, .education-item .school {
            font-size: 11pt;
            color: #64748b;
            margin-bottom: 5px;
        }
        .employment-item .period, .education-item .period {
            font-size: 10pt;
            color: #64748b;
            font-style: italic;
            margin-bottom: 10px;
        }
        .employment-item .description {
            font-size: 10pt;
            text-align: justify;
            margin-top: 8px;
        }
        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .skill-tag {
            background: #f1f5f9;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 10pt;
        }
        .languages {
            margin-top: 10px;
        }
        .language-item {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ ($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? 'Your Name') }}</h1>
        @if(!empty($data['job_title']))
        <div class="job-title">{{ $data['job_title'] }}</div>
        @endif
        <div class="contact">
            @if(!empty($data['email']))
                {{ $data['email'] }}
            @endif
            @if(!empty($data['phone']))
                @if(!empty($data['email'])) | @endif
                {{ $data['phone'] }}
            @endif
            @if(!empty($data['address']))
                @if(!empty($data['email']) || !empty($data['phone'])) | @endif
                {{ $data['address'] }}
            @endif
        </div>
    </div>

    @if(!empty($data['summary']))
    <div class="section">
        <div class="section-title">Professional Summary</div>
        <div class="summary">{{ $data['summary'] }}</div>
    </div>
    @endif

    @if(!empty($data['employment_history']) && is_array($data['employment_history']) && count($data['employment_history']) > 0)
    <div class="section">
        <div class="section-title">Employment History</div>
        @foreach($data['employment_history'] as $job)
            @if(!empty($job['job_title']) || !empty($job['company']))
            <div class="employment-item">
                <h3>{{ $job['job_title'] ?? 'Position' }}@if(!empty($job['company'])) at {{ $job['company'] }}@endif</h3>
                @if(!empty($job['start_date']))
                <div class="period">
                    {{ $job['start_date'] }} - {{ $job['end_date'] ?? 'Present' }}
                </div>
                @endif
                @if(!empty($job['description']))
                <div class="description">{{ $job['description'] }}</div>
                @endif
            </div>
            @endif
        @endforeach
    </div>
    @endif

    @if(!empty($data['education']) && is_array($data['education']) && count($data['education']) > 0)
    <div class="section">
        <div class="section-title">Education</div>
        @foreach($data['education'] as $edu)
            @if(!empty($edu['degree']) || !empty($edu['school']))
            <div class="education-item">
                <h3>{{ $edu['degree'] ?? 'Degree' }}</h3>
                @if(!empty($edu['school']))
                <div class="school">{{ $edu['school'] }}</div>
                @endif
                @if(!empty($edu['start_date']))
                <div class="period">
                    {{ $edu['start_date'] }} - {{ $edu['end_date'] ?? 'Present' }}
                </div>
                @endif
            </div>
            @endif
        @endforeach
    </div>
    @endif

    @if(!empty($data['skills']) && is_array($data['skills']) && count($data['skills']) > 0)
    <div class="section">
        <div class="section-title">Skills</div>
        <div class="skills">
            @foreach($data['skills'] as $skill)
                <span class="skill-tag">{{ $skill }}</span>
            @endforeach
        </div>
    </div>
    @endif

    @if(!empty($data['languages']) && is_array($data['languages']) && count($data['languages']) > 0)
    <div class="section">
        <div class="section-title">Languages</div>
        <div class="languages">
            @foreach($data['languages'] as $lang)
                @if(!empty($lang['name']))
                <div class="language-item">
                    <strong>{{ $lang['name'] }}</strong>@if(!empty($lang['level'])) - {{ $lang['level'] }}@endif
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @endif
</body>
</html>

