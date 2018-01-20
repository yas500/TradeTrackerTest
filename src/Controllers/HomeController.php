<?php

namespace Mg\TradeTracker\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Mg\TradeTracker\Helpers\ProductsParser;

class HomeController extends BaseController
{

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * index action
     * 
     * @return 
     */
    public function index()
    {
        return $this->render('home.index');
    }

    /**
     * process request
     * @param Request $request
     * @return 
     */
    public function parse(Request $request)
    {
        $data = [];

        try {
            $this->validate($request, [
                'url' => 'url',
                'limit' => 'numeric',
                'skip' => 'numeric'
            ]);

            //http://localhost/tradetraker/productfeed.xml
            $url = $request->input('url');
            $limit = $request->input('limit');
            $skip = $request->input('skip');

            $parser = ProductsParser::withDefaults($url);
            $data = $parser->getData($limit, $skip);
            
            $parser->close();
        } catch (\Exception $ex) {
            Log::error($ex);
        }

        return [
            'success' => count($data) > 0,
            'data' => $data
        ];
    }

    /**
     * render view
     *
     * @param string $name
     * @param array $data
     * @return mixed
     */
    protected function render($name, $data = [])
    {
        return view('tradetracker::' . $name, $data);
    }

}
