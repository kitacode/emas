<?php

namespace Ktcd\Emas\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Participant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_1',
        'phone_2',
        'address',
        'country',
        'institution',
        'occupation',
        'registration_number',
        'email_verified_at',
        'event_id',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $defaultPassword = '123456';
    
    public static function boot()
    {
        parent::boot();

        self::saved(function($m){
            if (!$m->registration_number) {
                $latestParticipant = Participant::where('event_id', $m->event_id)->latest('registration_number')->first();

                if ($latestParticipant) {
                    $last = intval($latestParticipant->registration_number);
                } 
                else {
                    $last = 0;
                }
                
                $next_registration = strval($last + 1);
                $digits = 4 - strlen($next_registration);
                $registration_number = str_repeat('0', $digits) . $next_registration;
                // update
                $m->registration_number = $registration_number;
                $m->save();            
            }
        });
    }

    public function participantSessions()
    {
        return $this->hasMany(SessionParticipant::class, 'participant_id');
    }
}
