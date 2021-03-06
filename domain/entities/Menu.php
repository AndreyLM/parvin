<?php

namespace domain\entities;

use domain\entities\queries\MenuQuery;
use paulzi\nestedsets\NestedSetsBehavior;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $related_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth

 *
 * @property Menu $parent
 * @property Menu[] $parents
 * @property Menu[] $children
 * @property Menu $prev
 * @property Menu $nextnew MenuManager()
 * @mixin NestedSetsBehavior
 */
class Menu extends ActiveRecord
{
    const MENU_TYPE_CATEGORY = 1;
    const MENU_TYPE_ARTICLE = 2;
    const MENU_TYPE_PRODUCT = 3;
    const MENU_TYPE_CAT_PRODUCTS = 4;


    public static function create($name, $type, $related_id): self
    {
        $menu = new static();
        $menu->name = $name;
        $menu->type = $type;
        $menu->related_id = $related_id;
        return $menu;
    }

    public function edit($name, $type, $related_id)
    {
        $this->name = $name;
        $this->type = $type;
        $this->related_id = $related_id;
    }


    public function getHeadingTile()
    {
        return $this->name;
    }

    public static function tableName()
    {
        return '{{%shop_menus}}';
    }

    public function behaviors()
    {
        return [
            NestedSetsBehavior::className(),
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function getType()
    {
        switch ($this->type){
            case self::MENU_TYPE_CATEGORY:
                return 'category';
            case self::MENU_TYPE_PRODUCT:
                return 'product';
            default :
                return 'article';
        }


    }

    public static function find()
    {
        return new MenuQuery(static::class);
    }
}