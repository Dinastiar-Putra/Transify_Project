<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transify - Penghapus Background Gambar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            padding: 25px 20px;
            border: none;
        }
        .upload-area {
            border: 2px dashed #d0d9e4;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 20px 0;
        }
        .upload-area:hover {
            border-color: #4a6cf7;
            background-color: #f8faff;
            transform: translateY(-5px);
        }
        .preview-image {
            max-width: 100%;
            max-height: 350px;
            margin-top: 25px;
            display: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        .upload-icon {
            color: #4a6cf7;
            margin-bottom: 20px;
        }
        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 3.5rem;
            color: white;
            letter-spacing: -1px;
            margin-bottom: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #ffffff, #e0e0ff);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            transition: transform 0.3s ease;
        }
        .logo-text:hover {
            transform: scale(1.03);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 5px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(74, 108, 247, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(74, 108, 247, 0.4);
        }
        h3 {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        h5 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #4a6cf7;
        }
        .card-body {
            padding: 30px;
        }
        .card-footer {
            background-color: #f8faff;
            border-top: 1px solid #eaeef5;
            padding: 15px;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
        .tagline {
            font-size: 1rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header text-white">
                <div class="logo-container">
                    <div class="logo-text">TRANSIFY</div>
                    <p class="tagline text-white-50 mt-0">Background Remover Tool</p>
                </div>
                <h3 class="mb-0 text-center">Penghapus Background Gambar</h3>
                <p class="text-center text-white-50 mt-2">Hapus background gambar Anda dengan mudah dan cepat</p>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('remove.background') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-area mb-4" id="uploadArea">
                        <div class="upload-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                                <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                            </svg>
                        </div>
                        <h5>Klik atau seret gambar ke sini</h5>
                        <p class="text-muted">Format yang didukung: JPG, PNG, JPEG (Maks. 2MB)</p>
                        <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">
                        <img id="previewImage" class="preview-image" alt="Preview">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-magic me-2" viewBox="0 0 16 16">
                                <path d="M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0v1.829Zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707L14 2.707a.5.5 0 0 0-.207-.672ZM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707L7.293 4Zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1h1.829Zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1h1.829ZM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707L13.293 10ZM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0v1.829Zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0L8.354 9.06Z"/>
                            </svg>
                            Hapus Background
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-muted">
                <p class="mb-0">© 2023 Transify | Dibuat dengan Laravel | Menggunakan API Remove.bg</p>
            </div>
        </div>
    </div>

    <script>
        const uploadArea = document.getElementById('uploadArea');
        const imageInput = document.getElementById('imageInput');
        const previewImage = document.getElementById('previewImage');

        uploadArea.addEventListener('click', () => {
            imageInput.click();
        });

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#4a6cf7';
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.style.borderColor = '#d0d9e4';
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#d0d9e4';
            
            if (e.dataTransfer.files.length) {
                imageInput.files = e.dataTransfer.files;
                displayPreview(e.dataTransfer.files[0]);
            }
        });

        imageInput.addEventListener('change', () => {
            if (imageInput.files.length) {
                displayPreview(imageInput.files[0]);
            }
        });

        function displayPreview(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>