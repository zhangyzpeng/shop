<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Category as CategoryModel;
use app\admin\model\Goods as GoodsModel;
use think\Collection;
class Goods extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $GoodsModel = new GoodsModel;
        $goodsres = $GoodsModel->getAllGoods();
        //获取商品分类
        $CategoryModel = new CategoryModel;
        $cats = $CategoryModel->getSubCats();
        $this->assign('cats',$cats);
        //$goodsres = Collection($goodsres)->toArray();
        //halt( $goodsres);
        $this->assign('data',$goodsres);
        return $this->fetch('list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        $CategoryModel = new CategoryModel;
        $cats = $CategoryModel->getSubCats();
        $this->assign('cats',$cats);
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
        //dump($request->param());
        $data = $request->except('file');
        $data['goods_color'] = implode("|", $data['goods_color']);
        $data['goods_color_desc'] = implode("|", $data['goods_color_desc']);
        $data['create_time'] = time();
        $GoodsModel = new GoodsModel;
        $res = $GoodsModel->addGoods($data);
        if($res){
            $this->success('添加商品成功','/admin/Goods');
        }else{
            $this->success('添加商品失败','/admin/Goods');
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
        //获取单挑的商品详情
        $GoodsModel = new GoodsModel;
        $goods = $GoodsModel->getOneGoods($id);
        $goods['goods_color'] = explode('|',$goods['goods_color']);
        $goods['goods_color_desc'] = explode('|',$goods['goods_color_desc']);
        //halt($goods);
        $this->assign('goods',$goods);
        //获取商品分类
        $CategoryModel = new CategoryModel;
        $cats = $CategoryModel->getSubCats();
        $this->assign('cats',$cats);

        
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
       $data = $request->except(['_method','file']);
       $data['goods_color'] = implode('|',$data['goods_color']);
       $data['goods_color_desc'] = implode('|',$data['goods_color_desc']);

       $GoodsModel = new GoodsModel;
       $res = $GoodsModel->upGoods($id,$data);
      if($res){
            $this->success('商品更新成功','/admin/Goods');
        }else{
            $this->success('商品更新失败','/admin/Goods');
        }
    }

    /**
     * 商品下架
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $GoodsModel = new GoodsModel;
        $delgoods = $GoodsModel->delGoods($id);
        if($delgoods){
            return json(['status'=>'success','msg'=>'下架成功']);
        }else{
             return json(['status'=>'fail','msg'=>'下架失败']);
        }

    }
    //商品上架
    public function upGoods($id)
    {
        //
        $GoodsModel = new GoodsModel;
        $delgoods = $GoodsModel->updGoods($id);
        if($delgoods){
            return json(['status'=>'success','msg'=>'上架成功']);
        }else{
             return json(['status'=>'fail','msg'=>'上架失败']);
        }
    }
    //图片上传
    public function upload(Request $request){
       $file=$request->file('file');

       //首先在配置文件定义图片路径
       //获取图片的格式
       $validate=config('VALIDATE');
       //获取图片的上传路径
       $path=config('GOODS_PATH');
       //halt($path);
       //验证并上传
       $res=$file->validate($validate)->move($path);
       //halt($res);
       if($res){
            $file_path = $res->getPathName();
            //halt($file_path);
            return json(['status'=>'success','msg'=>$file_path]);
       }else{
            return json(['status'=>"fail",'msg'=>$file->getError()]);
       }

    }
    //商品查找
    public function search(Request $request){
        $cat_id = $request->param('cat_id');
        $GoodsModel = new GoodsModel;
        $delgoods = $GoodsModel->getGoods($cat_id);
        //dump($delgoods);
        $CategoryModel = new CategoryModel;
        $cats = $CategoryModel->getSubCats();
        $this->assign('cats',$cats);
        $this->assign('data', $delgoods);
        return $this->fetch('list');       
    }
}