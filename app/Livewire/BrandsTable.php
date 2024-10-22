<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsTable extends Component
{

    use WithPagination;

    public $name;
    public $description;


    public $search = ''; // Propiedad para almacenar el término de búsqueda
    public function render()
    {
        // Divide el término de búsqueda en palabras (por espacios)
        $searchTerms = explode(' ', $this->search);

        // Crea una consulta base
        $brandQuery = Brand::query()
            ->where(function ($query) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    // Agrega una condición "orWhere" para cada palabra de búsqueda
                    $query->where(function ($subquery) use ($term) {
                        $subquery->where('name', 'like', '%' . $term . '%')
                            ->orWhere('description', 'like', '%' . $term . '%');
                    });
                }
            });

        // Paginación
        $marcas = $brandQuery->paginate(10);

        return view('livewire.brand-table', ['marcas' => $marcas]);
    }
}
