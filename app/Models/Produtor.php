<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtor extends Model
{

    protected $table = 'produtors';

    protected $fillable = ['nome', 'fazenda', 'cidade', 'cpf', 'endereco'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
