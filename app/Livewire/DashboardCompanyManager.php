<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;
use App\Models\Mentor;

class DashboardCompanyManager extends Component
{
    use WithPagination;

    public $nama, $bidang_usaha, $alamat, $kontak, $email, $mentor_id;
    public $isOpen = false;
    public $companyId;

    // Validation rules
    protected $rules = [
        'nama' => 'required|string|max:255',
        'bidang_usaha' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'kontak' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mentor_id' => 'required|exists:mentors,id', // Validasi untuk mentor
    ];

    // Menampilkan modal untuk tambah atau edit
    public function openModal($companyId = null)
    {
        $this->reset(['nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'mentor_id']);
        
        if ($companyId) {
            $company = Company::find($companyId);
            $this->companyId = $company->id;
            $this->nama = $company->nama;
            $this->bidang_usaha = $company->bidang_usaha;
            $this->alamat = $company->alamat;
            $this->kontak = $company->kontak;
            $this->email = $company->email;
            $this->mentor_id = $company->mentor_id;
        }
        
        $this->isOpen = true;
    }

    // Menutup modal
    public function closeModal()
    {
        $this->reset(['nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'mentor_id']);
        $this->isOpen = false;
    }

    // Menyimpan data perusahaan baru atau mengupdate yang sudah ada
    public function save()
    {
        $this->validate();

        if ($this->companyId) {
            $company = Company::find($this->companyId);
            $company->update([
                'nama' => $this->nama,
                'bidang_usaha' => $this->bidang_usaha,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'mentor_id' => $this->mentor_id,
            ]);
        } else {
            Company::create([
                'nama' => $this->nama,
                'bidang_usaha' => $this->bidang_usaha,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'mentor_id' => $this->mentor_id,
            ]);
        }

        session()->flash('success', 'Data perusahaan berhasil disimpan.');
        $this->closeModal();
    }

    // Menghapus data perusahaan
    public function delete($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            session()->flash('success', 'Data perusahaan berhasil dihapus.');
        }
    }

    public function render()
    {
        $companies = Company::paginate(10);  // Mendapatkan data perusahaan dengan pagination
        $mentors = Mentor::all();  // Mendapatkan data mentor untuk dropdown

        return view('livewire.dashboard-company-manager', [
            'companies' => $companies,
            'mentors' => $mentors,
        ]);
    }
}
