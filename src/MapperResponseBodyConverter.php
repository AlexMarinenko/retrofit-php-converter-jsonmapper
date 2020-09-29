<?php

namespace Asmsoft\RetrofitConverter\JsonMapper;

use Psr\Http\Message\StreamInterface;
use Tebru\PhpType\TypeToken;
use Tebru\Retrofit\ResponseBodyConverter;

class MapperResponseBodyConverter  implements ResponseBodyConverter
{
    /**
     * @var \JsonMapper
     */
    private $mapper;
    /**
     * @var TypeToken
     */
    private $type;

    /**
     * MapperResponseBodyConverter constructor.
     * @param \JsonMapper $mapper
     * @param TypeToken $type
     */
    public function __construct(\JsonMapper $mapper, TypeToken $type)
    {
        $this->mapper = $mapper;
        $this->type = $type;
    }

    /**
     * Convert from stream to any type
     *
     * @param StreamInterface $value
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    public function convert(StreamInterface $value)
    {
        if ($this->type->isA(StreamInterface::class)) {
            return $value;
        }

        $class = (string)$this->type;
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return $this->mapper->map(json_decode((string)$value), new $class);
    }
}
