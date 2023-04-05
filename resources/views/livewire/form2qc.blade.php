

<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="formJenisTemuan" class="block text-gray-700 text-sm font-bold mb-2">Jenis Temuan:</label>
                            <select class="form-control" wire:model="jenis_temuan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="Teknis">Teknis</option>
                                <option value="Non Teknis">Non Teknis</option>
                            </select>
                            @error('jenis_temuan') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formSegmentasiTemuan" class="block text-gray-700 text-sm font-bold mb-2">Segmentasi Temuan:</label>
                            <select class="form-control" wire:model="segmentasi_temuan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="ASSURANCE">ASSURANCE</option>
                                <option value="PROVISIONING">PROVISIONING</option>
                                <option value="CONSTRUCTION">CONSTRUCTION</option>
                                <option value="FINANCE COMMERCE">FINANCE COMMERCE</option>
                                <option value="HUMAN CAPITAL">HUMAN CAPITAL</option>
                            </select>
                            @error('segmentasi_temuan') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formSegmentasiAlpro" class="block text-gray-700 text-sm font-bold mb-2">Segmentasi Alpro:</label>
                            <select class="form-control" wire:model="segmentasi_alpro" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="OLT">OLT</option>
                                <option value="FTM">FTM</option>
                                <option value="FEEDER">FEEDER</option>
                                <option value="DISTRIBUSI">DISTRIBUSI</option>
                                <option value="DROPCORE">DROPCORE</option>
                                <option value="IKG">IKG</option>
                                <option value="CPE">CPE</option>
                            </select>
                            @error('segmentasi_alpro') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formObservasiTemuan" class="block text-gray-700 text-sm font-bold mb-2">Observasi Temuan:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formObservasiTemuan" wire:model="observasi_temuan">
                            @error('observasi_temuan') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formCeritaTemuan" class="block text-gray-700 text-sm font-bold mb-2">Cerita Temuan:</label>
                            <textarea type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formCeritaTemuan" wire:model="cerita_temuan"></textarea>
                            @error('cerita_temuan') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formRekomendasiPerbaikan" class="block text-gray-700 text-sm font-bold mb-2">Rekomendasi Temuan:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formRekomendasiPerbaikan" wire:model="rekomendasi_perbaikan">
                            @error('rekomendasi_perbaikan') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{-- <div class="mb-4">
                            <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select class="form-control" wire:model="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Pilih</option>
                                <option value="1">Premium</option>
                                <option value="0">Free</option>
                            </select>
                            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div> --}}
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="Transision2()" type="button" class="btn btn-primary btn-lg">
                        Next
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                        <button wire:click="closeModal()" type="button" class="btn btn-secondary btn-lg">
                        Cancel
                        </button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>
