<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class DashboardStudentList extends Component
{
    use WithPagination;

    public function mount()
    {
        if (!auth()->user()->hasAnyRole(['Teacher', 'super_admin'])) {
            abort(403, 'Kamu tidak diizinkan mengakses halaman ini.');
        }
    }

    public function render()
    {
        return view('livewire.dashboard-student-list', [
            'students' => Student::paginate(10),
        ]);
    }
}
