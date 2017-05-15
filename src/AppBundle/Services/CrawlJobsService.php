<?php

namespace AppBundle\Services;

use AppBundle\Entity\Job;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DomCrawler\Crawler;

class CrawlJobsService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var Slugify
     */
    protected $slug;

    /**
     * CrawlJobsService constructor.
     * @param EntityManager $em
     * @param Slugify $slug
     */
    public function __construct(EntityManager $em, Slugify $slug)
    {
        $this->em = $em;
        $this->slug = $slug;
    }

    public function getJobs()
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', 'https://www.bestjobs.eu/ro/locuri-de-munca', [
                'query' => [
                    'location' => 'bucuresti',
                    'keyword' => 'symfony'
                ]
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse();
        }

        $body = $response->getBody();
        $content = $body->getContents();

        $crawlerContent = new Crawler($content);
        $jobs = $crawlerContent->filter('.card-item');

        foreach ($jobs as $jobElement) {
            $crawlerJob = new Crawler($jobElement);
            $title = trim(preg_replace('/\s\s+/', ' ', $crawlerJob->filter('.job-title')->text()));
            $company = trim(preg_replace('/\s\s+/', ' ', $crawlerJob->filter('.truncate-1-line')->text()));
            $keywords = $crawlerJob->filter('.search-after-keyword');

            $jobKeywords = [];
            foreach ($keywords as $keyword) {
                array_push($jobKeywords, trim(preg_replace('/\s\s+/', ' ', $keyword->textContent)));
            }

            $description = $this->getJobDescription($crawlerJob->filter('.job-title > .card-link')->attr('href'));
            $location = trim(preg_replace('/\s\s+/', ' ', $crawlerJob->filter('.truncate-2-line')->text()));

            $job = new Job();
            $job->setTitle($title);
            $job->setCompany($company);
            $job->setKeyword($jobKeywords);
            $job->setDescription($description);
            $job->setLocation($location);
            $job->setSlug($this->slug->slugify($title));

            $this->em->persist($job);
        }

        $this->em->flush();
    }

    public function getJobDescription($jobName)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $jobName);
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getResponse();
        }

        $body = $response->getBody();
        $content = $body->getContents();

        $crawlerContent = new Crawler($content);
        $descriptions = $crawlerContent->filter('.job-description');

        $jobDescription = "";
        foreach ($descriptions as $description) {
            $jobDescription .= $description->ownerDocument->saveHTML($description);
        }

        return $jobDescription;
    }
}