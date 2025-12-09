<!DOCTYPE html>
<html>
<head>
    <title>CV ATS {{ $cv->full_name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* CSS Sederhana untuk ATS */
        body { font-family: 'Arial', sans-serif; color: #000; margin: 0; padding: 0; font-size: 12pt; line-height: 1.4; }
        .container { width: 90%; margin: 20px auto; }
        h1 { font-size: 20pt; margin: 0 0 5px 0; text-align: center; text-transform: uppercase; }
        h2 { font-size: 16pt; border-bottom: 2px solid #000; padding-bottom: 2px; margin-top: 15px; margin-bottom: 10px; text-transform: uppercase; }
        h3 { font-size: 13pt; margin: 0 0 5px 0; }
        p { margin: 0 0 10px 0; font-size: 11pt; }
        .contact-info { text-align: center; margin-bottom: 20px; font-size: 11pt; }
        .contact-info span { margin: 0 10px; }
        .experience, .education { margin-bottom: 15px; }
        .detail { white-space: pre-wrap; margin-left: 15px; }
    </style>
</head>
<body>
    <div class="container">
        
        @if($cv->photo_path)
        <div style="text-align: center; margin-bottom: 15px;">
            <img src="{{ public_path('storage/' . $cv->photo_path) }}" alt="Avatar" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
        </div>
        @endif
        
        <h1>{{ $cv->full_name }}</h1>
        <p class="contact-info">
            <span>{{ $cv->profession }}</span> |
            <span>{{ $cv->email }}</span> |
            <span>{{ $cv->phone }}</span> 
            @if($cv->address) | <span>{{ $cv->address }}</span> @endif
        </p>

        @if($cv->summary)
        <h2>Ringkasan Profil</h2>
        <p>{{ $cv->summary }}</p>
        @endif

        @if($cv->skills)
        <h2>Keahlian</h2>
        <p>{{ str_replace(',', ' | ', $cv->skills) }}</p>
        @endif
        
        @if($cv->experience)
        <h2>Pengalaman Kerja</h2>
        <div class="experience">
            <div class="detail">{!! nl2br(e($cv->experience)) !!}</div>
        </div>
        @endif

        @if($cv->education)
        <h2>Pendidikan</h2>
        <div class="education">
            <div class="detail">{!! nl2br(e($cv->education)) !!}</div>
        </div>
        @endif
        
    </div>
</body>
</html>