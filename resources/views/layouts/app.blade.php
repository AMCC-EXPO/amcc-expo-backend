<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.head')

</head>

<body class="font-inter">
    @include('layouts.partials.header')

    <main class="relative">
        <section id="title-header">
            <div class="text-center m-12">
                <h1 class="text-2xl md:text-[36px] font-medium">Selesaikan Pendaftaran</h1>
                <p class="mt-4 text-base mx-auto max-w-sm md:text-center">Jadi bagian dari AMCC sekarang</p>
            </div>
        </section>
        <section id="timeline-step">
            <div class="flex flex-col justify-center mx-auto mb-20">
                <div class="flex items-center justify-center">
                    <div class="w-8/12 bg-primary-color h-2 dark:bg-gray-700"></div>
                    <div class="flex items-center">
                        <div
                            class="flex z-10 justify-center items-center rounded-full ring-0 dark:bg-blue-900 dark:ring-gray-900 shrink-0">
                            <div class="relative">
                                <a href="profil.html">
                                    <img class="md:w-[60px] w-[45px]" src="./img/data-diri.svg" alt="" />
                                    <h3
                                        class="absolute md:-bottom-10 md:w-60 text-center md:-left-[90px] -left-1 font-semibold md:text-xl text-sm">
                                        Data Diri</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-300 h-2 dark:bg-gray-700"></div>
                    <div class="flex items-center">
                        <div
                            class="flex z-10 justify-center items-center rounded-full ring-0 dark:bg-blue-900 dark:ring-gray-900 shrink-0">
                            <div class="relative">
                                <a href="#">
                                    <img class="md:w-[60px] w-[45px]" src="./img/payment-method-disabled.svg"
                                        alt="" />
                                    <h3
                                        class="absolute md:-bottom-10 md:w-60 text-center md:-left-[85px] -left-[17px] font-semibold md:text-xl text-sm">
                                        Metode Pembayaran</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-300 h-2 dark:bg-gray-700"></div>
                    <div class="flex items-center">
                        <div
                            class="flex z-10 justify-center items-center rounded-full ring-0 dark:bg-blue-900 dark:ring-gray-900 shrink-0">
                            <div class="relative">
                                <a href="#">
                                    <img class="md:w-[60px] w-[45px]" src="./img/payment-confirm-disabled.svg"
                                        alt="" />
                                    <h3
                                        class="absolute md:-bottom-10 md:w-60 text-center md:-left-[85px] -left-[17px] font-semibold md:text-xl text-sm">
                                        Konfirmasi Pembayaran</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-300 h-2 dark:bg-gray-700"></div>
                </div>
            </div>
        </section>
        <section id="input-data">
            <div class="flex flex-col-reverse md:space-y-0 md:flex-row md:px-10">
                <div class="flex flex-col mx-auto bg-white drop-shadow-md md:w-full p-20 rounded-xl">
                    <div class="alert flex items-center justify-between p-4 mb-4 text-sm text-yellow-600 bg-yellow-100 rounded-lg"
                        role="alert">
                        <span class="font medium">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            info alert : Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, dolorum
                            deserunt earum rerum placeat nostrum.</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="close flex-shrink-0 inline w-3 h-3 mr-3 cursor-pointer" viewBox="0 0 384 512">
                            <path
                                d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                        </svg>
                    </div>
                    <form>
                        <div class="grid grid-cols md:grid-cols-2 gap-4">
                            <div class="form-group mb-2">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" id="nama"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color border-red-500 focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" placeholder="Masukkan nama" required />
                                <p class="text-red-500">Error cok!</p>
                            </div>
                            <div class="form-group mb-2">
                                <label for="divisi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilihan
                                    Divisi</label>
                                <select id="divisi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5">
                                    <option selected disabled>Pilih Divisi</option>
                                    <option>Web Programming (Backend)</option>
                                    <option>Web Programming (Frontend)</option>
                                    <option>Mobile Programming</option>
                                    <option>Desktop Programming</option>
                                    <option>Computer Network</option>
                                    <option>Hardware Software</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nim"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIM</label>
                                <input type="text" id="nim"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" data-mask="00.00.0000" placeholder="xx.xx.xxxx" required />
                            </div>
                            <div class="form-group mb-6">
                                <label for="kenal_amcc"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kenal AMCC
                                    dari mana?</label>
                                <select id="kenal_amcc"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5">
                                    <option selected disabled>Silahkan dipilih</option>
                                    <option>ITC</option>
                                    <option>Instagram</option>
                                    <option>PPM</option>
                                    <option>Teman</option>
                                    <option>Website</option>
                                </select>
                            </div>
                            <div class="form-group mb-6">
                                <label for="no_wa"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No.
                                    Whatsapp</label>
                                <input type="number" id="no_wa"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border -gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" placeholder="08XXXXXXXXXX" required />
                            </div>
                            <div class="form-group mb-6">
                                <label for="studi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Program
                                    studi</label>
                                <select id="studi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5">
                                    <option selected disabled>Pilih Program Studi</option>
                                    <option value="Akuntansi">Akuntansi </option>
                                    <option value="Arsitektur">Arsitektur</option>
                                    <option value="BCIS">BCIS </option>
                                    <option value="BCIT">BCIT</option>
                                    <option value="BCI">BCI </option>
                                    <option value="D3-Manajemen Informatika">D3-Manajemen Informatika</option>
                                    <option value="D3-Teknik Informatika">D3-Teknik Informatika </option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Geografi">D3 Teknik Informatika</option>
                                    <option value="Hubungan International">Hubungan International</option>
                                    <option value="Ilmu Komunikasi International">Ilmu Komunikasi</option>
                                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                    <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                                    <option value="Informatika">Informatika</option>
                                    <option value="Kewirausahaan">Kewirausahaan</option>
                                    <option value="Perancangan WIlayah dan Kota">Perancangan WIlayah dan Kota</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Teknik Komputer">Teknik Komputer</option>
                                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-reverse md:grid-cols-2 gap-4">
                            <div class="form-group mb-2">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-Mail</label>
                                <input type="email" id="email"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" placeholder="mai@example.com" required />
                            </div>
                            <div class="mb-2">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alamat
                                    Domisili</label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-color focus:border-primary-color"
                                    placeholder="Masukkan alamat domisili"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end mt-10">
                            <button type="submit"
                                class="text-white bg-primary-color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 w-full md:w-[222px] font-medium rounded-lg text-sm md:text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Selanjutnya</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section id="cs-wa" class="absolute">
            <a href="#">
                <div class="fixed p-3 bg-[#25d366] md:p-3 rounded-full right-5 drop-shadow-md md:right-5 bottom-5">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        class="w-[30px] md:w-[40px]" viewBox="0 0 24 24" style="fill: #fff">
                        <path
                            d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z">
                        </path>
                    </svg>
                </div>
            </a>
        </section>

        @include('layouts.partials.floating-wa')

    </main>

    @include('layouts.partials.footer-script')

</body>

</html>
