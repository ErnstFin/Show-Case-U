<!DOCTYPE html>
<html>
<head>
    <title>CV {{ $cv->full_name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Reset & Base */
        body { font-family: sans-serif; color: #333; margin: 0; padding: 0; }
        
        /* Layout Kiri (Sidebar) */
        .sidebar {
            background-color: #FFE5D9; /* Brand Peach */
            width: 30%;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
            text-align: left;
        }

        /* Layout Kanan (Main) */
        .main-content {
            width: 65%;
            margin-left: 33%; /* Geser ke kanan supaya gak ketutup sidebar */
            padding: 40px 20px;
        }

        /* Typography */
        h1 { color: #333; margin: 0; font-size: 24px; text-transform: uppercase; line-height: 1.2; }
        h2 { color: #FF8BA7; /* Darker Pink */ font-size: 14px; margin-top: 5px; text-transform: uppercase; letter-spacing: 2px; }
        
        h3 { 
            border-bottom: 2px solid #D6EBF2; /* Brand Sky */
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 20px;
        }

        p { font-size: 12px; line-height: 1.5; margin-bottom: 10px; }
        
        /* Elemen Khusus */
        .contact-info p { margin-bottom: 8px; font-size: 11px; word-wrap: break-word; }
        .skills-list span { 
            display: block; 
            background: #fff; 
            padding: 5px 8px; 
            margin-bottom: 5px; 
            border-radius: 4px; 
            font-size: 11px;
            color: #555;
        }
        
        /* Foto Profil Bulat */
        .avatar-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #fff;
            margin: 0 auto 20px auto;
            overflow: hidden;
            border: 4px solid #fff;
        }
        
        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="avatar-container">
            @if($cv->user->avatar && str_contains($cv->user->avatar, 'storage'))
                <img src="{{ public_path($cv->user->avatar) }}" class="avatar-img">
            @else
                <div style="line-height: 120px; text-align: center; color: #FFB5B6; font-size: 50px; font-weight: bold;">
                    {{ substr($cv->full_name, 0, 1) }}
                </div>
            @endif
        </div>

        <h3>Kontak</h3>
        <div class="contact-info">
            <p><strong>Email:</strong><br>{{ $cv->email }}</p>
            <p><strong>Telepon:</strong><br>{{ $cv->phone }}</p>
            @if($cv->address)
            <p><strong>Alamat:</strong><br>{{ $cv->address }}</p>
            @endif
        </div>

        @if($cv->skills)
        <h3>Keahlian</h3>
        <div class="skills-list">
            @foreach(explode(',', $cv->skills) as $skill)
                <span>{{ trim($skill) }}</span>
            @endforeach
        </div>
        @endif
    </div>

    <div class="main-content">
        <div style="margin-bottom: 30px;">
            <h1>{{ $cv->full_name }}</h1>
            <h2>{{ $cv->profession }}</h2>
        </div>

        @if($cv->summary)
        <div>
            <h3>Tentang Saya</h3>
            <p>{{ $cv->summary }}</p>
        </div>
        @endif

        @if($cv->experience)
        <div>
            <h3>Pengalaman Kerja</h3>
            <p>{!! nl2br(e($cv->experience)) !!}</p>
        </div>
        @endif

        @if($cv->education)
        <div>
            <h3>Pendidikan</h3>
            <p>{!! nl2br(e($cv->education)) !!}</p>
        </div>
        @endif
    </div>

</body>
</html>