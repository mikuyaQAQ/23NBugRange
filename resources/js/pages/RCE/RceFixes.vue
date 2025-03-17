<script setup></script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">RCE Fixes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">RCE</a></li>
                        <li class="breadcrumb-item active">RCE Fixes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">CVE-2023-33246 Apache RocketMQ 命令执行漏洞修复</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    1）目前官方已发布安全修复更新，受影响用户可以升级到 Apache RocketMQ 5.1.1或者4.9.6；

                    <br>2）对外部访问进行限制，检查是否存在已被利用的漏洞痕迹，并尽快消除可能存在的安全威胁；
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer -->
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">CVE-2023-38646 Metabase命令执行漏洞修复</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="card-text">临时缓解方案：<br>

                        通过网络ACL策略限制访问来源，例如只允许来自特定IP地址或地址段的访问请求或者阻止对 /api/setup 终结点的请求。
                    </p>
                    <p class="card-text">

                        升级修复方案：<br>

                        官方已经推出了新的修复版本。建议所有受影响的用户尽快访问官方网站，更新至相应的安全版本。</p>

                </div>

                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    The footer of the card
                </div> -->
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
</template>