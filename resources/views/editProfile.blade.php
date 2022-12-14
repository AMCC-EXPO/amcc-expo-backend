@extends('layouts.app')

@section('title', 'Ubah Data Diri')

@section('content')
    <section id="title-header">
        <div class="text-center m-12">
            <h1 class="text-2xl md:text-[36px] font-medium">Ubah Data Diri</h1>
        </div>
    </section>

    <section id="input-data">
        <div class="flex flex-col-reverse md:space-y-0 md:flex-row md:px-10">
            <div class="flex flex-col mx-auto bg-white drop-shadow-md md:w-full p-20 rounded-xl">

                @if ($user->payment->status == "review")

                    <form enctype="multipart/form-data" method="POST" action="{{ route('update-profile') }}">
                        @csrf

                        <div class="grid grid-cols md:grid-cols-2 gap-4">
                            <div class="form-group mb-2">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                                    Lengkap</label>
                                <input type="text" id="nama" name="name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" placeholder="Masukkan nama" value="{{ $user->name }}" required />
                            </div>
                            <div class="form-group mb-2">
                                <label for="divisi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilihan
                                    Divisi</label>
                                <select id="divisi" name="division"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5"
                                    required>

                                    @if ($user->division_id == null)
                                        <option value="" disabled selected hidden>Pilih Divisi</option>
                                    @else
                                        <option selected hidden value=" {{ $user->division->id }}">
                                            {{ $user->division->name }}
                                        </option>
                                    @endif

                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nim"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NIM</label>
                                <input type="text" id="nim" name="nim"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" data-mask="00.00.0000" placeholder="xx.xx.xxxx"
                                    value="{{ $user->nim }}" required />
                            </div>
                            <div class="form-group mb-6">
                                <label for="kenal_amcc"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kenal AMCC dari
                                    mana?</label>
                                <select id="kenal_amcc" name="reference_source"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5"
                                    required>

                                    @if ($user->reference_source == null)
                                        <option value="" disabled selected hidden>Silahkan dipilih</option>
                                    @else
                                        <option selected hidden value="{{ $user->reference_source }}">
                                            {{ $user->reference_source }}
                                        </option>
                                    @endif

                                    <option value="Teman">Teman</option>
                                    <option value="ITC">ITC</option>
                                    <option value="PPM">PPM</option>
                                    <option value="Instagram AMCC">Instagram AMCC</option>
                                    <option value="Instagram Amikom">Instagram Amikom</option>
                                    <option value="Website AMCC">Website AMCC</option>
                                    <option value="Website Amikom">Website Amikom</option>
                                    <option value="Lainnya">Lainnya</option>

                                </select>
                            </div>
                            <div class="form-group mb-6">
                                <label for="no_wa"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No.
                                    Whatsapp</label>
                                <input type="number" id="no_wa" name="phone"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border -gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" placeholder="08XXXXXXXXXX" value="{{ $user->phone }}" required />
                            </div>
                            <div class="form-group mb-6">
                                <label for="studi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Program
                                    Studi</label>
                                <select id="studi" name="program_study"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5"
                                    required>

                                    @if ($user->program_study == null)
                                        <option value="" disabled selected hidden>Pilih Program Studi</option>
                                    @else
                                        <option selected hidden value="{{ $user->program_study }}">
                                            {{ $user->program_study }}
                                        </option>
                                    @endif

                                    <option value="Akuntansi">Akuntansi </option>
                                    <option value="Arsitektur">Arsitektur</option>
                                    <option value="BCIS">BCIS </option>
                                    <option value="BCIT">BCIT</option>
                                    <option value="BCI">BCI </option>
                                    <option value="D3-Manajemen Informatika">D3-Manajemen Informatika</option>
                                    <option value="D3-Teknik Informatika">D3-Teknik Informatika </option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Geografi">Geografi</option>
                                    <option value="Hubungan International">Hubungan International</option>
                                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                    <option value="Ilmu Komunikasi International">Ilmu Komunikasi Internasional</option>
                                    <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                                    <option value="Informatika">Informatika</option>
                                    <option value="Kewirausahaan">Kewirausahaan</option>
                                    <option value="Perancangan Wilayah dan Kota">Perancangan Wilayah dan Kota</option>
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
                                <input type="email" id="email" name="email"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    autocomplete="off" placeholder="mai@example.com" value="{{ $user->email }}"
                                    required />
                            </div>
                            <div class="mb-2">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alamat
                                    Domisili</label>
                                <textarea id="message" rows="4" name="address"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-color focus:border-primary-color"
                                    required placeholder="Masukkan alamat domisili">{{ $user->address }}</textarea>
                            </div>
                        </div>
                        <div class="flex justify-end mt-10">
                            <button type="submit"
                                class="text-white bg-primary-color hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 w-full md:w-[222px] font-medium rounded-lg text-sm md:text-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                        </div>
                    </form>
                @else
                    <h1 class="text-center text-xl md:text-[16px] font-medium">
                        Maaf, fitur ubah data diri sudah ditutup karena pembayaran kamu sudah diverifikasi. Jika ingin Pindah Divisi mohon menunggu informasi berikutnya, Terimakasih :)
                    </h1>
                @endif
            </div>
        </div>
    </section>
@endsection
