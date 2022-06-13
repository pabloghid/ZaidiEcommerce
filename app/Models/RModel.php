<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RModel extends Model
{
    use HasFactory;

    protected $primarykey = "id";
    public $timestamps =  true; //create at e update at
    public $incrementing = true; //auto incremento
    protected $fillable = []; // atributos que ela vai guardar

    public function beforeSave() {
        return true;
    }

    public function save (array $options = []) { //em cada um dos models eu possa reescrever o metodo beforesave e consiga fazer alguma operacao antes do laravel salvar
        try {
            
            if (!$this->beforeSave()) {
                return false;

            }

            return parent::save($options); //chamar o metodo save da classe pai
        } catch (\Exception $e) {
            throw new \Exception($e -> getMessage());
        }
    }
}
