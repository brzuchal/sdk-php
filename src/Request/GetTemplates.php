<?php

namespace Easir\SDK\Request;

use Easir\SDK\Exception\RequestException;
use Easir\SDK\Request;
use Easir\SDK\Request\Model\Search;
use Easir\SDK\Response\GetTemplates as GetTemplatesResponse;

class GetTemplates extends Request
{
    /**
     * @var string
     */
    protected $url = '/templates?page=%d&per_page=%d&q=%s';
    /**
     * @var string
     */
    public $method = 'GET';
    /**
     * @var string
     */
    public $responseClass = GetTemplatesResponse::class;
    /**
     * @var string
     */
    protected $modelClass = Search::class;

    /**
     * @throws RequestException
     * @return string
     */
    public function getUrl()
    {
        $this->checkModel();

        return sprintf(parent::getUrl(),
            (int)$this->model->page,
            (int)$this->model->perPage,
            urlencode((string)$this->model->searchTerm)
        );
    }
}
