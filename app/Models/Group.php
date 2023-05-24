<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Group extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = ['name', 'status', 'category_id', 'modality_id'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
          ];
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function groupHours()
    {
        return $this->hasMany(GroupHour::class, 'groups_id');
    }

}
