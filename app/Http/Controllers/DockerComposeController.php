<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use Illuminate\Database\Eloquent\Model;

class DockerImage extends Model
{
    protected $table = 'docker_images'; // 指定模型对应的数据库表

    protected $fillable = ['image_name', 'path_image']; // 可以批量赋值的字段

    // 其他模型定义和关联关系等
}

class DockerComposeController extends Controller
{
    private function runDockerComposeCommand($directory, $command)
    {
        $path = base_path("Docker_VulEnv/$directory/"); // 构建目录的绝对路径
        $process = Process::fromShellCommandline('cd ' . $path . ' && ' . $command);
        $process->run();

        // 检查命令是否成功执行
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        // 获取命令执行结果
        return $process->getOutput();
    }

    public function startEnvironment(Request $request)
    {
        $directory = $request->input('directory'); // 获取用户提交的目录参数(post)
        try {
            // 执行 Docker 容器启动命令
            $output = $this->runDockerComposeCommand($directory, 'docker-compose up -d');
            $imagePath = DockerImage::where('image_name', $directory)->value('path_image');
            return response()->json(['status' => 'success', 'message' => $output, 'imagePath' => $imagePath]);
        } catch (ProcessFailedException $e) {
            return response()->json(['status' => 'error', 'message' => '启动环境失败: ' . $e->getMessage()]);
        }
    }

    public function stopEnvironment(Request $request)
    {
        $directory = $request->input('directory');
        try {
            $output = $this->runDockerComposeCommand($directory, 'docker-compose down');
            return response()->json(['status' => 'success', 'message' => $output]);
        } catch (ProcessFailedException $e) {
            return response()->json(['status' => 'error', 'message' => '停止环境失败: ' . $e->getMessage()]);
        }
    }


}
