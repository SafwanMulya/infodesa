@extends('layout.app', ['title' => $informasi->judul ?? 'Detail Informasi'])
@section('content')
<div class="container shadow bg-white mt-5 p-4 rounded">
    <!-- Judul Informasi -->
    <h2 class="mb-3 py-3 text-center fw-bold text-success">{{ $informasi->judul }}</h2>
    <p class="text-muted text-center">
        <i class="bi bi-calendar-event me-1"></i>
        {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d-m-Y') }} • Desa Tameran
    </p>
    <hr>
    <div class="p-4 fs-5">
        <p>{!! nl2br(e($informasi->konten)) !!}</p>
    </div>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success fade show" id="alert-message">{{ session('success') }}</div>
    @endif

    <!-- Pesan Error -->
    @if($errors->any())
        <div class="alert alert-danger fade show" id="alert-message">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Komentar -->
    <div class="card mt-4 shadow-sm border-0">
        <div class="card-header bg-gradient bg-primary text-white fw-bold">
            <i class="bi bi-chat-dots-fill me-2"></i> Tinggalkan Komentar
        </div>
        <div class="card-body">
            <form id="comment-form" action="{{ route('komentar.store', $informasi->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="nama" class="form-control shadow-sm" placeholder="Nama Anda" required>
                </div>
                <div class="mb-3">
                    <textarea name="isi" class="form-control shadow-sm" rows="3" placeholder="Tulis komentar..." required></textarea>
                </div>
                <button type="submit" class="btn btn-success px-4 shadow-sm">
                    <i class="bi bi-send-fill me-1"></i> Kirim
                </button>
            </form>
        </div>
    </div>

    <!-- Daftar Komentar -->
    <div class="card mt-4 shadow-sm border-0">
        <div class="card-header bg-gradient bg-secondary text-white fw-bold">
            <i class="bi bi-people-fill me-2"></i> Komentar
        </div>
        <div class="card-body" id="comment-list">
            @forelse($informasi->komentars as $komen)
                <div class="comment-item mb-3 p-3 border rounded shadow-sm">
                    <div class="d-flex justify-content-between">
                        <strong class="text-primary">{{ $komen->nama }}</strong>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($komen->created_at)->diffForHumans() }}</small>
                    </div>
                    <p class="mt-2 mb-0">{{ $komen->isi }}</p>
                </div>
            @empty
                <p class="text-muted text-center">Belum ada komentar. Jadilah yang pertama!</p>
            @endforelse
        </div>
    </div>
</div>

<!-- JavaScript Efek -->
<script>
    // Efek Fade-out untuk alert sukses/error
    setTimeout(() => {
        const alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = 'opacity 0.8s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 800);
        }
    }, 3000);

    // Efek animasi untuk komentar baru
    document.addEventListener("DOMContentLoaded", function () {
        const comments = document.querySelectorAll(".comment-item");
        comments.forEach((comment, index) => {
            comment.style.opacity = "0";
            comment.style.transform = "translateY(20px)";
            setTimeout(() => {
                comment.style.transition = "all 0.6s ease";
                comment.style.opacity = "1";
                comment.style.transform = "translateY(0)";
            }, index * 200);
        });
    });

    // Scroll otomatis ke komentar setelah submit
    document.getElementById('comment-form').addEventListener('submit', function () {
        setTimeout(() => {
            document.getElementById('comment-list').scrollIntoView({ behavior: 'smooth' });
        }, 500);
    });
</script>
@endsection
