<?php

namespace Icg\User\Traits;

use Icg\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Set the modifier for model
 */
trait SetModifier {

    public static function setModifierFields(int $id, $fields = ['created_by', 'updated_by']) {
        static::saving(function ($model) use ($fields, $id) {
            foreach ($fields as $field) {
                $model->{$field} = $id;
            }
        });
    }

    public static function createWithModifier(array $data, User $user): Model {
        static::setModifierFields($user->id);
        return parent::create($data);
    }

    public static function withModifier(array $includes = []) {
        return parent::with(array_merge(['createdBy', 'updatedBy'], $includes));
    }

    public function loadModifier(array $includes = []) {
        $this->load('createdBy', 'updatedBy', ...$includes);
    }

    /**
     * Create with an Authenticated User
     *
     * @param array $data
     * @return Model
     */
    public static function createWithAuthUser(array $data): Model {
        static::setModifierFields(Auth::id());
        return static::create($data);
    }
    
    public function updateWithModifier(array $args = [], User $user = null): Model {
        static::setModifierFields($user, ['updated_by']);
        return $this->update($args);
    }

    public function updateWithAuthUser(array $data = []) {
        static::setModifierFields(Auth::id(), ['updated_by']);
        return $this->update($data);
    }

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy() {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public static function updateOrCreateWithAuthUser(array $attributes, array $values) {
        return static::updateOrCreateWithModifier($attributes, $values, Auth::user());
    }

    public static function updateOrCreateWithModifier(array $attributes, array $values, User $user) {
        return tap(static::firstOrNew($attributes), function ($instance) use ($values, $user) {
            $modifier = $instance->exists ? ['updated_by'] : ['created_by','updated_by'];
            $instance::setModifierFields($user->id, $modifier);
            $instance->fill($values)->save();
        });
    }

    public static function firstOrCreateWithAuthUser(array $attributes, array $values) {
        return static::firstOrCreateWithModifier($attributes, $values, Auth::user());
    }

    public static function firstOrCreateWithModifier(array $attributes, array $values, User $user) {

        if (!is_null($instance = self::where($attributes)->first())) {
            return $instance;
        }

        return tap(self::newModelInstance($attributes + $values), function ($instance) use ($user) {
            $instance::setModifierFields($user->id);
            $instance->save();
        });
    }
}
