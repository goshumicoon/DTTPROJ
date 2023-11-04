<?php

namespace App\Observers;

use App\Models\User;


class UserObserver
{
    public function created(User $user)
    {
        // Tindakan yang ingin Anda lakukan setelah model User dibuat
    }

    // Anda bisa menambahkan metode lain sesuai kebutuhan
}

