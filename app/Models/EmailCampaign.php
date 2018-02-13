<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    protected $fillable = ['title','template_id',];

    public function email(){
        return $this->belongsTo(EmailTemplate::class,'template_id');
    }

    public function template()
    {
        return $this->belongsTo(EmailTemplate::class);
    }

}
