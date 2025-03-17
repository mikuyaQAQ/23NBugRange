<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">RCE</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">RCE</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">命令执行</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <h6 class="card-title">远程命令执行</h6> -->
                    <p class="card-text">
                        远程命令执行（RCE）漏洞是一种严重的安全威胁，它允许攻击者直接向后台服务器注入操作系统命令或代码，从而控制整个后台系统。</p>
                    <h6 class="card-title">原理</h6>
                    <p class="card-text">
                        这种漏洞通常出现在应用系统设计中需要提供用户指定的远程命令操作接口的情况下。例如，我们常见的路由器、防火墙和入侵检测设备等的Web管理界面上，通常会提供一个用于执行ping操作的Web界面。用户可以在Web界面上输入目标IP地址，并提交请求，后台会对该IP地址进行一次ping测试，并返回测试结果。然而，如果设计者在实现该功能时没有采取严格的安全控制措施，攻击者可能会通过该接口提交恶意的命令，从而使后台执行这些命令，进而控制整个后台服务器。
                    </p>
                    <h6>漏洞危害</h6>
                    <ul>
                        <li>继承Web服务器程序的权限，去执行系统命令</li>
                        <li> 继承Web服务器程序的权限，读写文件</li>
                        <li> 反弹shell</li>
                        <li>控制整个网站</li>
                        <li>甚至控制整个服务器</li>
                    </ul>
                    <h6>PHP命令执行函数</h6>
                    <ul>
                        <li>system() </li>
                        <p>原型：string system ( string $command [, int &$return_var ] )
                            与passthru的基本相同，但是system返回结果并且输出。
                        </p>
                        <li>shell_exec()</li>
                        <p>shell_exec — 通过 shell 环境执行命令 ( 这就意味着这个方法只能在 linux 或 mac os的shell环境中运行
                            )，并且将完整的输出以字符串的方式返回。如果执行过程中发生错误或者进程不产生输出，则返回 NULL。
                            是反撇号 (`) 操作符的变体</p>
                        <li>exec()</li>
                        <p>原型：string exec ( string $command [, array &$output [, int &$return_var ]] )
                            exec执行command命令，但是不会输出全部结果，而是返回结果的最后一行，如果你想得到全部的结果，可以使用第二个参数，让其输出到一个数组，数组的每一个记录代表了输出的每一行，如果输出结果有10行，则数组就有10条记录。所以如果你需要反复输出调用不同系统外部命令的结果，你最好在输出每一条系统外部命令结果时清空这个数组，以防混乱。第三个参数用来取得命令执行的状态码，通常执行成功都是返回０
                        </p>
                        <li>passthru()</li>
                        <p>原型：void passthru ( string $command [, int &$return_var ] )
                            与exec的区别：passthru直接将结果输出，不返回结果，不用使用echo查看结果。</p>
                    </ul>
                    <h6 class="card-title">原理</h6>
                    <p class="card-text">
                        远程命令执行（RCE）漏洞是一种严重的安全威胁，它允许攻击者直接向后台服务器注入操作系统命令或代码，从而控制整个后台系统。</p>
                    <h6 class="card-title">原理</h6>
                    <p class="card-text">
                        远程命令执行（RCE）漏洞是一种严重的安全威胁，它允许攻击者直接向后台服务器注入操作系统命令或代码，从而控制整个后台系统。</p>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p></p>
                    <a href="https://mp.weixin.qq.com/s/tm8oxZwwPdpiRtOv3wYJIw"></a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>