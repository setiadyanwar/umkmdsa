 <footer class="bg-[#113EA1] text-white py-12 px-4 md:px-16">
            <div class="flex flex-col md:flex-row justify-between md:space-y-0 lg:space-x-8 lg:mt-0 pb-20 gap-4">


                <div class="md:w-1/4">
                    <img src="{{ asset('images/dpma-logo.png') }}" alt="IPB Logo" class="w-40 mb-4">
                </div>


                <div>
                    <h3 class="font-semibold mb-2">Halaman</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="{{ route('homepage') }}" class="hover:underline">Beranda</a></li>
                        <li><a href="{{ route('etalase') }}" class="hover:underline">Etalase</a></li>
                        <li><a href="{{ route('umkmbinaan') }}" class="hover:underline">Umkm Binaan</a></li>
                    </ul>
                </div>


                <div>
                    <h3 class="font-semibold mb-2">Bantuan</h3>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#" class="hover:underline">FAQ</a></li>
                        <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                        <li><a href="#" class="hover:underline">Terms and Condition</a></li>
                    </ul>
                </div>


                <div>
                    <h3 class="font-semibold mb-2">Contact</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M3 6.75v10.5A2.25 2.25 0 0 0 5.25 19.5h13.5A2.25 2.25 0 0 0 21 17.25V6.75A2.25 2.25 0 0 0 18.75 4.5H5.25A2.25 2.25 0 0 0 3 6.75ZM5.25 6h13.5a.75.75 0 0 1 .75.75v.443l-7.5 4.482-7.5-4.482V6.75a.75.75 0 0 1 .75-.75ZM4.5 8.625l6.986 4.177a.75.75 0 0 0 .777 0L19.5 8.625v8.625a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V8.625Z" />
                            </svg>
                            umkmdesa@apps.ipb.ac.id
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1-.24 11.36 11.36 0 0 0 3.57.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.57 1 1 0 0 1-.24 1Z" />
                            </svg>
                            (406) 555-0120
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Jl. Carang Pulang No.1, Cikarawang, Kec. Dramaga,
                            Kabupaten Bogor, Jawa Barat 16680
                        </li>
                    </ul>
                </div>


                <div>
                    <h3 class="font-semibold mb-2">Sosial media</h3>
                    <div class="flex gap-3 text-white text-lg">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Garis dan Copyright -->
            <div class="border-t border-white mt-8 pt-4 text-center text-sm">
                © 2025 UmkmDSA | Powered by UmkmDSA
            </div>
</footer>
