<?php

namespace Ktcd\Emas\Traits;

use Ramsey\Uuid\Uuid;
use Ktcd\Emas\Models\Schedule;

trait Schedulable
{
    public function schedule()
    {
        return $this->morphOne(Schedule::class, 'model');
    }

    public function createSchedule($data)
    {
        $data = array_merge([], $data);

        return $this->schedule()->create($data);
    }

    public function updateSchedule($data)
    {
        $data = array_merge([], $data);
        $schdule = $this->schedule;
        $schdule->update($data);
        $schdule->save();
        return $schdule;
    }

    public function deleteSchedule()
    {
        return $this->schedule()->delete();
    }

    // public function addSchedule()
    // {
    //     $this->schedule()->create();
    // }

    // private function store($requestFile, $type = null, $target = null, $data = [])
    // {
    //     if (!$target) {
    //         $target = 'files';
    //     }
    //     $target = 'files/' . $target;

    //     $name = $requestFile->getClientOriginalName();
    //     $extension = $requestFile->getClientOriginalExtension();
    //     $size = $requestFile->getSize();
    //     $mimeType = $requestFile->getMimeType();
    //     $filename = join('_', [$type, Uuid::uuid4()->toString()]);
    //     $path = $target . '/' . $filename . '.' . $extension;

    //     $requestFile->move($target, $filename . '.' . $extension);

    //     $this->file()->create(array_merge([
    //         'name' => $name,
    //         'path' => $path,
    //         'type' => $type,
    //         'mime_type' => $mimeType,
    //         'size' => $size
    //     ], $data));
    // }
}
