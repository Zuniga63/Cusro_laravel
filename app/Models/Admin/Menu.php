<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $table = "menu";
  /**
   * Esto contiene los campos o atributos pertenecientes a este modelo
   * que se pueden crear de forma masiva. Es decir que no van a requerir invocar
   * al modelo para especificar los nombres dee estos campos. Esto permite mejorar la
   * seguridad del proyecto al no permitir que campos que no sean los siguiente puedan ser ingresados 
   * masivamente.
   */
  protected $fillable = ['name', 'url', 'icon'];

  /**
   * Permite definir los campos que laravel no va apermitir modificar
   * de ninguna manera
   */
  protected $guarded = ['id'];

  /**
   * Esta funcion me selecciona solo las tuplas que tienen
   * el campo father_menu como null y luego ordena segun el campo
   * order para retornar un array
   */
  public function getRootMenus($front)
  {
    return $this->whereNull('father_menu')
      ->orderby('order')
      ->get()
      ->toArray();
  }

  public function getAssignedMenus($front)
  {
    return $this->whereNotNull('father_menu')
      ->orderby('father_menu')
      ->orderby('order')
      ->get()
      ->toArray();
  }

  public function getChildrens($father, $sons)
  {
    $childrens = [];
    foreach ($sons as $son) {
      if ($son['father_menu'] === $father['id']) {
        $fatherTwo = $son;
        $childrensTwo = $this->getChildrens($fatherTwo, $sons);
        $childrens = array_merge($childrens, [array_merge($son, ['submenus' => $childrensTwo])]);
      }
    }
    return $childrens;
  }

  public function saveOrder($menu)
  {
    $menus = json_decode($menu);
    foreach ($menus as $var => $value) {
      $this->where('id', $value->id)->update(['father_menu' => null, 'order' => $var + 1]);
      //Se accede al primer nivel
      if (!empty($value->children)) {
        foreach ($value->children as $key => $vchild1) {
          $update_id = $vchild1->id;
          $parent_id = $value->id;
          $this->where('id', $update_id)->update(['father_menu' => $parent_id, 'order' => $key + 1]);
          // Se accede al segundo nivel
          if (!empty($vchild1->children)) {
            foreach ($vchild1->children as $key => $vchild2) {
              $update_id = $vchild2->id;
              $parent_id = $vchild1->id;
              $this->where('id', $update_id)->update(['father_menu' => $parent_id, 'order' => $key + 1]);
              //Se accede al tercer nivel
              if (!empty($vchild2->children)) {
                foreach ($vchild2->children as $key => $vchild3) {
                  $update_id = $vchild3->id;
                  $parent_id = $vchild2->id;
                  $this->where('id', $update_id)->update(['father_menu' => $parent_id, 'order' => $key + 1]);
                  //Se accede al cuarto nivel
                  if (!empty($vchild3->children)) {
                    foreach ($vchild3->children as $key => $vchild4) {
                      $update_id = $vchild4->id;
                      $parent_id = $vchild3->id;
                      $this->where('id', $update_id)->update(['father_menu' => $parent_id, 'order' => $key + 1]);
                    } //end foreach
                  } //end if
                } //end foreach
              } //end if
            } //end foreach
          } //end if
        } //end foreach
      } //end if
    } //end foreach
  } //end method

  public static function getMenus($front = false)
  {
    $menu = new Menu();
    //recupero todos los menus que tienen father_menu = null
    $parents = $menu->getRootMenus($front);
    $sons = $menu->getAssignedMenus($front);
    $allMenus = [];
    //Para cada padre, debo recuperar los hijos
    foreach ($parents as $father) {
      $childrens = $menu->getChildrens($father, $sons);
      $item = [array_merge($father, ['submenus' => $childrens])];
      $allMenus = array_merge($allMenus, $item);
    }

    return $allMenus;
  }
}
