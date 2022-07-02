<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $common = [
            'nidn' => "required|unique:profile,nidn,$id",
            'first_name' => 'required',
            'last_name' => 'nullable',
            'nip' => "required|unique:profile,nip,$id",

        ];

        if ($update) {
            return array_merge($common, [
                'pendidikan_tertinggi' => 'required',
                'jabatan_fungsional' => 'required',

            ]);
        }
        return array_merge($common, [
            'pendidikan_tertinggi' => 'nullable',
            'jabatan_fungsional' => 'nullable',

        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    /**
     * Get the user that owns the profile
     *
     * @return \luminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
}
