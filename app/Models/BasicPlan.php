<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicPlan extends Model
{
    public $fillable = [
        'name',
        'totalConnection'
    ];

    public function __construct(array $attributes = [])
    {
        $this->name = 'Basic Plan';
        $this->totalConnection = 1;
        parent::__construct($attributes);
    }
}
