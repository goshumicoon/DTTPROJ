<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Projectle;
use Illuminate\Support\Facades\Auth;

class Projectles extends Component

{

    public $projectles, $NAMA_PROJECT, $DISTRIBUSI, $ODP_LABEL, $ODP_INDEX, $KAP_ODP, $STATUS_PROJECT, $KETERANGAN, $projectle_id;
    public $isModal;

    public function render()
    {
        $this->projectles = Projectle::all();
        return view('livewire.projectles');
    }

    public function create()
    {
    	$this->resetFields();
    	$this->openModal();
    }

    public function resetFields()
    {
    	$this->NAMA_PROJECT = '';
		$this->DISTRIBUSI = '';
		$this->ODP_LABEL = '';
		$this->ODP_INDEX = '';
		$this->KAP_ODP = '';
        $this->STATUS_PROJECT = '';
        $this->KETERANGAN = '';
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
    		'NAMA_PROJECT' => 'required|string',
    		'DISTRIBUSI' => 'required|string,',
    		'ODP_LABEL' => 'required|string',
    		'STATUS_PROJECT' => 'required|string',
            'KETERANGAN' => 'required|string'
    	]);

    	Projectle::updateOrCreate(
    	['id' => $this->projectle_id],
    	[
    		'NAMA_PROJECT' => $this->NAMA_PROJECT,
    		'DISTRIBUSI' => $this->DISTRIBUSI,
    		'ODP_LABEL' => $this->ODP_LABEL,
    		'STATUS_PROJECT' => $this->STATUS_PROJECT,
            'KETERANGAN' => $this->KETERANGAN
    	]
    	);

    	session()->flash('message', $this->projectle_id ? $this->NAMA_PROJECT . 'Diperbarui':$this->NAMA_PROJECT . 'Ditambahkan');
    	$this->closeModal();
    	$this->resetFields();
    }
}
