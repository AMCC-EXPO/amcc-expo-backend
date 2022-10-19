@extends('admin.layouts.app')

@section('title', 'Member')

@section('content')
    <div class="container grid px-6 pb-16 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Member
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table id="usersTable" class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            {{-- <th class="px-4 py-3">Tanggal Daftar</th> --}}
                            <th class="px-4 py-3">NO.REG</th>
                            <th class="px-4 py-3">NIM</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Email</th>
                            {{-- <th class="px-4 py-3">Metode Pembayaran</th> --}}
                            {{-- <th class="px-4 py-3">Status</th> --}}
                            {{-- <th class="px-4 py-3">Actions</th> --}}
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function () {
   $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url()->current() }}',
        columns: [
            { data: 'registration_number', name: 'registration_number' },
            { data: 'nim', name: 'nim' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            // { data: 'payment', name: 'payment.name' },
        ]
    });
 });
</script>
@endpush
