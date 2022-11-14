<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserRole;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version January 30, 2021, 9:38 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function updateRoles($id, $roles)
    {
        foreach ($roles as $role) {
            $model = UserRole::query()->where('user_id', $id)->where('role', $role)->first();
            if (!$model) {
                $model = new UserRole();
                $model->user_id = $id;
                $model->role = $role;
                $model->save();
            }
        }
        UserRole::query()->where('user_id', $id)->whereNotIn('role', $roles)->delete();
    }
}
