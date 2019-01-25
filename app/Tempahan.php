<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempahan extends Model {

    # Maklumat table yang perlu dihubungi
    protected $table = 'tempahan';
    
    protected $fillable = [
        # Field / Table column
    ];

    /**
     * Get the booklist_id record from booklist table.
     */
    public function booklist()
    {
        return $this->belongsTo(Booklist::class);
    }
}