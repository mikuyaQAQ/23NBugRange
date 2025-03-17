<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sudo-PE</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item active">Sudo-PE</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">权限提升</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h6 class="card-title">提权</h6>
                    <p class="card-text">
                        提权就是通过各种办法和漏洞，提升自己在服务器中的权限，以便控制全局。
                        windows:User >> System
                        linux: User >> Root：</p>
                    <h6 class="card-title">系统漏洞提权</h6>
                    <p class="card-text">
                        系统漏洞提权一般就是利用系统自身缺陷，用来提升权限。为了使用方便，windows和linux系统均有提权用的可执行文件。
                        Windows的提权exp一般格式为MS08067.exe；
                        Linux的提权exp一般格式为2.6.18-194或2.6.18.c
                    </p>
                    <h6>提权方式</h6>
                    <ul>
                        <li>系统漏洞提权（Linux、Windows）</li>
                        <li>数据库提权</li>
                        <li>系统配置错误提权</li>
                        <li>权限继承类提权</li>
                        <li>第三方软件/服务提权</li>
                        <li>WebServer漏洞提权</li>
                    </ul>
                    <h6>系统配置不当提权</h6>
                    <ul>
                        <li>前提：已经成功渗透进目标系统；</li>
                        <li>相比利用漏洞提权，是更常用的方法</li>
                        <li>在大部分企业中，会将系统的漏洞即时进行补丁更新，难以通过系统自身漏洞进行入侵；</li>
                        <li>可以查找系统中以system权限启动的服务或应用，可以尝试将其替换或者反弹shell的方式提权；</li>
                        <li>可以查找NTFS权限允许users修改删除的应用，利用配置不当进行提权；</li>
                        <li>代码中是否有过滤参数的操作等都可以加以利用，进行提取；</li>
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p>参考</p>
                    <a
                        href="https://blog.csdn.net/zzwwhhpp/article/details/114030784#:~:text=%E6%B8%97%E9%80%8F%E6%B5%8B%E8%AF%95%E2%80%94%E2%80%94%E6%9D%83%E9%99%90%E6%8F%90%E5%8D%87%201%201%E3%80%81%E7%B3%BB%E7%BB%9F%E6%BC%8F%E6%B4%9E%E6%8F%90%E6%9D%83%EF%BC%88Linux%E3%80%81Windows%EF%BC%89%20%E7%B3%BB%E7%BB%9F%E6%BC%8F%E6%B4%9E%E6%8F%90%E6%9D%83%E4%B8%80%E8%88%AC%E5%B0%B1%E6%98%AF%E5%88%A9%E7%94%A8%E7%B3%BB%E7%BB%9F%E8%87%AA%E8%BA%AB%E7%BC%BA%E9%99%B7%EF%BC%8C%E7%94%A8%E6%9D%A5%E6%8F%90%E5%8D%87%E6%9D%83%E9%99%90%E3%80%82%20%E4%B8%BA%E4%BA%86%E4%BD%BF%E7%94%A8%E6%96%B9%E4%BE%BF%EF%BC%8Cwindows%E5%92%8Clinux%E7%B3%BB%E7%BB%9F%E5%9D%87%E6%9C%89%E6%8F%90%E6%9D%83%E7%94%A8%E7%9A%84%E5%8F%AF%E6%89%A7%E8%A1%8C%E6%96%87%E4%BB%B6%E3%80%82%20Windows%E7%9A%84%E6%8F%90%E6%9D%83exp%E4%B8%80%E8%88%AC%E6%A0%BC%E5%BC%8F%E4%B8%BAMS08067.exe%EF%BC%9B%20Linux%E7%9A%84%E6%8F%90%E6%9D%83exp%E4%B8%80%E8%88%AC%E6%A0%BC%E5%BC%8F%E4%B8%BA2.6.18-194%E6%88%962.6.18.c%20%EF%BC%881%EF%BC%89windows%E6%8F%90%E6%9D%83,2%E3%80%81%E6%95%B0%E6%8D%AE%E5%BA%93%E6%8F%90%E6%9D%83%20%E6%95%B0%E6%8D%AE%E5%BA%93%E6%8F%90%E6%9D%83%E6%98%AF%E6%8C%87%EF%BC%9A%E9%80%9A%E8%BF%87%E6%89%A7%E8%A1%8C%E6%95%B0%E6%8D%AE%E5%BA%93%E8%AF%AD%E5%8F%A5%EF%BC%8C%E6%95%B0%E6%8D%AE%E5%BA%93%E5%87%BD%E6%95%B0%E7%AD%89%E6%96%B9%E5%BC%8F%E6%8F%90%E5%8D%87%E6%9C%8D%E5%8A%A1%E5%99%A8%E7%94%A8%E6%88%B7%E7%9A%84%E6%9D%83%E9%99%90%E3%80%82%20%E9%A6%96%E5%85%88%E6%88%91%E4%BB%AC%E8%A6%81%E7%99%BB%E5%85%A5%E6%95%B0%E6%8D%AE%E5%BA%93%EF%BC%8C%E6%89%80%E4%BB%A5%E9%80%9A%E5%B8%B8%E6%88%91%E4%BB%AC%E6%8B%BF%E5%88%B0webshell%E7%9A%84%E6%97%B6%E5%80%99%EF%BC%8C%E8%A6%81%E5%8E%BB%E7%BD%91%E7%AB%99%E7%9B%AE%E5%BD%95%E6%89%BE%E6%95%B0%E6%8D%AE%E5%BA%93%E8%BF%9E%E6%8E%A5%E6%96%87%E4%BB%B6%EF%BC%8C%E5%B8%B8%E5%9C%A8%E5%BD%A2%E5%A6%82xxx.conf%E6%88%96conf.xxx%E6%96%87%E4%BB%B6%E4%B8%AD%E3%80%82%20%EF%BC%881%EF%BC%89Mysql%E6%95%B0%E6%8D%AE%E5%BA%93%E6%8F%90%E6%9D%83%20Mysql%E6%95%B0%E6%8D%AE%E5%BA%93%E4%B8%80%E8%88%AC%E6%98%AF%E4%BD%BF%E7%94%A8UDF%20%28%E7%94%A8%E6%88%B7%E8%87%AA%E5%AE%9A%E4%B9%89%E5%87%BD%E6%95%B0%29%E6%8F%90%E6%9D%83%E6%88%96mof%20%28%E6%89%98%E7%AE%A1%E5%AF%B9%E8%B1%A1%E6%A0%BC%E5%BC%8F%29%E6%8F%90%E6%9D%83%E3%80%82%20">渗透测试——权限提升</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>