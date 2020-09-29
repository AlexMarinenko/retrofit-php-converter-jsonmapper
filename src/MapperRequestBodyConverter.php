<?php

namespace Asmsoft\RetrofitConverter\JsonMapper;

use Psr\Http\Message\StreamInterface;
use Tebru\PhpType\TypeToken;
use Tebru\Retrofit\RequestBodyConverter;

class MapperRequestBodyConverter implements RequestBodyConverter
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
     * MapperRequestBodyConverter constructor.
     * @param \JsonMapper $mapper
     * @param TypeToken $type
     */
    public function __construct(\JsonMapper $mapper, TypeToken $type)
    {
        $this->mapper = $mapper;
        $this->type = $type;
    }

    /**
     * Convert to stream
     *
     * @param mixed $value
     * @return StreamInterface
     */
    public function convert($value): StreamInterface
    {
        if ($this->type->isA(StreamInterface::class)) {
            return $value;
        }

        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return json_encode($value);
    }
}