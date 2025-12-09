<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $cv->full_name }}</title>
    <style>
        /* RESET & BASIC SETUP */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #2c3e50;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        
        /* HEADER SECTION (PINK) */
        .header {
            background-color: #FFB5B6; /* Warna Pink Brand */
            padding: 40px;
            color: white;
            position: relative;
        }
        
        /* FOTO PROFIL CONTAINER (FIX FOTO GEPENG) */
        .profile-img-container { 
            width: 100px;
            height: 100px;
            border-radius: 50%; /* Membuat lingkaran */
            border: 4px solid white;
            overflow: hidden; /* CRUCIAL: Memotong gambar di luar lingkaran */
            float: left;
            margin-right: 30px;
            background-color: #fff;
            display: block; 
        }

        /* GAYA GAMBAR DI DALAM CONTAINER */
        .profile-img-container img {
            width: 100%; 
            height: auto; /* <--- CRITICAL FIX: Menggunakan auto agar rasio terjaga */
            object-fit: cover; 
            display: block;
        }

        .name-title {
            overflow: hidden; 
            padding-top: 15px;
        }

        h1 { margin: 0; font-size: 32px; text-transform: uppercase; letter-spacing: 1px; line-height: 1.2; }
        .profession { font-size: 18px; font-weight: normal; opacity: 0.9; margin-top: 5px; margin-bottom: 15px; }

        .contact-info { font-size: 12px; margin-top: 10px; opacity: 0.9; }
        .contact-item { display: inline-block; margin-right: 15px; }

        .content { padding: 40px; }
        .section { margin-bottom: 35px; }
        .section-title { font-size: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; color: #2c3e50; border-bottom: 2px solid #FFB5B6; padding-bottom: 5px; margin-bottom: 15px; }
        p { margin: 0 0 10px 0; font-size: 13px; color: #555; text-align: justify; }

        /* PENDIDIKAN & PENGALAMAN ITEM */
        .item { margin-bottom: 15px; }
        .item-header { display: table; width: 100%; margin-bottom: 2px; }
        .item-title { display: table-cell; font-weight: bold; font-size: 14px; color: #333; width: 70%; }
        .item-date { display: table-cell; text-align: right; font-size: 12px; color: #888; font-style: italic; width: 30%; }
        .item-subtitle { font-weight: bold; font-size: 13px; color: #FFB5B6; margin-bottom: 5px; }

        /* CLEARFIX */
        .clearfix::after { content: ""; clear: both; display: table; }
    </style>
</head>
<body>

    <div class="header clearfix">
        @if($cv->photo_path)
            <div class="profile-img-container">
                <img src="{{ public_path('storage/' . $cv->photo_path) }}" alt="Profile Image" style="object-fit: cover;">
            </div>
        @else
            <div class="profile-img-container" style="display: flex; align-items: center; justify-content: center; color: #FFB5B6; font-size: 40px; font-weight: bold;">
                {{ substr($cv->full_name, 0, 1) }}
            </div>
        @endif

        <div class="name-title">
            <h1>{{ $cv->full_name }}</h1>
            <div class="profession">{{ $cv->profession }}</div>
            
            <div class="contact-info">
                <span class="contact-item">{{ $cv->email }}</span>
                @if($cv->phone) <span class="contact-item">| &nbsp; {{ $cv->phone }}</span> @endif
                @if($cv->address) <span class="contact-item">| &nbsp; {{ $cv->address }}</span> @endif
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

        @if($cv->university)
        <div class="section">
            <div class="section-title">Education</div>
            <div class="item">
                <div class="item-header">
                    <div class="item-title">{{ $cv->university }}</div>
                </div>
                <div class="item-subtitle">
                    {{ $cv->major ?? 'Jurusan' }} 
                    @if($cv->gpa) 
                        <span style="color: #555; font-weight: normal;">| IPK: {{ $cv->gpa }}</span> 
                    @endif
                </div>
            </div>
        </div>
        @endif

        @if($cv->workExperiences && $cv->workExperiences->count() > 0)
        <div class="section">
            <div class="section-title">Experience</div>
            
            @foreach($cv->workExperiences as $exp)
            <div class="item">
                <div class="item-header">
                    <div class="item-title">{{ $exp->position }}</div>
                    <div class="item-date">
                        {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }} - 
                        {{ $exp->is_current ? 'Present' : ($exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : 'Present') }}
                    </div>
                </div>
                <div class="item-subtitle">{{ $exp->company }}</div>
                @if($exp->description)
                    <p>{{ $exp->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @else
            @if($cv->experience)
            <div class="section">
                <div class="section-title">Experience (Data Lama)</div>
                <p>{!! nl2br(e($cv->experience)) !!}</p>
            </div>
            @endif
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