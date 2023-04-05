<x-Admins-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ADMIN PAGE
    </h2>
</x-slot>

<h1>THIS IS ADMIN PAGE</h1>
<h2>id session : <?php $session_id = Session::getId(); echo $session_id; ?></h2>

</x-Admins-layout>
