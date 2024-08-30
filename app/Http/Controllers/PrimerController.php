<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

Cache::get('key', 'default');
cache('key','default');

$contador = session('contador',0);
$contador++;
session(['contador'=>$contador]);
$contadorCache = cache('contador',0);
$contadorCache++;
cache(['contador'=>$contadorCache]);

Artisan::call('mail:send -i -n');

class PrimerController extends Controller
{
    public function mostrarTexto($texto)
    {
        return "El texto es: " . $texto;
    }
}
?>