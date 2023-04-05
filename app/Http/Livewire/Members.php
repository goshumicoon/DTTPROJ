<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class Members extends Component
{
	public $members, $name, $email, $phone_number, $status, $member_id;
	public $isModal;


    public function render()
    {
    	$this->members = Member::orderBy('created_at','DESC')->get();
        $role = Auth::user()->privilage;

        if($role == 1){
            return view('livewire.members');
        }else{
            echo '<script>alert("ANDA BUKAN ADMIN");</script>';
            return view('dashboard');
        }
    }

    public function create()
    {
    	$this->resetFields();
    	$this->openModal();
    }

    public function resetFields()
    {
    	$this->name = '';
		$this->email = '';
		$this->phone_number = '';
		$this->status = '';
		$this->member_id = '';
    }

    public function openModal()
    {
    	$this->isModal = true;
    }

    public function closeModal()
    {
    	$this->isModal = false;
    }

    public function store()
    {
    	$this->validate([
    		'name' => 'required|string',
    		'email' => 'required|email|unique:members,email,' . $this->member_id,
    		'phone_number' => 'required|numeric',
    		'status' => 'required'
    	]);

    	Member::updateOrCreate(
    	['id' => $this->member_id],
    	[
    		'name' => $this->name,
    		'email' => $this->email,
    		'phone_number' => $this->phone_number,
    		'status' => $this->status
    	]
    	);

    	session()->flash('message', $this->member_id ? $this->name . 'Diperbarui':$this->name . 'Ditambahkan');
    	$this->closeModal();
    	$this->resetFields();
    }

    public function edit($id){
        $member = Member::find($id);
        $this->member_id = $id;
        $this->name = $member->name;
        $this->email = $member->email;
        $this->phone_number = $member->phone_number;
        $this->status = $member->status;

        $this->openModal();
    }

    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        session()->flash("message ",$member->name." dihapus");
    }
}
