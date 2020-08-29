<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use MediaFigaro\GoogleAnalyticsApi\GoogleAnalyticsApi;


/**
* @Route("/public")
*/
class googleApi extends AbstractController  {

   /**
   * @Route("/aa", name="googlesapidd")
   */
         public function GoogleAnalyticsApi(){
           $ga= new GoogleAnalyticsApi();
           $analyticsService = $ga->getPath('google_analytics_api.api');
           $View_ID=226620631;
      //     $data = $analyticsService->getDataDateRangeMetricsDimensions($View_ID,$dateStart,$dateEnd,$metrics='sessions',$dimensions=null,$sorting=null);
             //  return ($data);
              return new JsonResponse($analyticsService->getDataDateRangeMetricsDimensions($View_ID,$dateStart,$dateEnd,$metrics,$dimensions=null,$sorting=null).toString());

         }
         /**
         * @Route("/xx", name="googleapidd")
         */
         public function google2(){
                $ga= new GoogleAnalyticsApi();
                $analyticsService = $ga->$this->get('google_analytics_api.api');
              //$viewId = $this->container->getParameter('226620631');
                $viewId=226620631;
                $sessions = $analyticsService->getSessionsDateRange($viewId,'30daysAgo','today');
                $bounceRate = $analyticsService->getBounceRateDateRange($viewId,'30daysAgo','today');
                $avgTimeOnPage = $analyticsService->getAvgTimeOnPageDateRange($viewId,'30daysAgo','today');
                $pageViewsPerSession = $analyticsService->getPageviewsPerSessionDateRange($viewId,'30daysAgo','today');
                $percentNewVisits = $analyticsService->getPercentNewVisitsDateRange($viewId,'30daysAgo','today');
                $pageViews = $analyticsService->getPageViewsDateRange($viewId,'30daysAgo','today');
                $avgPageLoadTime = $analyticsService->getAvgPageLoadTimeDateRange($viewId,'30daysAgo','today');

                echo $sessions;

                return new JsonResponse($sessions);
}


    /**
    * @Route("/tt", name="googlesapqdqvxwcidd")
    */
      public function GoogleAnalyticsApiss(){
        $ga= new GoogleAnalyticsApi();
        $analyticsService = $ga->getName('google_analytics_api.api');
        $data = $analyticsService->getDataDateRangeMetricsDimensions(
            '226620631',    // viewid
            '2018-01-01',   // date start
            'today',        // date end
            ['sessions','users','percentNewSessions','bounceRate'],             // metric
            ['source','campaign','fullReferrer','sourceMedium','pagePath'],     // dimension
            [   // order metric and/or dimension
                'fields'    =>  ['sessions'],
                'order'     =>  'descending'
            ],
            [   // metric
                'metric_name'       =>  'sessions',
                'operator'          =>  'LESS_THAN',
                'comparison_value'  =>  '100'
            ],
            [   // dimension
                'dimension_name'    =>  'sourceMedium',
                'operator'          =>  'EXACT',
                'expressions'       =>  [
                    'trading / native'
                ]
            ]
        );
        return new JsonResponse($data);
    }
    }
 ?>
