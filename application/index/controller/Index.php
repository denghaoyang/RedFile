<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\CreatePdf;
use app\index\controller\MergePdf;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function save(){
        set_time_limit(600);

        $post = input('post.');
        $MergePdf = new MergePdf();
        $CreatePdf = new CreatePdf();

        //保存文件
        $attachPdf = $this->upload();
        $attachPdf = "uploads/".$attachPdf;
        $createdPdf = $CreatePdf->creRelayPdf($post);

        $mergedPdf = $MergePdf->getMergedPdf($createdPdf,$attachPdf);

        //展示
        echo "<script type='text/javascript'>";
        echo "window.location.href='/".$mergedPdf."'";
        echo "</script>";
    }

    public function upload(){
        $file = request()->file('pdf');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                return $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}
