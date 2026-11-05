<!--================ Start Footer Area =================-->
<footer class="bg-ns-navy-950 text-ns-light-300 border-t-4 border-ns-gold-500 font-sans">
    <div class="py-14 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-8 items-start">
                <!-- Brand Info -->
                <div class="lg:col-span-4">
                    <div class="flex items-center gap-3.5 mb-4">
                        <img src="{{ asset('interface/img/LOGO_NS_2.png') }}"
                            alt="Lambang Kantor Hukum Nurul Safii & Partners" width="56" height="56"
                            class="w-14 h-14 object-contain rounded-md bg-ns-navy-900 p-1 border border-ns-gold-500/40">
                        <div>
                            <h2 class="font-display text-base font-bold text-ns-gold-400 mb-0.5 leading-snug">Kantor
                                Hukum Nurul Safii,
                                S.H., M.H., C.MSP &amp; Partners</h2>
                            <span class="block text-[11px] uppercase tracking-wider text-ns-light-300">Advokat &middot;
                                Mediator &middot; Konsultan</span>
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm text-ns-light-300/90 leading-relaxed">
                        Kantor hukum independen yang hadir sebagai representasi integritas, kecermatan, dan keberanian
                        dalam menegakkan keadilan serta mendampingi klien memperjuangkan hak secara bermartabat.
                    </p>
                </div>

                <!-- Navigation Links -->
                <div class="lg:col-span-2">
                    <h2
                        class="font-display text-sm sm:text-base font-bold text-ns-gold-400 mb-3 pb-1 border-b border-white/10">
                        Navigasi</h2>
                    <ul class="space-y-1.5 text-xs sm:text-sm list-none p-0 m-0">
                        <li><a href="{{ route('welcome') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Beranda</a></li>
                        <li><a href="{{ route('about') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Tentang Kami</a>
                        </li>
                        <li><a href="{{ route('service') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Layanan Hukum</a>
                        </li>
                        <li><a href="{{ route('partner') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Partnership</a>
                        </li>
                        <li><a href="{{ route('picture') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Galeri</a></li>
                        <li><a href="{{ route('article') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Artikel Hukum</a>
                        </li>
                        <li><a href="{{ route('file') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Jurnal Hukum</a>
                        </li>
                        <li><a href="{{ route('break-news') }}"
                                class="hover:text-ns-gold-400 transition-colors inline-block py-0.5">Berita</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="lg:col-span-3">
                    <h2
                        class="font-display text-sm sm:text-base font-bold text-ns-gold-400 mb-3 pb-1 border-b border-white/10">
                        Kontak Kantor</h2>
                    <ul class="space-y-3 text-xs sm:text-sm list-none p-0 m-0">
                        <li class="flex items-start gap-2.5">
                            <i class="lnr lnr-map-marker text-ns-gold-400 text-base mt-0.5 flex-shrink-0"
                                aria-hidden="true"></i>
                            <span class="text-ns-light-300/90 leading-relaxed text-xs">Dusun Muncar Baru, RT.01/RW.05,
                                Tembokrejo, Kec. Muncar, Banyuwangi, Jatim 68472</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="lnr lnr-phone-handset text-ns-gold-400 text-sm flex-shrink-0"
                                aria-hidden="true"></i>
                            <a href="https://wa.link/psypax" target="_blank" rel="noopener noreferrer"
                                class="hover:text-ns-gold-400 transition-colors text-ns-light-100 text-xs sm:text-sm">
                                +62 853-3197-9610
                            </a>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="lnr lnr-envelope text-ns-gold-400 text-sm flex-shrink-0" aria-hidden="true"></i>
                            <a href="mailto:snurulsafiilawoffice@gmail.com"
                                class="hover:text-ns-gold-400 transition-colors text-ns-light-100 break-all text-xs">
                                snurulsafiilawoffice@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Google Maps (Side-by-Side in Footer) -->
                <div class="lg:col-span-3">
                    <div class="flex items-center justify-between mb-2 pb-1 border-b border-white/10">
                        <h2
                            class="font-display text-sm sm:text-base font-bold text-ns-gold-400 m-0 flex items-center gap-2">
                            <i class="fas fa-map-marked-alt text-xs" aria-hidden="true"></i>
                            <span>Peta Lokasi</span>
                        </h2>
                        <a href="https://maps.google.com/?q=-8.4335819,114.331305" target="_blank"
                            rel="noopener noreferrer"
                            class="text-[11px] font-semibold text-ns-gold-400 hover:text-white transition inline-flex items-center gap-1">
                            <span>Buka Maps</span>
                            <i class="fas fa-external-link-alt text-[9px]" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div
                        class="rounded-lg overflow-hidden border border-ns-gold-500/40 shadow bg-ns-navy-900 aspect-[4/3] sm:aspect-[16/10] lg:aspect-auto lg:h-[190px] w-full">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3946.6745860375327!2d114.331305!3d-8.4335819!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd3fda7e9c9fed5%3A0xdb0214b9aa109fa5!2spengacara%20%2F%20Advokat%20Nurul%20Safi&#39;i%2C%20S.H!5e0!3m2!1sid!2sid!4v1752230759071!5m2!1sid!2sid"
                            class="w-full h-full border-0 block" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Lokasi Kantor Hukum Nurul Safii Banyuwangi"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Copyright Bar -->
    <div class="bg-[#050A14] border-t border-white/10 py-5">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-ns-light-300 text-center sm:text-left m-0">
                &copy; {{ date('Y') }} Kantor Hukum Nurul Safii, S.H., M.H., C.MSP &amp; Partners. Desain oleh PPLG
                SMEMSA.
            </p>
            <div class="flex items-center gap-2.5">
                <a href="https://wa.link/psypax" target="_blank" rel="noopener noreferrer"
                    aria-label="Hubungi via WhatsApp"
                    class="w-10 h-10 rounded bg-ns-navy-800 border border-ns-gold-500/30 text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm">
                    <i class="lnr lnr-phone-handset" aria-hidden="true"></i>
                </a>
                <a href="mailto:snurulsafiilawoffice@gmail.com" aria-label="Kirim Email ke Kantor Hukum Nurul Safii"
                    class="w-10 h-10 rounded bg-ns-navy-800 border border-ns-gold-500/30 text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm">
                    <i class="lnr lnr-envelope" aria-hidden="true"></i>
                </a>
                <a href="https://www.tiktok.com/@pengacara_nurul_safii" target="_blank" rel="noopener noreferrer"
                    aria-label="Kunjungi TikTok Pengacara Nurul Safii"
                    class="w-10 h-10 rounded bg-ns-navy-800 border border-ns-gold-500/30 text-ns-light-100 hover:bg-ns-gold-400 hover:text-ns-navy-900 transition flex items-center justify-center text-sm">
                    <i class="fab fa-tiktok" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<!--================ End Footer Area =================-->
