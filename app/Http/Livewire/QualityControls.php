<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\quality_control;
use Livewire\WithFileUploads;


class QualityControls extends Component
{
    use WithFileUploads;
    public $QualityControls, $qc_id, $unit_qc, $witel, $nik_naker, $wo_project, $jenis_temuan, $segmentasi_temuan, $segmentasi_alpro, $observasi_temuan, $cerita_temuan, $rekomendasi_perbaikan, $created_at;
    public $isModal, $isModal2, $isModal3;
    public $eviden_temuan_negative;
    public $name_file;

    public function render()
    {
        $this->QualityControls = quality_control::orderBy('created_at','DESC')->get();
        return view('livewire.quality-controls');
    }
    public function create()
    {
    	$this->resetFields();
    	$this->openModal();
    }

    public function Transision1()
    {
    	$this->isModal = false;
        $this->openModal2();
    }
    public function Transision2()
    {
    	$this->isModal2 = false;
        $this->openModal3();
    }

    public function resetFields()
    {
    	$this->nik_naker = '';
		$this->wo_project = '';
		$this->jenis_temuan = '';
		$this->segmentasi_temuan = '';
        $this->observasi_temuan = '';
        $this->segmentasi_alpro = '';
        $this->cerita_temuan = '';
        $this->rekomendasi_perbaikan = '';
		$this->qc_id = '';
        $this->eviden_temuan_negative = '' ;
    }

    public function openModal()
    {
    	$this->isModal = true;
    }

    public function openModal2()
    {
    	$this->isModal2 = true;
    }

    public function openModal3()
    {
    	$this->isModal3 = true;
    }

    public function closeModal()
    {
    	$this->isModal = false;
        $this->isModal2 = false;
        $this->isModal3 = false;
    }

    public function store2()
    {
    	$this->validate([
    		'unit_qc' => 'required|string',
    		'witel' => 'required|string',
    		'nik_naker' => 'required|string',
            'wo_project' => 'required|string',
            'jenis_temuan' => 'required|string',
            'segmentasi_temuan' => 'required|string',
            'segmentasi_alpro' => 'required|string',
            'observasi_temuan' => 'required|string',
            'cerita_temuan' => 'required|string',
            'rekomendasi_perbaikan' => 'required|string',
            'eviden_temuan_negative' => 'image|max:2048' // 2MB Max
    	]);

        $this->name_file =  $this->eviden_temuan_negative->store('eviden_temuan_negative','public');


        // $buktiTemuanNegative = $this->nik_naker . '-' . $this->wo_project . '-' . substr(uniqid(rand(), true), 8, 8) . '.jpg';
        // $img = ImageManager::make($image->getRealPath())->encode('jpg', 65)->fit(760, null, function ($c) {
        //     $c->aspectRatio();
        //     $c->upsize();
        // });
        // $img->stream(); // <-- Key point
        // Storage::disk('local')->put('public/images/buktiTemuanNegative' . '/' . $buktiTemuanNegative, $img, 'public');

    	quality_control::updateOrCreate(
    	['id' => null],
    	[
    		'unit_qc' => $this->unit_qc,
    		'witel' => $this->witel,
    		'nik_naker' => $this->nik_naker,
            'wo_project' => $this->wo_project,
            'jenis_temuan' => $this->jenis_temuan,
            'segmentasi_temuan' => $this->segmentasi_temuan,
            'segmentasi_alpro' => $this->segmentasi_alpro,
            'observasi_temuan' => $this->observasi_temuan,
            'cerita_temuan' => $this->cerita_temuan,
            'rekomendasi_perbaikan' => $this->rekomendasi_perbaikan,
            'eviden_temuan_negative' => $this->name_file
    	]
    	);

    	session()->flash('message', $this->qc_id ? $this->nik_naker . 'Diperbarui':$this->wo_project . 'Ditambahkan'. $this->name_file);
    	$this->closeModal();
    	$this->resetFields();
    }

    // public function edit($id){
    //     $member = Member::find($id);
    //     $this->member_id = $id;
    //     $this->name = $member->name;
    //     $this->email = $member->email;
    //     $this->phone_number = $member->phone_number;
    //     $this->status = $member->status;

    //     $this->openModal();
    // }

    // public function delete($id)
    // {
    //     $member = Member::find($id);
    //     $member->delete();
    //     session()->flash("message ",$member->name." dihapus");
    // }
}
