<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Collection;
use app\admin\model\Category as CategoryModel;
use think\Db;
class Category extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $CategoryModel = new CategoryModel;
        $cats = $CategoryModel->getCats();
        //$cats = Collection($cats)->toArray();
        //$page = $cats->render();
        //数据显示修改 
        $cats =$this->getTree($cats);
       // halt($cats);
        $this->assign('cats',$cats);
       // $this->assign('page',$page);
        //商品显示
        return $this->fetch('list');
    }
    //运用递归函数显示商品
    private function getTree($data,$pid=0,$level=0){
        //data 数据
        //pid 父类id
        //lever 级别
        static $list = [];
        foreach($data as $k=>$v){
            //判断出顶级分类
            //dump($v);
            if($v['pid']==$pid){
                $v['level'] = $level;
                $list[]=$v;
                //dump('-->'.$k);
                unset($v[$k]);
                $this->getTree($data,$v['id'],$level+1);
                
            }
        }
        return $list;
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //获取顶级分类的东西
        $CategoryModel = new CategoryModel;
        $top_cats = $CategoryModel->getTopcateroty();
        $this->assign('top_cats',$top_cats);
        return $this->fetch('add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $CategoryModel = new CategoryModel;
        $data = $request->param();
        $res = $CategoryModel->addCategory($data);
        if($res){
            return $this->success('添加商品成功','/admin/Category');
        }else{
            return $this->success('添加商品失败','/admin/Category');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        $CategoryModel = new CategoryModel;
        $cat = $CategoryModel->getcat($id);
        $top_cats = $CategoryModel->getTopcateroty();
        $this->assign('top_cats',$top_cats);
        $this->assign('cat',$cat);
        return $this->fetch('edit');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dump($request->param());
        //出去不需要的值
        $data = $request->except('_method');
        $CategoryModel = new CategoryModel;
        $res = $CategoryModel->upCat($data,$id);
        if($res){
            return $this->success('更新成功','/admin/Category');
        }else{
            return $this->success('更新失败','/admin/Category');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $CategoryModel = new CategoryModel;
        $res = $CategoryModel->delCat($id);
        return $res;
    }
}
