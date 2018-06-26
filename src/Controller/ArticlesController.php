<?php
namespace App\Controller;

use App\Controller\AppController;
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
  * View method
  *
  * @param string|null $id Article id.
  * @return \Cake\Http\Response|void
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($slug = null)
  {
    $this->viewBuilder()->setLayout('default.gala');

    $article = $this->Articles->find('all', [
      'contain' => ['Categories', 'Categories.Articles', 'Media']
    ])
    ->where([
      'Articles.slug' => $slug
    ])
    ->first();

    if (!$article) {
      $this->cakeError('error404');
    }

    if($article->online==-1)
    {
      $this->redirect(['controller'=>'pages', 'action'=>'interdit']);
    }
    $categories = $this->Articles->Categories->find('threaded');

    $this->set(compact('categories'));

    $this->set('article', $article);
    $this->set('_serialize', ['article']);
  }

  public function recherche()
  {
    $this->viewBuilder()->setLayout('default.gala');
  }

  public function searchList()
  {
    $this->autoRender = true;
    $keywords = $this->request->data['keywords'];
    $field = $this->request->data['field'];
    $isAdvanced = $this->request->data['is_advanced'];

    if($isAdvanced)
    $limit=50;
    else
    $limit=3;

    if($field!='all'){
      $articles = $this->Articles->find('all', ['contain' => 'Media'])
      ->order('rand()')
      ->limit($limit)
      ->where([
        $field.' like' => "%".$keywords."%",
        'online !=' => -1
      ]);
    } else {
      $articles = $this->Articles->find('all', ['contain' => ['Media', 'Categories']])
      ->order('rand()')
      ->limit($limit)
      ->where([
        'online !=' => -1,
        'OR' => [
          ['title like' => "%".$keywords."%"],
          ['body like' => "%".$keywords."%"],
          ['subtitle like' => "%".$keywords."%"],
          ['city like' => "%".$keywords."%"]
        ]
      ]);
    }

    $this->paginate = [
      'limit' => $limit,
      'maxLimit' => $limit
    ];

    $this->set('articles', $this->paginate($articles));
    $this->set('keywords', $keywords);
    $this->set('isadvanced', $isAdvanced);
    $this->set('field', $field);
  }

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('Flash');
    $this->loadComponent('RequestHandler');
  }

}
