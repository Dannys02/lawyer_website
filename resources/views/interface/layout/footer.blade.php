<!--================ Start Footer Area =================-->
<footer class="bg-ns-navy-950 text-ns-light-300 border-t-4 border-ns-gold-500 font-sans">
    <div class="py-14 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">
                <!-- Brand Info -->
                <div class="lg:col-span-5">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Lambang Kantor Hukum Nurul Safii & Partners"
                            width="64" height="64" class="w-16 h-16 object-contain rounded-md bg-ns-navy-900 p-1 border border-ns-gold-500/40">
                        <div>
                            <h2 class="font-display text-lg font-bold text-ns-gold-400 mb-0.5">Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp; Partners</h2>
                            <span class="block text-xs uppercase tracking-wider text-ns-light-300">Advokat &middot; Mediator &middot; Konsultan Hukum</span>
                        </div>
                    </div>
                    <p class="text-sm text-ns-light-300/90 leading-relaxed max-w-md">
                        Kantor hukum independen yang hadir sebagai representasi integritas, kecermatan, dan keberanian dalam menegakkan keadilan. Kami mendampingi klien dalam memitigasi risiko hukum, merumuskan langkah taktis, dan memperjuangkan hak secara bermartabat.
                    </p>
                </div>

                <!-- Navigation Links -->
                <div class="lg:col-span-3">
                    <h2 class="font-display text-base font-bold text-ns-gold-400 mb-4 pb-1 border-b border-white/10">Navigasi Halaman</h2>
                    <ul class="grid grid-cols-2 gap-y-2 gap-x-4 text-sm list-none p-0 m-0">
                        <li><a href="{{ route('welcome') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Tentang Kami</a></li>
                        <li><a href="{{ route('service') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Layanan Hukum</a></li>
                        <li><a href="{{ route('partner') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Partnership</a></li>
                        <li><a href="{{ route('picture') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Galeri</a></li>
                        <li><a href="{{ route('article') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Legal Opini</a></li>
                        <li><a href="{{ route('file') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Jurnal Hukum</a></li>
                        <li><a href="{{ route('break-news') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1">Berita</a></li>
                        <li class="col-span-2"><a href="{{ route('contact') }}" class="hover:text-ns-gold-400 transition-colors inline-block py-1 text-ns-gold-400 font-semibold">Konsultasi &amp; Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="md:col-span-2 lg:col-span-4">
                    <h2 class="font-display text-base font-bold text-ns-gold-400 mb-4 pb-1 border-b border-white/10">Kantor &amp; Kontak Resmi</h2>
                    <ul class="space-y-3.5 text-sm list-none p-0 m-0">
                        <li class="flex items-start gap-3">
                            <i class="lnr lnr-map-marker text-ns-gold-400 text-base mt-1 flex-shrink-0" aria-hidden="true"></i>
                            <span class="text-ns-light-300/90 leading-relaxed">Dusun Muncar Baru, RT.01/RW.05, Tembokrejo, Kec. Muncar, Kab. Banyuwangi, Jawa Timur 68472</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="lnr lnr-phone-handset text-ns-gold-400 text-base flex-shrink-0" aria-hidden="true"></i>
                            <a href="https://wa.link/psypax" target="_blank" rel="noopener noreferrer" class="hover:text-ns-gold-400 transition-colors text-ns-light-100">
                                +62 853-3197-9610 (WhatsApp Resmi)
                            </a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="lnr lnr-envelope text-ns-gold-400 text-base flex-shrink-0" aria-hidden="true"></i>
                            <a href="mailto:snurulsafiilawoffice@gmail.com" class="hover:text-ns-gold-400 transition-colors text-ns-light-100 break-all">
                                snurulsafiilawoffice@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="bg-[#050A14] border-t border-white/10 py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-ns-light-300 text-center sm:text-left m-0">
                &copy; {{ date('Y') }} Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp; Partners. Desain oleh PPLG SMEMSA.
            </p>
            <div class="flex items-center gap-2.5">
                <a href="https://wa.link/psypax" target="_blank" rel="noopener noreferrer" aria-label="Hubungi via WhatsApp"
                    class="w-10 h-10 rounded bg-ns-navy-800 border border-ns-gold-500/30 text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm">
                    <i class="lnr lnr-phone-handset" aria-hidden="true"></i>
                </a>
                <a href="mailto:snurulsafiilawoffice@gmail.com" aria-label="Kirim Email ke Kantor Hukum Nurul Safii"
                    class="w-10 h-10 rounded bg-ns-navy-800 border border-ns-gold-500/30 text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm">
                    <i class="lnr lnr-envelope" aria-hidden="true"></i>
                </a>
                <a href="https://www.tiktok.com/@pengacara_nurul_safii" target="_blank" rel="noopener noreferrer" aria-label="Kunjungi TikTok Pengacara Nurul Safii"
                    class="w-10 h-10 rounded bg-ns-navy-800 border border-ns-gold-500/30 text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm">
                    <i class="fab fa-tiktok" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<!--================ End Footer Area =================-->
