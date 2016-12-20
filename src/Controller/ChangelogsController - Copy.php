<?php
namespace Gerrymcdonnell\Changelog\Controller;

use Gerrymcdonnell\Changelog\Controller\AppController;

/**
 * Changelogs Controller
 *
 * @property \Gerrymcdonnell\Changelog\Model\Table\ChangelogsTable $Changelogs
 */
class ChangelogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ChangelogCategories', 'Users']
        ];
        $changelogs = $this->paginate($this->Changelogs);

        $this->set(compact('changelogs'));
        $this->set('_serialize', ['changelogs']);
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
            'contain' => ['ChangelogCategories', 'Users']
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
            $changelog = $this->Changelogs->patchEntity($changelog, $this->request->data);
            if ($this->Changelogs->save($changelog)) {
                $this->Flash->success(__('The changelog has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changelog could not be saved. Please, try again.'));
            }
        }
        $changelogCategories = $this->Changelogs->ChangelogCategories->find('list', ['limit' => 200]);
        $users = $this->Changelogs->Users->find('list', ['limit' => 200]);
        $this->set(compact('changelog', 'changelogCategories', 'users'));
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
        $changelogCategories = $this->Changelogs->ChangelogCategories->find('list', ['limit' => 200]);
        $users = $this->Changelogs->Users->find('list', ['limit' => 200]);
        $this->set(compact('changelog', 'changelogCategories', 'users'));
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
}
