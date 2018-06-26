<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Utility\Text;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
* Articles Controller
*
* @property \App\Model\Table\ArticlesTable $Articles
*
* @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
*/
class ArticlesController extends AppController
{
  /**
  * Index method
  *
  * @return \Cake\Http\Response|void
  */
  public function index()
  {
    $paginate = [
      // Autres clés ici.
      'maxLimit' => 180
    ];
    $articles = $this->paginate($this->Articles);

    $this->set(compact('articles'));
    $this->set('_serialize', ['articles']);

    $categories = $this->Articles->Categories->find('threaded');
    $this->set(compact('categories'));
  }
  public $paginate = [
      // Autres clés ici.
      'limit' => 780,
      'maxLimit' => 780
  ];


  public function byCategory($category_id = null)
  {
      $articles = $this->paginate($this->Articles->findByCategoryId($category_id));

      //$query = $this->Articles->find('popular')->where(['author_id' => 1]);
      //$this->set('articles', $this->paginate($query));

      $this->set(compact('articles'));
      $this->set('_serialize', ['articles']);

      $categories = $this->Articles->Categories->find('threaded');
      $this->set(compact('categories'));
  }


  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
      $article = $this->Articles->newEntity();
      if ($this->request->is('post')) {
          $article = $this->Articles->patchEntity($article, $this->request->getData());
          $article->slug = Text::slug($article->title);
          $article->media_path = Text::slug($article->title, '_');

          // Ajout de cette ligne
          $article->user_id = $this->Auth->user('id');

          //Vous pourriez aussi faire ce qui suit
          //$newData = ['user_id' => $this->Auth->user('id')];
          //$article = $this->Articles->patchEntity($article, $newData);
          if ($this->Articles->save($article)) {
              $this->Flash->success(__('Votre article a été sauvegardé.'));
              return $this->redirect(['action' => 'byCategory', $article->category_id]);
          }
          $this->Flash->error(__("Impossible d'ajouter votre article."));
      }
      $this->set('article', $article);

      // Ajoute seulement la liste des catégories pour pouvoir choisir
      // une catégorie pour un article
      $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
      $this->set(compact('categories'));
  }

  /**
  * Edit method
  *
  * @param string|null $id Article id.
  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
      $article = $this->Articles->get($id, [
          'contain' => [
              'Categories',
              'Media' => [
                  'strategy' => 'select',
                  'queryBuilder' => function ($q) {
                      return $q->order(['position' => 'ASC']);
                  }
              ]
          ]
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $article = $this->Articles->patchEntity($article, $this->request->getData());
          $article->slug = Text::slug($article->title);
          $article->media_path = Text::slug($article->title, '_');

          if ($this->Articles->save($article)) {
              $this->Flash->success(__('The article has been saved.'));

              return $this->redirect(['action' => 'byCategory', $article->category_id]);
          }
          $this->Flash->error(__('The article could not be saved. Please, try again.'));
      }
      //$this->set(compact('article'));
      $this->set('_serialize', ['article']);

      //$categories = $this->Articles->Categories->find('treeList');
      $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
      $this->set(compact('article', 'users', 'categories'));

      //$this->set(compact('categories'));
  }

  /**
  * Delete method
  *
  * @param string|null $id Article id.
  * @return \Cake\Http\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $article = $this->Articles->get($id);
      if ($this->Articles->delete($article)) {
          $this->Flash->success(__('The article has been deleted.'));
      } else {
          $this->Flash->error(__('The article could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }

  public function beforeFilter(Event $event)
  {
      parent::beforeFilter($event);
      $this->Auth->allow(['view', 'recherche', 'searchList', 'recherche2']);
  }

  public function isAuthorized($user)
  {
      // Tous les utilisateurs enregistrés peuvent ajouter des articles
      if ($this->request->getParam('action') === 'add') {
          return true;
      }

      // Le propriétaire d'un article peut l'éditer et le supprimer
      if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
          $articleId = (int)$this->request->getParam('pass.0');
          if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
              return true;
          }
      }

      return parent::isAuthorized($user);
  }

}
