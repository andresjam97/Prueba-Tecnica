<?php
namespace App\Services;

use App\Contracts\CollectionPaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UserService {
    protected $paginator;
    public function __construct(CollectionPaginator $paginator)
    {
        $this->paginator = $paginator;

    }
    public function UsersData()
    {
        // Obtenemos la data de el Api y la amacenamos en cache
        $data = Cache::remember('users-data', 120, function () {
            $data = Http::get('https://test.conectadosweb.com.co/users/' . env('TOKEN_API'));
            $data = collect(json_decode($data))->sortByDesc('created_at');
            return $data;
        });
        return $this->paginator->pagination($data);
    }

    public function UserTransactions($client_id)
    {
        // Obtenemos la data de las transacciones de el user y la almacenamos en caceh para evitar peticiones constantes
        $data = Cache::remember('users-transactions' . $client_id, 120, function () use ($client_id) {
            $data = Http::get('https://test.conectadosweb.com.co/users/' . env('TOKEN_API') . '/transaction/' . $client_id);
            $data = collect(json_decode($data))->sortBy('created_at');
            return $data;
        });
        return $this->paginator->pagination($data);
    }

    public function UsersDataApi()
    {
        // Obtenemos la data de el Api y la amacenamos en cache
        $data = Cache::remember('users-data-api', 120, function () {
            $data = Http::get('https://test.conectadosweb.com.co/users/' . env('TOKEN_API'));
            $data = collect(json_decode($data));
            return $data;
        });
        return $data;
    }
}
