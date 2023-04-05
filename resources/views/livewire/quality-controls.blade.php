<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Quality Control
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

            <button wire:click="create()" class="btn btn-primary" style="margin-bottom: 5px;">Input Quality Check</button>

            @if($isModal)
                @include('livewire.form1qc')
            @endif
            @if($isModal2)
                    @include('livewire.form2qc')
            @endif
            @if($isModal3)
                    @include('livewire.form3qc')
            @endif
            <table class="table-responsive">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nik Naker</th>
                        <th class="px-4 py-2">Unit QC</th>
                        <th class="px-4 py-2">WO Project</th>
                        <th class="px-4 py-2">Jenis Temuan</th>
                        <th class="px-4 py-2">Segmentasi Temuan</th>
                        <th class="px-4 py-2">Observasi Temuan</th>
                        <th class="px-4 py-2">Cerita Temuan</th>
                        <th class="px-4 py-2">Rekomendasi Perbaikan</th>
                        <th class="px-4 py-2">Eviden Temuan Negatif</th>
                        <th class="px-4 py-2">Tanggal Input</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($QualityControls as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->nik_naker }}</td>
                            <td class="border px-4 py-2">{{ $row->unit_qc }}</td>
                            <td class="border px-4 py-2">{{ $row->wo_project }}</td>
                            <td class="border px-4 py-2">{{ $row->jenis_temuan }}</td>
                            <td class="border px-4 py-2">{{ $row->segmentasi_temuan }}</td>
                            <td class="border px-4 py-2">{{ $row->observasi_temuan }}</td>
                            <td class="border px-4 py-2">{{ $row->cerita_temuan }}</td>
                            <td class="border px-4 py-2">{{ $row->rekomendasi_perbaikan }}</td>
                            <td class="border px-4 py-2"><a href="http://crud8.test/{{ $row->eviden_temuan_negative }}">DOWNLOAD</a></td>
                            <td class="border px-4 py-2">{{ $row->created_at }}</td>
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

