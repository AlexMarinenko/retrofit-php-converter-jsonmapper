<?php

namespace Asmsoft\RetrofitConverter\JsonMapper;

use Tebru\PhpType\TypeToken;
use Tebru\Retrofit\ConverterFactory;
use Tebru\Retrofit\RequestBodyConverter;
use Tebru\Retrofit\ResponseBodyConverter;
use Tebru\Retrofit\StringConverter;

class MapperConverterFactory implements ConverterFactory
{
    /**
     * @var \JsonMapper
     */
    private $mapper;

    /**
     * Constructor
     *
     * @param \JsonMapper $mapper
     */
    public function __construct(\JsonMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Return a [@see ResponseBodyConverter] or null
     *
     * @param TypeToken $type
     * @return null|ResponseBodyConverter
     */
    public function responseBodyConverter(TypeToken $type): ?ResponseBodyConverter
    {
        return new MapperResponseBodyConverter($this->mapper, $type);
    }

    /**
     * Return a [@see RequestBodyConverter] or null
     *
     * @param TypeToken $type
     * @return null|RequestBodyConverter
     */
    public function requestBodyConverter(TypeToken $type): ?RequestBodyConverter
    {
        return new MapperRequestBodyConverter($this->mapper, $type);
    }

    /**
     * Return a [@see StringConverter] or null
     *
     * @param TypeToken $type
     * @return null|StringConverter
     */
    public function stringConverter(TypeToken $type): ?StringConverter
    {
        return null;
    }
}
