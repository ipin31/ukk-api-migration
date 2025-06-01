<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;
use App\Models\Mentor;

class DashboardCompanyManager extends Component
{
    use WithPagination;

    public $nama, $bidang_usaha, $alamat, $kontak, $email, $guru_id;
    public $isOpen = false;
    public $companyId;

    // Validation rules
    protected $rules = [
        'nama' => 'required|string|max:255',
        'bidang_usaha' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'kontak' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'guru_id' => 'required|exists:guru,id', // Validasi untuk guru
    ];

    protected $messages = [
        'nama.required' => 'Nama perusahaan wajib diisi.',
        'bidang_usaha.required' => 'Bidang usaha wajib diisi.',
        'alamat.required' => 'Alamat perusahaan wajib diisi.',
        'kontak.required' => 'Kontak perusahaan wajib diisi.',
        'email.required' => 'Email perusahaan wajib diisi.',
        'guru_id.required' => 'Silahkan pilih guru pembimbing.',
    ];

    // Menampilkan modal untuk tambah atau edit
    public function openModal($companyId = null)
    {
        $this->reset(['nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'guru_id']);
        
        if ($companyId) {
            $company = Company::find($companyId);
            $this->companyId = $company->id;
            $this->nama = $company->nama;
            $this->bidang_usaha = $company->bidang_usaha;
            $this->alamat = $company->alamat;
            $this->kontak = $company->kontak;
            $this->email = $company->email;
            $this->guru_id = $company->guru_id;
        }
        
        $this->isOpen = true;
    }

    // Menutup modal
    public function closeModal()
    {
        $this->reset(['nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'guru_id']);
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
                'guru_id' => $this->guru_id,
            ]);
        } else {
            Company::create([
                'nama' => $this->nama,
                'bidang_usaha' => $this->bidang_usaha,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'guru_id' => $this->guru_id,
            ]);
        }

        session()->flash('success_company', 'Data industri berhasil disimpan.');
        $this->closeModal();
        return $this->redirect('/dashboard');
    }

    // Menghapus data perusahaan
    public function delete($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            session()->flash('success', 'Data industri berhasil dihapus.');
        }
    }

    public function render()
    {
        $companies = Company::paginate(10);  // Mendapatkan data perusahaan dengan pagination
        $guru = Mentor::all();  // Mendapatkan data guru untuk dropdown

        return view('livewire.dashboard-company-manager', [
            'companies' => $companies,
            'guru' => $guru,
        ]);
    }
}
