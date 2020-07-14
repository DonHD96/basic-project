<?php

namespace MyProject1\Cores;

class Route
{
    protected $requestMethod;
    protected $aRouter;
    protected $aDynamicRouter;
    protected $currentRawController;
    private $aParam = [];

    public static function load($config)
    {
        $oRouter = new static();
        include $config;
        return $oRouter;
    }

    public function get($route, $controller)
    {
        $this->aRouter['GET'][$route] = $controller;
        if (strpos($route, '{') !== false) {
            $this->aDynamicRouter['GET'][$route] = $controller;
        }
        return $this;
    }

    public function post($route, $controller)
    {
        $this->aRouter['POST'][$route] = $controller;
        if (strpos($route, '{') !== false) {
            $this->aDynamicRouter['POST'][$route] = $controller;
        }
        return $this;
    }

    public function generateRegex($dynamicRoute)
    {
        return preg_replace_callback('/{[a-zA-Z0-9]+}/', function ($aMatches) {
            return '([a-zA-Z0-9]+)';
        }, $dynamicRoute);
    }

    /**
     * @param $route
     *
     * @return bool
     */
    protected function isRouteExists($route):bool
    {
        if (isset($this->aRouter[$this->requestMethod][$route])) {
            $this->currentRawController = $this->aRouter[$this->requestMethod][$route];
            return true;
        }
        foreach ($this->aDynamicRouter[$this->requestMethod] as $dynamicRoute => $rawController) {
            $regex = $this->generateRegex($dynamicRoute);
            if (preg_match('@^' . $regex . '@', $route, $aMatches)) {
                $this->currentRawController = $rawController;
                unset($aMatches[0]);
                $this->aParam = array_values($aMatches);
                return true;
            }
        }
        return false;
    }

    protected function getController()
    {
        return $this->currentRawController;
    }

    public function callAction($controller, $method)
    {
        if (!App::get($controller)) {
            $oInstance = new $controller;
            App::bind($controller, $oInstance);
        }
        call_user_func_array([App::get($controller), $method], $this->aParam); // Controller -> method(id)
    }

    private function reset()
    {
        $this->aParam = [];
    }

    public function direct($route, $requestMethod)
    {
        $this->reset();
        $this->requestMethod = $requestMethod;
        if ($this->isRouteExists($route)) {
            $aParseRoute = explode('@', $this->currentRawController);
            try {
                return $this->callAction(...$aParseRoute);
            } catch (\Exception $e) {

            }
        }
    }
}