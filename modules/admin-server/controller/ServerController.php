<?php
/**
 * System server controller
 * @package admin-server
 * @version 0.0.1
 * @upgrade true
 */

namespace AdminServer\Controller;

class ServerController extends \AdminController
{
    private function _defaultParams(){
        return [
            'title'             => 'Server',
            'nav_title'         => 'System',
            'active_menu'       => 'system',
            'active_submenu'    => 'server'
        ];
    }
    
    public function indexAction(){
        if(!$this->user->login)
            return $this->loginFirst('adminLogin');
        if(!$this->can_i->read_server)
            return $this->show404();
        
        $params = $this->_defaultParams();
        $tests = [];
        
        $tester = $this->config->_server;
        if($tester){
            foreach($tester as $label => $test){
                $test_fn = explode('::', $test);
                $test_cl = $test_fn[0];
                $test_mt = $test_fn[1];
                
                $test_res = $test_cl::$test_mt();
                $test_res['desc'] = $label;
                
                $tests[$label] = $test_res;
            }
        }
        
        ksort($tests);
        $params['tests'] = $tests;
        return $this->respond('system/server/index', $params);
    }
}