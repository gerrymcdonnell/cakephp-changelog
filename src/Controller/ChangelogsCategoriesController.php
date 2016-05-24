<?php
namespace Gerrymcdonnell\Changelogs\Controller;

use Gerrymcdonnell\Changelogs\Controller\AppController;

/**
 * ChangelogsCategories Controller
 *
 * @property \Gmcd\Changelogs\Model\Table\ChangelogsCategoriesTable $ChangelogsCategories
 */
class ChangelogsCategoriesController extends AppController
{

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
        $changelogsCategories = $this->paginate($this->ChangelogsCategories);

        //$cats=$this->ChangelogsCategories->findDistinctCategoryList('cats',null);

        $this->set(compact('changelogsCategories'));
        $this->set('_serialize', ['changelogsCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Changelogs Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $changelogsCategory = $this->ChangelogsCategories->get($id, [
            'contain' => []
        ]);

        $this->set('changelogsCategory', $changelogsCategory);
        $this->set('_serialize', ['changelogsCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $changelogsCategory = $this->ChangelogsCategories->newEntity();
        if ($this->request->is('post')) {
            $changelogsCategory = $this->ChangelogsCategories->patchEntity($changelogsCategory, $this->request->data);
            if ($this->ChangelogsCategories->save($changelogsCategory)) {
                $this->Flash->success(__('The changelogs category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changelogs category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('changelogsCategory'));
        $this->set('_serialize', ['changelogsCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Changelogs Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $changelogsCategory = $this->ChangelogsCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $changelogsCategory = $this->ChangelogsCategories->patchEntity($changelogsCategory, $this->request->data);
            if ($this->ChangelogsCategories->save($changelogsCategory)) {
                $this->Flash->success(__('The changelogs category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changelogs category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('changelogsCategory'));
        $this->set('_serialize', ['changelogsCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Changelogs Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $changelogsCategory = $this->ChangelogsCategories->get($id);
        if ($this->ChangelogsCategories->delete($changelogsCategory)) {
            $this->Flash->success(__('The changelogs category has been deleted.'));
        } else {
            $this->Flash->error(__('The changelogs category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
