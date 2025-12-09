<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $cv->full_name }}</title>
    <style>
        body { font-family: sans-serif; color: #2c3e50; line-height: 1.6; margin: 0; padding: 0; }
        .header { background-color: #FFB5B6; padding: 30px; color: white; overflow: hidden; }
        .profile-img { width: 100px; height: 100px; border-radius: 50%; border: 3px solid white; float: left; margin-right: 20px; object-fit: cover; background: #fff; }
        .name-title { padding-top: 10px; }
        h1 { margin: 0; font-size: 28px; text-transform: uppercase; }
        .profession { font-size: 16px; opacity: 0.9; margin-bottom: 5px; }
        .contact { font-size: 11px; }
        .content { padding: 30px; }
        .section { margin-bottom: 25px; }
        .section-title { font-size: 14px; font-weight: bold; text-transform: uppercase; border-bottom: 2px solid #FFB5B6; padding-bottom: 5px; margin-bottom: 10px; color: #2c3e50; }
        .item { margin-bottom: 15px; }
        .item-header { overflow: hidden; margin-bottom: 2px; }
        .left { float: left; font-weight: bold; color: #333; }
        .right { float: right; font-size: 12px; color: #7f8c8d; font-style: italic; }
        .subtitle { font-size: 13px; color: #e57373; font-weight: bold; }
        p { margin: 2px 0 0 0; font-size: 12px; color: #555; text-align: justify; }
        .clearfix::after { content: ""; clear: both; display: table; }
    </style>
</head>
<body>
    <div class="header">
        @if($cv->photo_path)
            <img src="{{ public_path('storage/' . $cv->photo_path) }}" class="profile-img">
        @else
            <div class="profile-img" style="text-align: center; line-height: 100px; color: #FFB5B6; font-size: 40px; font-weight: bold;">{{ substr($cv->full_name, 0, 1) }}</div>
        @endif
        <div class="name-title">
            <h1>{{ $cv->full_name }}</h1>
            <div class="profession">{{ $cv->profession }}</div>
            <div class="contact">
                {{ $cv->email }} @if($cv->phone) | {{ $cv->phone }} @endif @if($cv->address) | {{ $cv->address }} @endif
            </div>
        </div>
    </div>

    <div class="content">
        @if($cv->summary)
        <div class="section">
            <div class="section-title">Profile</div>
            <p>{{ $cv->summary }}</p>
        </div>
        @endif

        <div class="section">
            <div class="section-title">Education</div>
            <div class="item">
                <div class="item-header">
                    <div class="left">{{ $cv->university ?? 'Nama Universitas Belum Diisi' }}</div>
                </div>
                <div class="subtitle">
                    {{ $cv->major ?? 'Jurusan' }} 
                    @if($cv->gpa) <span style="color: #555; font-weight: normal;">| IPK: {{ $cv->gpa }}</span> @endif
                </div>
            </div>
        </div>

        @if($cv->workExperiences->count() > 0)
        <div class="section">
            <div class="section-title">Experience</div>
            @foreach($cv->workExperiences as $exp)
            <div class="item">
                <div class="item-header">
                    <div class="left">{{ $exp->position }}</div>
                    <div class="right">
                        {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - 
                        {{ $exp->is_current ? 'Present' : ($exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present') }}
                    </div>
                </div>
                <div class="subtitle">{{ $exp->company }}</div>
                @if($exp->description)<p>{{ $exp->description }}</p>@endif
            </div>
            @endforeach
        </div>
        @endif

        @if($cv->skills)
        <div class="section">
            <div class="section-title">Skills</div>
            <p>{{ $cv->skills }}</p>
        </div>
        @endif
    </div>
</body>
</html>