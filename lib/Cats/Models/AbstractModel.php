<?php

namespace Cats\Models;

use Cats\Cats;

abstract class AbstractModel
{
    protected $attributes;

    public function __get($key)
    {
        $method = 'get' . ucfirst(str_replace('_', '', ucwords($key, '_')));
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        if (!isset($this->attributes[$key])) {
            return null;
        }

        return $this->attributes[$key];
    }

    public function __set($key, $value)
    {
        return $this->attributes[$key] = $value;
    }

    public function toArray()
    {
        return $this->attributes ? $this->attributes : [];
    }

    /**
     * @param int $id
     * @return AbstractModel|null
     */
    public static function find($id)
    {
        $class = get_called_class();
        $uri   = Cats::instance()->endpointsMap()[$class]['find'];

        $parsedUri = parse_uri($uri, ['id' => $id]);
        $result    = Cats::instance()->getHttpClient()->get($parsedUri);

        /** @var AbstractModel $model */
        $model = new $class;

        $model->attributes = $result;

        return $model;
    }
}