<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transify - Hasil Penghapusan Background</title>
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
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            padding: 25px 20px;
            border: none;
        }
        .result-image {
            max-width: 100%;
            max-height: 400px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }
        .result-image:hover {
            transform: scale(1.02);
        }
        .comparison-container {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        .image-container {
            flex: 1;
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        .image-container:hover {
            transform: translateY(-5px);
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
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46, 204, 113, 0.4);
        }
        .btn-outline-secondary {
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-secondary:hover {
            transform: translateY(-3px);
        }
        h3 {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        h5 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #2ecc71;
        }
        .card-body {
            padding: 30px;
        }
        .card-footer {
            background-color: #f8faff;
            border-top: 1px solid #eaeef5;
            padding: 15px;
        }
        .tagline {
            font-size: 1rem;
            opacity: 0.8;
        }
        @media (max-width: 768px) {
            .comparison-container {
                flex-direction: column;
            }
            .logo-text {
                font-size: 2.5rem;
            }
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
                <h3 class="mb-0 text-center">Background Berhasil Dihapus!</h3>
                <p class="text-center text-white-50 mt-2">Berikut hasil penghapusan background gambar Anda</p>
            </div>
            <div class="card-body">
                <div class="comparison-container">
                    <div class="image-container">
                        <h5>Gambar Asli</h5>
                        <img src="{{ asset($originalImage) }}" alt="Gambar Asli" class="result-image">
                    </div>
                    <div class="image-container">
                        <h5>Hasil</h5>
                        <img src="{{ asset($resultImage) }}" alt="Hasil" class="result-image">
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ $downloadUrl }}" download="no-background-image.png" class="btn btn-primary btn-lg px-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download me-2" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                        Download Gambar
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg ms-2 px-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                        </svg>
                        Hapus Gambar Lain
                    </a>
                </div>
            </div>
            <div class="card-footer text-center text-muted">
                <p class="mb-0">© 2023 Transify | Dibuat dengan Laravel | Menggunakan API Remove.bg</p>
            </div>
        </div>
    </div>
</body>
</html>