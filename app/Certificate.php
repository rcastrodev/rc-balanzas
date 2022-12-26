<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['order', 'name', 'description', 'image', 'content_2'];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'certificate_client', 'certificate_id', 'client_id');
    }
}
