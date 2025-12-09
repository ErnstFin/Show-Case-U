<!DOCTYPE html>
<html>
<head>
    <title>CV {{ $cv->full_name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* ===== RESET & BASE ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2c3e50;
            background: white;
            line-height: 1.6;
        }

        /* ===== PAGE LAYOUT ===== */
        .cv-container {
            max-width: 8.5in;
            height: 11in;
            margin: 0 auto;
            background: white;
            padding: 0;
        }

        /* ===== HEADER SECTION (With Gradient) ===== */
        .cv-header {
            background: linear-gradient(135deg, #FFB5B6 0%, #FFE5D9 100%);
            padding: 30px 35px;
            display: flex;
            gap: 25px;
            align-items: flex-start;
            border-bottom: 3px solid #FFB5B6;
        }

        .header-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: white;
            border: 3px solid white;
            overflow: hidden;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            color: #FFB5B6;
        }

        .header-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .header-info h1 {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
            line-height: 1.2;
        }

        .header-info .profession {
            font-size: 14px;
            color: #555;
            margin-top: 3px;
            font-weight: 500;
        }

        .header-info .contact {
            font-size: 11px;
            color: #666;
            margin-top: 10px;
            line-height: 1.4;
        }

        .header-info .contact span {
            display: inline-block;
            margin-right: 12px;
        }

        /* ===== MAIN CONTENT ===== */
        .cv-body {
            padding: 30px 35px;
        }

        /* ===== SECTION HEADERS ===== */
        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #2c3e50;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border-left: 4px solid #FFB5B6;
            padding-left: 12px;
            margin-top: 20px;
            margin-bottom: 12px;
        }

        .section-title:first-of-type {
            margin-top: 0;
        }

        /* ===== SUMMARY SECTION ===== */
        .summary-text {
            font-size: 12px;
            color: #444;
            line-height: 1.6;
            margin-bottom: 3px;
        }

        /* ===== EXPERIENCE BLOCK ===== */
        .job-block {
            margin-bottom: 18px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e8e8e8;
        }

        .job-block:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .job-title {
            font-size: 13px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0 0 4px 0;
        }

        .job-company {
            font-size: 11px;
            color: #666;
            margin: 0;
            font-weight: 500;
        }

        .job-description {
            font-size: 11px;
            color: #555;
            margin-top: 6px;
            line-height: 1.5;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        /* ===== EDUCATION BLOCK ===== */
        .edu-block {
            margin-bottom: 16px;
            padding-bottom: 14px;
            border-bottom: 1px solid #e8e8e8;
        }

        .edu-block:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .edu-degree {
            font-size: 13px;
            font-weight: 700;
            color: #2c3e50;
            margin: 0 0 3px 0;
        }

        .edu-school {
            font-size: 11px;
            color: #666;
            margin: 0;
            font-weight: 500;
        }

        .edu-gpa {
            font-size: 10px;
            color: #999;
            margin-top: 3px;
        }

        /* ===== SKILLS SECTION ===== */
        .skills-text {
            font-size: 11px;
            color: #555;
            line-height: 1.6;
        }

        /* ===== UTILITY ===== */
        .text-muted {
            color: #999;
            font-size: 10px;
        }
    </style>
</head>
<body>

<div class="cv-container">
    
    {{-- HEADER WITH GRADIENT --}}
    <div class="cv-header">
        <div class="header-avatar">
            @if($cv->photo_path)
                <img src="{{ public_path('storage/' . $cv->photo_path) }}" alt="Avatar">
            @elseif($cv->user->avatar && str_contains($cv->user->avatar, 'storage'))
                <img src="{{ public_path($cv->user->avatar) }}" alt="Avatar">
            @else
                {{ substr($cv->full_name, 0, 1) }}
            @endif
        </div>
        
        <div class="header-info">
            <h1>{{ $cv->full_name }}</h1>
            <div class="profession">{{ $cv->profession }}</div>
            <div class="contact">
                <span>📧 {{ $cv->email }}</span>
                @if($cv->phone)
                <span>📱 {{ $cv->phone }}</span>
                @endif
                @if($cv->address)
                <span>📍 {{ $cv->address }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- BODY CONTENT --}}
    <div class="cv-body">
        
        {{-- PROFESSIONAL SUMMARY --}}
        @if($cv->summary)
        <div>
            <h2 class="section-title">Professional Summary</h2>
            <p class="summary-text">{{ $cv->summary }}</p>
        </div>
        @endif

        {{-- PROFESSIONAL EXPERIENCE --}}
        @if($cv->experience)
        <div>
            <h2 class="section-title">Professional Experience</h2>
            @foreach(explode("\n\n", trim($cv->experience)) as $exp)
                @if(trim($exp))
                <div class="job-block">
                    @php
                        $lines = array_filter(array_map('trim', explode("\n", $exp)));
                        $title = $lines[0] ?? '';
                        $details = implode("\n", array_slice($lines, 1));
                    @endphp
                    <h3 class="job-title">{{ $title }}</h3>
                    <p class="job-description">{{ $details }}</p>
                </div>
                @endif
            @endforeach
        </div>
        @endif

        {{-- EDUCATION --}}
        @if($cv->education)
        <div>
            <h2 class="section-title">Education & Qualifications</h2>
            @foreach(explode("\n\n", trim($cv->education)) as $edu)
                @if(trim($edu))
                <div class="edu-block">
                    @php
                        $lines = array_filter(array_map('trim', explode("\n", $edu)));
                        $degree = $lines[0] ?? '';
                        $school = $lines[1] ?? '';
                        $extra = implode(" | ", array_slice($lines, 2));
                    @endphp
                    <h3 class="edu-degree">{{ $degree }}</h3>
                    <p class="edu-school">{{ $school }}</p>
                    @if($extra)
                    <p class="edu-gpa">{{ $extra }}</p>
                    @endif
                </div>
                @endif
            @endforeach
        </div>
        @endif

        {{-- SKILLS --}}
        @if($cv->skills)
        <div>
            <h2 class="section-title">Technical Skills</h2>
            <p class="skills-text">{{ $cv->skills }}</p>
        </div>
        @endif

    </div>

</div>

</body>
</html>