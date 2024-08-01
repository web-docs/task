<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const TASKS_PER_PAGE = 10;

    const STATUS_CREATED = 0;
    const STATUS_IN_PROCESS = 1;
    const STATUS_COMPLETED = 2;


    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function getStatusLabel(){

        switch($this->status) {
            case self::STATUS_CREATED:
                return __('main.status_created');
            case self::STATUS_IN_PROCESS:
                return __('main.status_in_process');
            case self::STATUS_COMPLETED:
                return __('main.status_completed');

        }
        return __('main.unknown');
    }

    public function getStatusesList(){

        return [
            0=> __('main.status_created'),
            1=> __('main.status_in_process'),
            2=> __('main.status_completed')
        ];

    }
}
