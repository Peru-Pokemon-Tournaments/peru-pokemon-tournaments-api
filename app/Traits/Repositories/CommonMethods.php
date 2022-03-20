<?php

namespace App\Traits\Repositories;

use Illuminate\Database\Eloquent\Model;

trait CommonMethods
{
    /**
     * Save the model
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return bool
     */
    public function save(Model &$model)
    {
        return $model->save();
    }

    /**
     * Update the model
     *
     * @param string $id
     * @param array $attributes
     * @return bool
     */
    public function update(string &$id, array &$attributes)
    {
        $model = $this->findOne($id);

        return $model->update($attributes);
    }

    /**
     * Delete the model
     *
     * @param string $id
     * @return bool
     */
    public function delete(string &$id)
    {
        $model = $this->findOne($id);

        return $model->delete();
    }
}
