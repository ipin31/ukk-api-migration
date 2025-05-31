<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Internship;
use Carbon\Carbon;

class DashboardInternshipList extends Component
{
    use WithPagination;
    public function render()
    {
        $internships = Internship::select('pkl.*')
            ->join('siswa', 'pkl.siswa_id', '=', 'siswa.id')
            ->orderBy('siswa.nama', 'asc')
            ->paginate(10);

        $internships->load(['student', 'industri', 'industri.guru']);

        $internships->getCollection()->transform(function ($internship) {
            $mulai = Carbon::parse($internship->mulai);
            $selesai = Carbon::parse($internship->selesai);
            $durasi = $mulai->diffInDays($selesai);
            $internship->durasi_hari = $durasi;
            $internship->durasi_valid = $durasi >= 90;
            return $internship;
        });

        return view('livewire.dashboard-internship-list', [
            'internships' => $internships,
        ]);
    }
}
