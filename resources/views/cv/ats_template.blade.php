<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $cv->full_name }}</title>
    <style>
        body { font-family: 'Times New Roman', serif; color: #000; line-height: 1.4; font-size: 12pt; }
        .header { text-align: center; border-bottom: 1px solid #000; padding-bottom: 10px; margin-bottom: 15px; }
        h1 { margin: 0; font-size: 18pt; text-transform: uppercase; }
        .sub-header { margin-top: 5px; font-size: 11pt; }
        .section-title { font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #000; margin-top: 15px; margin-bottom: 8px; }
        .item { margin-bottom: 10px; }
        .flex-row { overflow: hidden; }
        .left-col { float: left; font-weight: bold; }
        .right-col { float: right; font-style: italic; }
        .subtitle { font-style: italic; }
        p { margin: 2px 0; text-align: justify; }
        ul { margin: 2px 0 0 20px; padding: 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $cv->full_name }}</h1>
        <div class="sub-header">
            {{ $cv->email }} | {{ $cv->phone }} | {{ $cv->address }}
        </div>
    </div>

    @if($cv->summary)
    <div class="section-title">PROFESSIONAL SUMMARY</div>
    <p>{{ $cv->summary }}</p>
    @endif

    <div class="section-title">EDUCATION</div>
    <div class="item">
        <div class="flex-row">
            <div class="left-col">{{ $cv->university ?? 'University Name' }}</div>
            <div class="right-col">{{ $cv->gpa ? 'GPA: ' . $cv->gpa : '' }}</div>
        </div>
        <div class="subtitle">{{ $cv->major ?? 'Major' }}</div>
    </div>

    @if($cv->workExperiences->count() > 0)
    <div class="section-title">WORK EXPERIENCE</div>
    @foreach($cv->workExperiences as $exp)
    <div class="item">
        <div class="flex-row">
            <div class="left-col">{{ $exp->company }}</div>
            <div class="right-col">
                {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - 
                {{ $exp->is_current ? 'Present' : ($exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present') }}
            </div>
        </div>
        <div class="subtitle">{{ $exp->position }}</div>
        @if($exp->description)<p>{{ $exp->description }}</p>@endif
    </div>
    @endforeach
    @endif

    @if($cv->skills)
    <div class="section-title">SKILLS</div>
    <p>{{ $cv->skills }}</p>
    @endif
</body>
</html>