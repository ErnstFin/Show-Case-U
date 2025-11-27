<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Resume Builder - ShowCase U</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        {!! file_get_contents(resource_path('views/css/builder-inline.css')) !!}
    </style>
</head>
<body>
    <div class="builder-container" x-data="builderData()">
        <!-- Sidebar Form -->
        <div class="builder-sidebar">
            <!-- Progress Score -->
            <div class="progress-score">
                <div class="progress-score-value" x-text="resumeScore + '%'">10%</div>
                <div class="progress-score-label">Your resume score</div>
                <div class="progress-tip">
                    <span x-text="scoreTip">+10%</span>
                    <span x-text="scoreTipText">Add job title</span>
                </div>
            </div>

            <!-- Step Indicator -->
            <div class="step-indicator">
                <div class="step" :class="{ active: currentStep === 1 }" @click="currentStep = 1">1. Personal</div>
                <div class="step" :class="{ active: currentStep === 2 }" @click="currentStep = 2">2. Employment</div>
                <div class="step" :class="{ active: currentStep === 3 }" @click="currentStep = 3">3. Education</div>
                <div class="step" :class="{ active: currentStep === 4 }" @click="currentStep = 4">4. Skills</div>
            </div>

            <form @submit.prevent="handleSubmit">
                <!-- Step 1: Personal Details -->
                <div class="step-section" :class="{ active: currentStep === 1 }">
                    <div class="form-section">
                        <div class="section-header">
                            <div>
                                <h2 class="section-title">Personal details</h2>
                                <div class="section-tip">
                                    Users who added phone number and email received 64% more positive feedback from recruiters.
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Job Title</label>
                            <input type="text" class="form-input" placeholder="The role you want" x-model="formData.job_title" @input="updateScore()">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Summary</label>
                            <textarea class="form-input" rows="4" placeholder="Brief professional summary" x-model="formData.summary" @input="updateScore()"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-input" x-model="formData.first_name" @input="updateScore()">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-input" x-model="formData.last_name" @input="updateScore()">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-input" required x-model="formData.email" @input="updateScore()">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-input" x-model="formData.phone" @input="updateScore()">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-input" x-model="formData.address" @input="updateScore()">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">City, State</label>
                                <input type="text" class="form-input" x-model="formData.city_state" @input="updateScore()">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-input" x-model="formData.country" @input="updateScore()">
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary" style="width: 100%; margin-top: 1rem;" @click="currentStep = 2">
                            Next: Employment History
                        </button>
                    </div>
                </div>

                <!-- Step 2: Employment History -->
                <div class="step-section" :class="{ active: currentStep === 2 }">
                    <div class="form-section">
                        <div class="section-header">
                            <h2 class="section-title">Employment History</h2>
                        </div>

                        <template x-for="(job, index) in formData.employment_history" :key="index">
                            <div class="form-group" style="border: 1px solid var(--border); padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                                    <h3 style="font-weight: 600;">Job <span x-text="index + 1"></span></h3>
                                    <button type="button" @click="formData.employment_history.splice(index, 1); updateScore()" style="color: #ef4444;">Remove</button>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Job Title</label>
                                    <input type="text" class="form-input" x-model="job.job_title" @input="updateScore()">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-input" x-model="job.company" @input="updateScore()">
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Start Date</label>
                                        <input type="month" class="form-input" x-model="job.start_date" @input="updateScore()">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">End Date</label>
                                        <input type="month" class="form-input" x-model="job.end_date" @input="updateScore()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-input" rows="3" x-model="job.description" @input="updateScore()"></textarea>
                                </div>
                            </div>
                        </template>

                        <button type="button" class="btn btn-secondary" style="width: 100%;" @click="addEmployment()">
                            + Add Employment
                        </button>

                        <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                            <button type="button" class="btn btn-secondary" style="flex: 1;" @click="currentStep = 1">Previous</button>
                            <button type="button" class="btn btn-primary" style="flex: 1;" @click="currentStep = 3">Next: Education</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Education -->
                <div class="step-section" :class="{ active: currentStep === 3 }">
                    <div class="form-section">
                        <div class="section-header">
                            <h2 class="section-title">Education</h2>
                        </div>

                        <template x-for="(edu, index) in formData.education" :key="index">
                            <div class="form-group" style="border: 1px solid var(--border); padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                                    <h3 style="font-weight: 600;">Education <span x-text="index + 1"></span></h3>
                                    <button type="button" @click="formData.education.splice(index, 1); updateScore()" style="color: #ef4444;">Remove</button>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Degree</label>
                                    <input type="text" class="form-input" x-model="edu.degree" @input="updateScore()">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">School/University</label>
                                    <input type="text" class="form-input" x-model="edu.school" @input="updateScore()">
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Start Date</label>
                                        <input type="month" class="form-input" x-model="edu.start_date" @input="updateScore()">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">End Date</label>
                                        <input type="month" class="form-input" x-model="edu.end_date" @input="updateScore()">
                                    </div>
                                </div>
                            </div>
                        </template>

                        <button type="button" class="btn btn-secondary" style="width: 100%;" @click="addEducation()">
                            + Add Education
                        </button>

                        <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                            <button type="button" class="btn btn-secondary" style="flex: 1;" @click="currentStep = 2">Previous</button>
                            <button type="button" class="btn btn-primary" style="flex: 1;" @click="currentStep = 4">Next: Skills</button>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Skills -->
                <div class="step-section" :class="{ active: currentStep === 4 }">
                    <div class="form-section">
                        <div class="section-header">
                            <h2 class="section-title">Skills & Languages</h2>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Skills (comma separated)</label>
                            <input type="text" class="form-input" placeholder="e.g. JavaScript, PHP, Laravel" x-model="skillsInput" @input="updateSkills()">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Languages</label>
                            <template x-for="(lang, index) in formData.languages" :key="index">
                                <div style="display: flex; gap: 0.5rem; margin-bottom: 0.5rem;">
                                    <input type="text" class="form-input" placeholder="Language" x-model="lang.name" style="flex: 1;">
                                    <input type="text" class="form-input" placeholder="Level" x-model="lang.level" style="width: 120px;">
                                    <button type="button" @click="formData.languages.splice(index, 1)" style="color: #ef4444;">Remove</button>
                                </div>
                            </template>
                            <button type="button" class="btn btn-secondary" @click="formData.languages.push({name: '', level: ''})">
                                + Add Language
                            </button>
                        </div>

                        <div class="action-bar">
                            <div class="terms-text">
                                By signing up by email you agree with our 
                                <a href="/tos">Terms of use</a> and 
                                <a href="/privacy">Privacy Policy</a>.
                            </div>
                            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                                <button type="button" class="btn btn-secondary" style="flex: 1;" @click="currentStep = 3">Previous</button>
                                <button type="button" class="btn btn-primary" style="flex: 1;" @click="downloadCV()">Download CV</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Preview Area -->
        <div class="builder-preview">
            <div class="preview-container">
                <div class="preview-header">
                    <h1 class="preview-name" x-text="getFullName() || 'Your Name'">Your Name</h1>
                    <p class="preview-title" x-text="formData.job_title || 'Job Title'">Job Title</p>
                    <div class="preview-contact">
                        <span x-show="formData.email" x-text="formData.email"></span>
                        <span x-show="formData.phone" x-text="formData.phone"></span>
                        <span x-show="formData.address" x-text="formData.address"></span>
                    </div>
                </div>
                <div x-show="formData.summary" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <h3 style="font-weight: 600; margin-bottom: 1rem;">Summary</h3>
                    <p x-text="formData.summary"></p>
                </div>
                <div x-show="formData.employment_history && formData.employment_history.length > 0" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <h3 style="font-weight: 600; margin-bottom: 1rem;">Employment History</h3>
                    <template x-for="(job, index) in formData.employment_history" :key="index">
                        <div style="margin-bottom: 1.5rem;">
                            <h4 style="font-weight: 600;" x-text="job.job_title + ' at ' + job.company"></h4>
                            <p style="color: var(--text-secondary); font-size: 0.875rem;" x-text="job.start_date + ' - ' + (job.end_date || 'Present')"></p>
                            <p style="margin-top: 0.5rem;" x-text="job.description"></p>
                        </div>
                    </template>
                </div>
                <div x-show="formData.education && formData.education.length > 0" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <h3 style="font-weight: 600; margin-bottom: 1rem;">Education</h3>
                    <template x-for="(edu, index) in formData.education" :key="index">
                        <div style="margin-bottom: 1.5rem;">
                            <h4 style="font-weight: 600;" x-text="edu.degree"></h4>
                            <p style="color: var(--text-secondary);" x-text="edu.school"></p>
                            <p style="color: var(--text-secondary); font-size: 0.875rem;" x-text="edu.start_date + ' - ' + (edu.end_date || 'Present')"></p>
                        </div>
                    </template>
                </div>
                <div x-show="formData.skills && formData.skills.length > 0" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <h3 style="font-weight: 600; margin-bottom: 1rem;">Skills</h3>
                    <div style="display: flex; flex-wrap: gap: 0.5rem;">
                        <template x-for="skill in formData.skills" :key="skill">
                            <span style="background: var(--bg-light); padding: 0.25rem 0.75rem; border-radius: 4px; font-size: 0.875rem;" x-text="skill"></span>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="download-btn" @click="downloadCV()" x-show="resumeScore >= 30">
        📥 Download CV
    </button>

    <script>
        function builderData() {
            return {
                currentStep: 1,
                resumeScore: 10,
                scoreTip: '+10%',
                scoreTipText: 'Add job title',
                skillsInput: '',
                formData: {
                    job_title: '',
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    address: '',
                    city_state: '',
                    country: '',
                    summary: '',
                    employment_history: [],
                    education: [],
                    skills: [],
                    languages: []
                },
                updateScore() {
                    let score = 10;
                    if (this.formData.job_title) score += 10;
                    if (this.formData.first_name && this.formData.last_name) score += 10;
                    if (this.formData.email) score += 10;
                    if (this.formData.phone) score += 10;
                    if (this.formData.summary) score += 10;
                    if (this.formData.employment_history && this.formData.employment_history.length > 0) score += 20;
                    if (this.formData.education && this.formData.education.length > 0) score += 10;
                    if (this.formData.skills && this.formData.skills.length > 0) score += 10;
                    this.resumeScore = Math.min(score, 100);
                    
                    if (!this.formData.job_title) {
                        this.scoreTip = '+10%';
                        this.scoreTipText = 'Add job title';
                    } else if (!this.formData.phone) {
                        this.scoreTip = '+10%';
                        this.scoreTipText = 'Add phone number';
                    } else if (!this.formData.summary) {
                        this.scoreTip = '+10%';
                        this.scoreTipText = 'Add professional summary';
                    } else {
                        this.scoreTip = '';
                        this.scoreTipText = 'Complete more sections';
                    }
                },
                addEmployment() {
                    this.formData.employment_history.push({
                        job_title: '',
                        company: '',
                        start_date: '',
                        end_date: '',
                        description: ''
                    });
                    this.updateScore();
                },
                addEducation() {
                    this.formData.education.push({
                        degree: '',
                        school: '',
                        start_date: '',
                        end_date: ''
                    });
                    this.updateScore();
                },
                updateSkills() {
                    this.formData.skills = (this.skillsInput || '') 
                        .split(',')
                        .map(s => s.trim())
                        .filter(s => s.length > 0); // Pastikan string hasil split tidak kosong
                    this.updateScore();
                },
                getFullName() {
                    const parts = [this.formData.first_name, this.formData.last_name].filter(Boolean);
                    return parts.length > 0 ? parts.join(' ') : '';
                },
                async downloadCV() {
                    try {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        const response = await fetch('{{ route("resume.download-data") }}', { 
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/pdf'
                            },
                            body: JSON.stringify(this.formData)
                        });
                        
                        if (response.ok) {
                            const blob = await response.blob();
                            const url = window.URL.createObjectURL(blob);
                            const filenameHeader = response.headers.get('Content-Disposition');
                            let filename = (this.getFullName() || 'resume') + '_CV.pdf';
                            
                            // Logika yang lebih baik untuk mendapatkan nama file dari header respons
                            if (filenameHeader && filenameHeader.indexOf('filename=') !== -1) {
                                // Ekstraksi nama file dan pembersihan
                                filename = filenameHeader.split('filename=')[1].replace(/"/g, '').replace(/_/g, ' ').trim();
                                if(filename.toLowerCase().endsWith('.pdf')) {
                                    filename = filename.substring(0, filename.length - 4) + '.pdf';
                                }
                                filename = filename.replace(/\s/g, '_'); // Ganti spasi kembali menjadi underscore untuk download
                            }
                            
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);
                            document.body.removeChild(a);
                        } else {
                            // PERBAIKAN: Menambahkan penanganan error yang lebih informatif (jika ada error validasi)
                            const errorText = await response.text();
                            let message = 'Error downloading CV. Please try again.';
                            try {
                                const errorJson = JSON.parse(errorText);
                                if (errorJson.message) {
                                    message = 'Validation Error: ' + errorJson.message;
                                    // Anda dapat menambahkan logika untuk menampilkan error spesifik per kolom di sini
                                }
                            } catch (e) {
                                // Abaikan error parse jika bukan format JSON
                            }
                            alert(message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Error downloading CV. Please try again.');
                    }
                },
                handleSubmit() {
                    // Auto-save functionality can be added here
                    console.log('Form data:', this.formData);
                }
            }
        }
    </script>
</body>
</html>

