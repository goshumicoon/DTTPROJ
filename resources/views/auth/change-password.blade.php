<!-- Modal for Change Password -->
<div id="changePasswordModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Add your change password form here -->
            <form class="w-full p-8">
                <!-- Old Password Field -->
                <div class="mb-4">
                    <label for="old_password" class="block text-gray-700 text-sm font-bold mb-2">Password Lama</label>
                    <input type="password" class="form-input rounded-md shadow-sm mt-1 block w-full" id="old_password" name="old_password">
                </div>
                <!-- New Password Field -->
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">Password Baru</label>
                    <input type="password" class="form-input rounded-md shadow-sm mt-1 block w-full" id="new_password" name="new_password">
                </div>
                <!-- Confirm New Password Field -->
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password Baru</label>
                    <input type="password" class="form-input rounded-md shadow-sm mt-1 block w-full" id="confirm_password" name="confirm_password">
                </div>
                <!-- Buttons -->
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="closeChangePasswordModal()">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
