<?php

namespace Ktcd\Emas\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Ktcd\Emas\Models\Participant;

class ParticipantImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $particpant = Participant::where('email', $row['email_addres'])->first();
        if (!$particpant) {
            return new Participant([
                'email' => $row['email_addres'],
                'name' => $row['name'], 
                'phone_1' => $row['phone_number'],
                'institution' => $row['institution'],
                'occupation' => $row['occupation'],
                'event_id' => 1,
                'password' => Hash::make(Participant::$defaultPassword),
            ]);
        }

        return $particpant;
    }
}
