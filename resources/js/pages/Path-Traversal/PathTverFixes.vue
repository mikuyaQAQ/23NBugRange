<script setup></script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Path Traversal Fixes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">Path Traversal</a></li>
                        <li class="breadcrumb-item active">Path Traversal Fixes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">CVE-2023-2825 GitLab目录遍历漏洞修复</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    建议立即升级GitLab到最新版本，以降低安全风险。
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer -->
            </div>
            <!-- <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">CVE-2023-52064 五指CMS SQL注入漏洞修复</h3>
                    <div class="card-tools">
                    
                    </div>
            
                </div>
               
                <div class="card-body">
                    <p class="card-text">官方暂时未发布最新补丁
                    </p>
                    <p class="card-text">添加Waf，以及关键字过滤</p>

                </div>

            </div> -->
        </div>
    </div>
</template>