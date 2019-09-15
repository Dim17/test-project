<?php

namespace App\Controller;

use App\Services\ReportService;
use App\Services\Validation\Constraints\ReportRequestConstraint;
use App\Services\Validation\Validator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReportController
 * @package App\Controller
 */
class ReportController extends AbstractController
{
    /**
     * @var Validator
     */
    private $validator;
    /**
     * @var ReportService
     */
    private $reportService;

    /**
     * ReportController constructor.
     * @param Validator $validator
     * @param ReportService $reportService
     */
    public function __construct(Validator $validator, ReportService $reportService)
    {
        $this->validator     = $validator;
        $this->reportService = $reportService;
    }

    /**
     * @param Request $request
     * @param ReportRequestConstraint $constraint
     * @return JsonResponse
     * @throws \App\Exceptions\ValidationException
     */
    public function getReport(Request $request, ReportRequestConstraint $constraint)
    {
        $data = [
            'from'     => $request->get('from'),
            'to'       => $request->get('to'),
            'metrics'  => $request->get('metrics'),
            'group_by' => $request->get('group_by'),
        ];

        $this->validator->validate($data, $constraint);

        $report = $this->reportService->getReport($data);

        return new JsonResponse($report, 200);
    }
}
