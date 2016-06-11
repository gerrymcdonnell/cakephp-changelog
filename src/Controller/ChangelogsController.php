<?php
namespace Gerrymcdonnell\Changelogs\Controller;

use Gerrymcdonnell\Changelogs\Controller\AppController;
use Cake\ORM\TableRegistry; 
use Cake\ORM\Query; 
use Cake\I18n\Date;

/**
 * Changelogs Controller
 *
 * @property \Gmcd\Changelogs\Model\Table\ChangelogsTable $Changelogs
 */
class ChangelogsController extends AppController
{
	public $paginate = [        
        'limit' => 25,
		'contain' => ['Changelogscategories'],
        'order' => [
            'created' => 'desc'
        ]
    ];
    

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');

        //get catagories listing
        $this->getCatagoryList();
    }


    function getCatagoryList(){

        //get list of changelogs categories
        $query = $this->Changelogs->Changelogscategories->find('all');
        $Changelogscategories = $query->all();   

        $this->set(compact('Changelogscategories'));
        $this->set('_serialize', ['Changelogscategories']);
    }


	
    /**
    allow users access
    **/
	public function isAuthorized($user)
    {
		return true;
	}	
	


	/**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $options= [
            'contain' => ['Users','Changelogscategories']
        ];

        $changelogs = $this->paginate($this->Changelogs,$options);    

        $this->set(compact('changelogs'));
        $this->set('_serialize', ['changelogs']);
    }



    /**
    get by status
    **/
    public function getstatus($status)
    {              
        $q = $this->Changelogs->findByStatus($status);     

        $this->set('changelogs', $this->paginate($q,['contain'=>'Changelogscategories']));   

        $this->set(compact('changelogs'));
        $this->set('_serialize', ['changelogs']);

        $this->render('index');
    }


    /**
    get by priority
    **/
    public function getpriority($priority)
    {

        $q = $this->Changelogs->findByPriority($priority);

        $options=['contain'=>'Changelogscategories'];
        $this->set('changelogs', $this->paginate($q,$options));      

        $this->set(compact('changelogs'));
        $this->set('_serialize', ['changelogs']);

        //set subtitle
        $this->setSubtitle('priority');

        $this->render('index');
    }



    public function getlatest($param)
    {        
        //all latest =0
        //latest open log
        
        $options = ['contain' => ['Changelogscategories'],            
            'orderby'=>['Changelogs.created']            
        ];  
           
        if($param==0)
            $query = $this->Changelogs->find('all');     
        elseif($param==1)
            $query = $this->Changelogs->findAllByStatus(0);  
        
        $changelogs = $this->paginate($query,$options);

        //set subtitle
        $this->setSubtitle('Latest Logs');
		
        $this->set(compact('changelogs'));
        $this->set('_serialize', ['changelogs']);

        $this->render('index');    
    }
	
	
	
	
	/**
	get by mod date
	**/
	public function getByModified(){
		
		$query = $this->Changelogs->find('all', 
		['order' => ['Changelogs.modified' => 'DESC']]);
		
		//contain
		$options = ['contain' => ['Changelogscategories','Users']];  
		
		//pagnate
		$changelogs = $this->paginate($query,$options);
	
	    //set subtitle
        $this->setSubtitle('Latest Modified Logs');
		
		//save data to view
        $this->set(compact('changelogs'));
        $this->set('_serialize', ['changelogs']);
		
		//use the index view
        $this->render('index');  
	}





    /**
        get by catagory id
    **/
    public function getcategory($id)
    {              
        $q = $this->Changelogs->findByChangelogscategories_id($id);     

        $this->set('changelogs', $this->paginate($q,['contain'=>'Changelogscategories']));   

        $this->set(compact('changelogs'));
        $this->set('_serialize', ['changelogs']);

        $this->render('index');
    }



    //set subtitle for view
    function setSubtitle($text){
        $subtitle=$text;
        $this->set('subtitle',$subtitle);
    }





    /**
     * View method
     *
     * @param string|null $id Changelog id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $changelog = $this->Changelogs->get($id, [
            'contain' => ['Changelogscategories', 'Users']
        ]);

        $this->set('changelog', $changelog);
        $this->set('_serialize', ['changelog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $changelog = $this->Changelogs->newEntity();
        if ($this->request->is('post')) {
			
			// Added this line
            $changelog->user_id = $this->Auth->user('id');
			
            $changelog = $this->Changelogs->patchEntity($changelog, $this->request->data);
            if ($this->Changelogs->save($changelog)) {
                $this->Flash->success(__('The changelog has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changelog could not be saved. Please, try again.'));
            }
        }
        $changelogscategories = $this->Changelogs->Changelogscategories->find('list', ['limit' => 200]);
        $users = $this->Changelogs->Users->find('list', ['limit' => 200]);
        $this->set(compact('changelog', 'changelogscategories', 'users'));
        $this->set('_serialize', ['changelog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Changelog id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $changelog = $this->Changelogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $changelog = $this->Changelogs->patchEntity($changelog, $this->request->data);
            if ($this->Changelogs->save($changelog)) {
                $this->Flash->success(__('The changelog has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changelog could not be saved. Please, try again.'));
            }
        }
        $changelogscategories = $this->Changelogs->Changelogscategories->find('list', ['limit' => 200]);
        $users = $this->Changelogs->Users->find('list', ['limit' => 200]);
        $this->set(compact('changelog', 'changelogscategories', 'users'));
        $this->set('_serialize', ['changelog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Changelog id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $changelog = $this->Changelogs->get($id);
        if ($this->Changelogs->delete($changelog)) {
            $this->Flash->success(__('The changelog has been deleted.'));
        } else {
            $this->Flash->error(__('The changelog could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	
	/**
    simple search
    **/
    public function search($search=null)
    {        
        
        if ($this->request->is('post') && $this->request->data['search']) {
            //then do search

            //get submitted data
            $search=$this->request->data['search'];

            $query = $this->Changelogs->find('all',
                ['conditions'=>['title LIKE' => '%'.$search.'%']]
            );
            $count = $query->count();

            $this->Flash->success(__('Search complete'));

            $this->set('results', $query);
            $this->set('count',$count);
            
        }
        else
        {
            //set subtitle
            $this->setSubtitle('search');
        }
        //$this->render('testsearch');
    }
	
	
	
	/**
	ajax edit
	**/
	public function ajaxedit($id = null)
    {
        $changelog = $this->Changelogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['ajax'])) {
            $changelog = $this->Changelogs->patchEntity($changelog, $this->request->data);
            if ($this->Changelogs->save($changelog)) {
                $data='The changelog has been saved.';
            } else {
                $data='The changelog could not be saved. Please, try again.';
            }
			$this->response->body(json_encode($data));
			return $this->response;	
        }
		

		
        
		/*
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
		*/
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
}
