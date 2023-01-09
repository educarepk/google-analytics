<?php

namespace Educare\Analytics\Core;

use Google_Service_AnalyticsReporting;
use Google_Service_AnalyticsReporting_GetReportsRequest;

class AnalyticsReporting
{
    private $analytics;
    private $body;
    private $params;

    public function __construct(Client $client, ReportRequest $request, array $params)
    {
        $this->params = $params;
        $this->create($client->get(), $request->get());
    }

    private function create($client, $request)
    {
        $this->analytics = new Google_Service_AnalyticsReporting($client);
        $this->body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $this->body->setReportRequests([$request]);
    }

    public function get()
    {
        return $this->analytics->reports->batchGet($this->body, $this->params);
    }
}
