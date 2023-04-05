

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Anggota
    </h2>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="alert alert-success alert-block" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="create()" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Anggota</button>

            @if($isModal)
                @include('livewire.ngehe')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Telp</th>
                        <th class="px-4 py-2 w-20">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->name }}</td>
                            <td class="border px-4 py-2">{{ $row->email }}</td>
                            <td class="border px-4 py-2">{{ $row->phone_number }}</td>
                            <td class="border px-4 py-2">{!! $row->status_label !!}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $row->id }})" class="btn btn-secondary">Edit</button>
                                <button wire:click="delete({{ $row->id }})" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


