<?php

namespace app\admin\controller;

use app\admin\Controller\Base;
use think\Request;
use think\collection;
use app\admin\model\Image as imageModel;
class Image extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $Imagemodel = model('image');
        $data = $Imagemodel->getImage();
        $data=collection($data)->toArray();
        //halt($data);
        \think\View::share('data',$data);
        return $this->fetch('list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
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
        //echo "0-------0";
        //dump($request->param());
        $data=$request->except('file');
        $Imagemodel=model('image');
        $res=$Imagemodel->addImage($data);
        if(!$res){
            $this->success('插入失败','/admin/image');
        }else{
            $this->success('插入成功','/admin/image');
        }
        //dump($model);

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
        //halt($id);
        $Imagemodel=model('image');
        $res=$Imagemodel->getImages($id);
        \think\View::share('data',$res);
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
        //halt($request->param());
        $data=$request->except(['_method','file']);
        $imageModel = new imageModel;
        //dump($imageModel);
        $res=$imageModel->updateimage($data,$id);
        if(!$res){
            return $this->error('更新失败','/admin/image');
        }else{
            return $this->success('更新成功','/admin/image');
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
        //
        $imageModel = new imageModel;
        $res = $imageModel->delimage($id);
        if(!$res){
            return json(['status'=>'fail','msg'=>'删除失败']);
       }else{
            return json(['status'=>"success",'msg'=>'删除成功']);
       }
    }
    //接收上传图片的信息
    public function upload(Request $request){
       $file=$request->file('file');

       //首先在配置文件定义图片路径
       //获取图片的格式
       $validate=config('VALIDATE');
       //获取图片的上传路径
       $path=config('AD_PATH');
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
}
