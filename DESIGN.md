# DESIGN.md: Pengacara Banyuwangi Safi

## Identity & Character

- **Product / Brand**: Pengacara Banyuwangi Safi (Advokat, Mediator, Konsultan Hukum)
- **Audience**: Klien perorangan, keluarga, UMKM, korporasi nasional, serta instansi pemerintahan/BUMDes yang membutuhkan pendampingan hukum tegas, terpercaya, dan bermartabat.
- **Personality**: Otoritatif, berintegritas, tajam secara analitis, elegan, dan profesional ("lawyer sejati").

## Visual Language & Mood

- **Style**: Editorial Hukum Klasik-Modern (Authoritative Legal Editorial)
- **Dial**: `ENERGY 2 / RHYTHM 3 / MOTION 1`
    - **ENERGY 2 (Balanced)**: Tegas dan berwibawa sejak pandangan pertama melalui kontras Navy-Gold yang tajam dan tipografi serif hukum klasik tanpa efek berlebihan.
    - **RHYTHM 3 (Varied/Asymmetric)**: Komposisi antar-seksi bervariasi secara struktural (Hero asimetris dengan panel kredensial, profil split-editorial dengan kutipan visi, matriks layanan 12-kolom dengan kartu unggulan + grid terstruktur, seksi gelap Navy dibagi menjadi pilar keunggulan & matriks segmentasi klien, direktori partner & berita, serta panel ulasan interaktif).
    - **MOTION 1 (Calm/Intentional)**: Transisi terukur pada kondisi `:hover`, `:focus-visible`, dan kontrol interaktif manual/terkendali untuk ulasan klien (dengan dukungan jeda serta `prefers-reduced-motion`).

## Color Palette (R-29: 2 Core Colors + 1 Accent + Neutrals)

1. **Core 1: Deep Navy (`#0B162C` & `#132242`)**: Melambangkan otoritas hukum, ketegasan, dan kepercayaan institusional. Digunakan pada Hero Banner, Navigation Bar, Why Choose Us, CTA Ulasan, dan Footer.
2. **Core 2: Warm Ivory & Alabaster (`#F8F7F4` & `#FFFFFF`)**: Memberikan ruang baca bersih seperti lembaran dokumen resmi/editorial hukum dan menciptakan kontras tinggi dengan kartu maupun teks.
3. **Accent: Imperial Legal Gold (`#D4AF37` pada latar gelap / `#785706` pada latar terang)**: Melambangkan kehormatan profesi advokat (`officium nobile`). Digunakan secara terukur pada garis aksen struktural, nomor indeks layanan, lencana kredensial, dan tombol utama.
4. **Text & Neutrals**:
    - Teks utama di atas terang: `#0B162C` (Rasio kontras 18.02:1 pada `#FFFFFF`)
    - Teks sekunder di atas terang: `#334155` (Rasio kontras 9.56:1 pada `#F4F6F9`)
    - Teks utama di atas Navy: `#F8FAFC` (Rasio kontras 17.22:1 pada `#0B162C`)
    - Teks sekunder di atas Navy: `#CBD5E1` (Rasio kontras 12.14:1 pada `#0B162C`)

## Typography (R-06)

- **Display & Headings**: `'Cormorant Garamond'` / `'Playfair Display'`, serif. Dipilih karena proporsi serif klasiknya mencerminkan yurisprudensi, ketegasan advokat, dan wibawa ruang sidang.
- **Body & UI Controls**: `'Plus Jakarta Sans'`, sans-serif. Dipilih untuk keterbacaan tinggi pada daftar layanan hukum, rincian perkara, dan navigasi modern di semua ukuran layar.

## Key Design Decisions (R-31 One-Line Reasons)

- **Why this color**: Palet Deep Navy (`#0B162C`) dan Gold (`#D4AF37`) memancarkan otoritas institusi hukum sekaligus menjaga kontras baca di atas standar WCAG AA (>8.5:1 hingga 18:1).
- **Why this layout**: Struktur grid asimetris (RHYTHM 3) memisahkan hierarki informasi antara profil kantor, 7 bidang praktik hukum, alasan memilih, dan bukti nyata tanpa pola template yang monoton.
- **Why this typography**: Serif klasik (`Cormorant Garamond` & `Playfair Display`) memberi karakter pengacara sejati pada tajuk, dipadukan dengan `Plus Jakarta Sans` agar detail layanan hukum mudah dipindai.
- **Why this spacing**: Skala ruang kosong terukur (`clamp(3.5rem, 6vw, 6.5rem)`) memberi jeda bernapas antar-bab layaknya dokumen legal formal dan beradaptasi rapi di layar ponsel.
- **Why use cards**: Kartu dengan kontras batas tegas dan penomoran indeks (`01`–`07`) mengelompokkan 7 spektrum layanan hukum yang berbeda agar klien cepat menemukan kategori perkaranya.
- **Why use icons**: Ikon hanya digunakan sebagai penanda fungsional (poin keunggulan, kontak, dan navigasi) dengan atribut aksesibilitas lengkap (`aria-hidden="true"`).
