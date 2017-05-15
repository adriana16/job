<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cv;
use AppBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class JobController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod("POST")) {
            $searchTerm = $request->request->get('search');
            $jobs = $em->getRepository(Job::class)->findAllBySearchTerm($searchTerm);

            return new JsonResponse([
                'status' => "ok",
                'content' => $this->renderView('job/job_list.html.twig', [
                    'jobs' => $jobs
                ]),
                'searchTerm' => $searchTerm,
            ]);
        }

        $jobs = $em->getRepository(Job::class)->findAll();

        return $this->render('job/index.html.twig', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function crawlAction(Request $request)
    {
        $crawlService = $this->container->get('app_crawl_job_service');
        $crawlService->getJobs();

        return $this->redirectToRoute('app_job_index');
    }

    /**
     * @param Job $job
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Job $job)
    {
        return $this->render('job/show.html.twig', [
            'job' => $job
        ]);
    }

    /**
     * @param Request $request
     * @param Job $job
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function matchingAction(Request $request, Job $job)
    {
        $em = $this->getDoctrine()->getManager();
        $skills = $job->getKeyword();

        $keywords = "";
        foreach ($skills as $skill) {
            $keywords .= $skill . " ";
        }

        $candidates = $em->getRepository(Cv::class)->findAllBySkills($keywords);

        return $this->render('job/job_candidates.html.twig', [
            'candidates' => $candidates,
            'keywords' => $keywords,
            'job' => $job
        ]);
    }
}
