<?php

namespace cboMbcredito\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cboMbcredito\Repositories\UserRepository;
use cboMbcredito\Entities\User;
use cboMbcredito\Validators\UserValidator;

class UserRepositoryEloquent  extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return UserValidator::class;
    }
}