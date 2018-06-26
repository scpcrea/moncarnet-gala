<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
* Categories Controller
*
* @property \App\Model\Table\CategoriesTable $Categories
*
* @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
*/
class CategoriesController extends AppController
{


  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow('adresses');
  }

  public function home()
  {
    // $categories = $this->Categories->find()
    //    ->order(['lft'=>'ASC']);
    $this->viewBuilder()->setLayout('default.gala');
    
    $categories = $this->Categories->find('all', [
      'contain'       => ['']
      ])->order(['Categories.lft'=>'ASC']);

      $this->set(compact('categories'));
      $this->set('serialize', ['categories']);
    }

    public function sommaire($id = null)
    {
      // $categories = $this->Categories->find()
      //    ->order(['lft'=>'ASC']);
      $this->viewBuilder()->setLayout('default.gala');

      $parent = $this->Categories->get($id);

      $categories = $this->Categories->find('all', [
        'contain'       => ['ParentCategories', 'ChildCategories']])
        ->order(['Categories.lft'=>'ASC'])
        ->where(['Categories.parent_id =' => $id]);

        $this->set(compact('categories'));
        $this->set('serialize', ['categories']);

        $this->set(compact('parent'));
        $this->set('serialize', ['parent']);
      }

      /**
      * View method
      *
      * @param string|null $id Category id.
      * @return \Cake\Http\Response|void
      * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
      */
      public function adresses($slug = null)
      {
        $this->viewBuilder()->setLayout('default.gala');

        $category = $this->Categories->find('all', [
          'contain' => [
            'Articles',
            'Articles.Categories',
            'Articles.Media'
          ]
        ])
        ->where([
          'Categories.slug' => $slug
        ])
        ->order('rand()')
        ->contain([
          'Articles' => [
            'strategy' => 'select',
            'queryBuilder' => function ($q) {
              return $q->where(['Articles.online >' => -1])
              ->order('rand()');
            }
          ],
          'Articles.Media' => [
            'strategy' => 'select',
            'queryBuilder' => function ($q) {
              return $q->order(['position' => 'ASC']);
            }
          ]
        ])
        ->first();

        $this->set('category', $category);
        $this->set('_serialize', ['category']);

      }

    }
