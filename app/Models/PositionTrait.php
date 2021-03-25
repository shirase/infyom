<?php

namespace App\Models;

use Illuminate\Database\Query\Expression;

trait PositionTrait
{
    public static function bootPositionTrait()
    {
        static::saving(function ($model) {
            $model->position = new Expression('MAX(position)+1');
            return true;
        });
    }

    public function positioning($oldPos, $newPos)
    {
        if ($newPos > $oldPos) {
            $this->newQuery()
                ->where('position', '>=', $oldPos)
                ->where('position', '<=', $newPos)
                ->update(['position' => new Expression('IF(position!='.(int)$oldPos.', position-1, '.(int)$newPos.')')])
            ;
        }
        elseif ($newPos < $oldPos) {
            $this->newQuery()
                ->where('position', '<=', $oldPos)
                ->where('position', '>=', $newPos)
                ->update(['position' => new Expression('IF(position!='.(int)$oldPos.', position+1, '.(int)$newPos.')')])
            ;
        }
    }
}
