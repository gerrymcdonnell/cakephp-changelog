<?php
namespace Gerrymcdonnell\Changelog\Controller;

use Gerrymcdonnell\Changelog\Controller\AppController;

/**
 * ChangelogCategories Controller
 *
 * @property \Gerrymcdonnell\Changelog\Model\Table\ChangelogCategoriesTable $ChangelogCategories
 */
class ChangelogCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $changelogCategories = $this->paginate($this->ChangelogCategories);

        $this->set(compact('changelogCategories'));
        $this->set('_serialize', ['changelogCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Changelog Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $changelogCategory = $this->ChangelogCategories->get($id, [
            'contain' => ['Changelogs']
        ]);

        $this->set('changelogCategory', $changelogCategory);
        $this->set('_serialize', ['changelogCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $changelogCategory = $this->ChangelogCategories->newEntity();
        if ($this->request->is('post')) {
            $changelogCategory = $this->ChangelogCategories->patchEntity($changelogCategory, $this->request->data);
            if ($this->ChangelogCategories->save($changelogCategory)) {
                $this->Flash->success(__('The changelog category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changelog category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('changelogCategory'));
        $this->set('_serialize', ['changelogCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Changelog Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $changelogCategory = $this->ChangelogCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $changelogCategory = $this->ChangelogCategories->patchEntity($changelogCategory, $this->request->data);
            if ($this->ChangelogCategories->save($changelogCategory)) {
                $this->Flash->success(__('The changelog category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The changelog category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('changelogCategory'));
        $this->set('_serialize', ['changelogCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Changelog Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $changelogCategory = $this->ChangelogCategories->get($id);
        if ($this->ChangelogCategories->delete($changelogCategory)) {
            $this->Flash->success(__('The changelog category has been deleted.'));
        } else {
            $this->Flash->error(__('The changelog category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
